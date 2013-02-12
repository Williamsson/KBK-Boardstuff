$(document).ready( function() {
	
	var popupBox = $("#popupBox");
	var closePopup = $("#popupBoxClose");
	var addIncomeButton = $("#addIncome");
	var addExpenseButton = $("#addExpense");
	
	//Open popup and set the alterationType to 1 (1= income, 0 = expense)
	addIncomeButton.click(function(e) {
		e.preventDefault();
		popupBox.show('slow');
		appendPopupForm('economic_alteration.html');
		$("#popupBox h2").text("Ny inkomst: ");
		setTimeout(
		  function(){
			  $("#alterationType").val('1');
			  loadSendAlterationFile();
		  }, 500);
	});
	
	//Open popup and set the alterationType to 0 (1= income, 0 = expense)
	addExpenseButton.click(function(e){
		e.preventDefault();
		popupBox.show('slow');
		appendPopupForm('economic_alteration.html');
		$("#popupBox h2").text("Ny utgift: ");
		setTimeout(
			  function(){
				  $("#alterationType").val('0');
				  loadSendAlterationFile();
		  }, 2500);
	});
	
	//Close the popup
	closePopup.click(function(e) {
		e.preventDefault();
		$("#popupBoxContent").empty();
		popupBox.hide('slow');
	});
	
	//Takes a file name, finds the correct url, and loads it into the popup
	function appendPopupForm(file){
		var url = getBaseURL();
		url = url + 'application/views/popupbox_views/';
		$("#popupBoxContent").empty();
		$("#popupBoxContent").load(url + file);
	}
	
	//Finds the base URL of the site
	function getBaseURL () {
		var url =  location.protocol + "//" + location.hostname + 
		(location.port && ":" + location.port) + "/";
		//SKALL TAS BORT VID DEPLOY:
		url = url + 'KBK-BoardStuff/';
		return url;
	}
	
	function loadSendAlterationFile(){
		var url = getBaseURL();
		url = url + 'scripts/';
		$.ajax({
			url: url + 'sendEconomicAlteration.js',
			dataType: 'script'
		});
	}
	
	
});