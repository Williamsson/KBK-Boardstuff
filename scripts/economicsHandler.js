$(document).ready( function() {
	
	//Open popup and set the alterationType to 1 (1= income, 0 = expense)
	addIncomeButton.click(function(e) {
		e.preventDefault();
		togglePopup();
		appendPopupForm('eco_alteration.html');
		$("#popupBox h2").text("Ny inkomst: ");
		setTimeout(
		  function(){
			  $("#alterationType").val('1');
		  }, 500);
	});
	
	//Open popup and set the alterationType to 0 (1= income, 0 = expense)
	addExpenseButton.click(function(e){
		e.preventDefault();
		togglePopup();
		appendPopupForm('eco_alteration.html');
		$("#popupBox h2").text("Ny utgift: ");
		setTimeout(
			  function(){
				  $("#alterationType").val('0');
		  }, 500);
	});
	
	
	
});