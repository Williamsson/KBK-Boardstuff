$(document).ready( function() {
	
	var sendButton = $("#economicAlterationSubmit");
	
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
					closePopup();
			});
		}else{
			alert("Någonting är trasigt, och du är troligen orsaken. Jag tror att du mixtrat med #alterationType. Har du det? Fy i så fall! Om inte, kontakta Williamsson.");
		}
	});
	
	function closePopup(){
		$("#popupBoxContent").empty();
		$("#popupBox").hide('slow');
	}
	
	function getBaseURL () {
		var url =  location.protocol + "//" + location.hostname + 
		(location.port && ":" + location.port) + "/";
		//SKALL TAS BORT VID DEPLOY:
		url = url + 'KBK-BoardStuff/';
		return url;
	}
	
});
