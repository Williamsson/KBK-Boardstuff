$(document).ready( function() {
	sendButton = $("#economicAlterationSubmit");
	sendButton.click(function(e){
		e.preventDefault();
	
		var title = $("#title").val();
		var money = $("#money").val();
		var receipt = $("#receipt").val();
		var date = $("#date").val();
		var desc = $("#description").val();
		var type = $("#alterationType").val();
		
		if(type == 1 || type == 0){
			var url = getBaseURL();
			$.ajax({
				 type: "POST",
				 url: url + 'api/economy',
				 data: {type: type, title: title, receipt: receipt, money: money, description: desc, date: date}
				}).done(function(msg){
					togglePopup();
			});
		}else{
			alert("Någonting är trasigt, och du är troligen orsaken. Jag tror att du mixtrat med mina IDn i html-koden. Har du det? Fy i så fall! Om inte, kontakta Williamsson.");
		}
	});
	
	function closePopup(){
		$("#popupBoxContent").empty();
		$("#popupBox").hide('slow');
	}
});