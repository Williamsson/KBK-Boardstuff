
//Finds the base URL of the site
function getBaseURL(){
	var url =  location.protocol + "//" + location.hostname + 
	(location.port && ":" + location.port) + "/";
	//SKALL TAS BORT VID DEPLOY:
	url = url + 'KBK-BoardStuff/';
	return url;
}

function togglePopup(){
	popupBox.toggle('slow');
}

//Takes a file name, finds the correct url, and loads it into the popup
function appendPopupForm(file){
	var url = getBaseURL();
	url = url + 'application/views/popupbox_views/';
	popupBoxContent.empty();
	popupBoxContent.load(url + file);
}

function populateTable(){
	var table = $("#ecoContent table");
	
	var url = getBaseURL();
	 $.ajax({
		type: "GET",
		url: url + 'api/economy/format/json',
	}).done(function(data){
		$(data).each(function(index){
			var id = ($(this)[0]);
			var title = ($(this)[1]);
			var desc = ($(this)[2]);
			var money = ($(this)[3]);
			var type = ($(this)[4]);
			var date = ($(this)[5]);
			var receipt = ($(this)[6]);
			var accountant_approved = ($(this)[7]);
			var remaining_money = ($(this)[8]);
			
			if(receipt == 1){
				receipt = "Ja";
			}else{
				receipt = "Nej";
			}
			
			if(accountant_approved == 0){
				accountant_approved = "Nej";
			}else if(accountant_approved == 1){
				accountant_approved = "Ja";
			}else{
				accountant_approved = "-";
			}
			
			if(type == 1){
				money = "+ " + money;
			}else if(type == 0){
				money = "- " + money;
			}else{
				money = "-";
			}
			
			table.append(" \
				    <tr> \
				        <td><a href='#" + id + "' id='ecoPostLink'>" + title + "</a></td> \
				        <td>" + money + "</td> \
				        <td>" + date + "</td> \
				        <td>" + receipt + "</td> \
				        <td>" + accountant_approved + "</td> \
				        <td>"+ remaining_money + "</td> \
				    </tr> \
				    ");
	});
	
	
	});
}

$(document).ready( function() {
	populateTable();
	
	
	addIncomeButton = $("#addIncome");
	addExpenseButton = $("#addExpense");
	popupBox = $("#popupBox");
	popupBoxContent = $("#popupBoxContent");
	closePopup = $("#popupBoxClose");
	
	//Close the popup when that button is clicked
	closePopup.click(function(e) {
		e.preventDefault();
		togglePopup();
	});
});