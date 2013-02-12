$(document).ready( function() {
	
	var sendButton = $("#economicAlterationSubmit");
	
	sendButton.click(function(e){
		e.preventDefault();
		var title = $("#title");
	
		var title = $("#title").val();
		var receipt = $("#receipt").val();
		var money = $("#money").val();
		var desc = $("#description").val();
		var date = $("#date").val();
		var type = $("#alterationType").val();
		
		if(type == 1){
			var url = getBaseURL();
			$.ajax({
				 type: "POST",
				 url: url + 'application/controllers/api.php',
				 data: {type: type, title: title, receipt: receipt, money: money, description: desc, date: date}
				}).done(function(msg){
					closePopup();
			});
		}else if(type == 0){
			
		}else{
			alert("Någonting är trasigt, och du är troligen orsaken.");
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
		url = url + 'KBK-BoardStuffs/';
		return url;
	}
	
});
