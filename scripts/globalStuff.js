
//Finds the base URL of the site
function getBaseURL(){
	var url =  location.protocol + "//" + location.hostname + 
	(location.port && ":" + location.port) + "/";
	//SKALL TAS BORT VID DEPLOY:
	url = url + 'KBK-BoardStuff/';
	return url;
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
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

function showDetailedInformation(id, type){
	var url = getBaseURL();
	$("#popupBox h2").text("Detaljerad information: ");
	if(type == "ecoPost"){
		
		$.ajax({
			type: "GET",
			url: url + 'api/economy/format/json',
			data: {id: id}
		}).done(function(data){
			
			togglePopup();
			appendPopupForm('detailed_eco_post.php');
			
			setTimeout(
					function(){
						
						$("#title").val(data['title']);
						$("#money").val(data['money']);
						$("#receipt").val(data['receipt']);
						$("#date").val(data['date']);
						$("#description").val(data['desc']);
						$("#alterationType").val(data['type']);
			  }, 500);
		});
	}
}

function populateTable(){
	var table = $("#ecoContent table");
	var year = getParameterByName("year");
	var url = getBaseURL();
	 $.ajax({
		type: "GET",
		url: url + 'api/economy/format/json/year/' + year,
	}).done(function(data){
		var holder = new Array();
		
		$(data).each(function(index){
			
			var id = ($(this)[0]['id']);
			var title = ($(this)[0]['title']);
			var desc = ($(this)[0]['desc']);
			var money = parseFloat(($(this)[0]['money']));
			var type = ($(this)[0]['type']);
			var date = ($(this)[0]['date']);
			var receipt = ($(this)[0]['receipt']);
			var accountant_approved = ($(this)[0]['accountant_approved']);
			
			holder[index] = new Array();
			holder[index]['money'] = money;
			holder[index]['type'] = type;
			
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
				accountant_approved = "Inte granskat ännu";
			}
			
			if(type == 1){
				money = "+" + money;
			}else if(type == 0){
				money = "-" + money;
			}else{
				money = "-";
			}
			
			table.append(" \
				    <tr> \
				        <td> <a href='#" + id + "' id='ecoPostLink' onclick='showDetailedInformation(" + id + ', "ecoPost"' + "); return false;'>" + title + "</a> </td> \
				        <td>" + money + " kr</td> \
				        <td>" + date + "</td> \
				        <td>" + receipt + "</td> \
				        <td>" + accountant_approved + "</td> \
				        <td><p id='moneyLeft" + index + "'></p></td> \
				    </tr> \
				    ");
		});
		
		var moneyArray = new Array();
		var typeArray = new Array();
		
		$(holder).each(function(index){
			
			var money = parseFloat(holder[index]['money']);
			var type = holder[index]['type'];

			moneyArray[index] = money;
			typeArray[index] = type;
		});
		
		moneyArray.reverse();
		typeArray.reverse();
		
		remainingMoney = new Array();
		
		$(moneyArray).each(function(index){
			remainingMoney[index] = new Array();
			remainingMoney[index]['type'] = typeArray[index];
			remainingMoney[index]['money'] = moneyArray[index];
		});
		
		var a = remainingMoney.length;
		var i = -1;
		var currentMoney = 0;
		
		while(i < remainingMoney.length -1){
			i = i + 1;
			a = a - 1;
			
			var postMoney = remainingMoney[i]['money'];
			
			if(remainingMoney[i]['type'] == 1){
				currentMoney = currentMoney + postMoney;
			}else{
				currentMoney = currentMoney - postMoney;
			}
			
			$("#moneyLeft" + a).html(currentMoney);
		}
	});
}

$(document).ready( function() {
	populateTable();
	
	addIncomeButton = $("#addIncome");
	addExpenseButton = $("#addExpense");
	popupBox = $("#popupBox");
	popupBoxContent = $("#popupBoxContent");
	closePopup = $("#popupBoxClose");
	ecoPostLink = $("#ecoPostLink");
	
	//Close the popup when that button is clicked
	closePopup.click(function(e) {
		e.preventDefault();
		togglePopup();
	});
	
	$("#yearPicker").change(function(){
		var year = $( "#yearPicker option:selected").val();
		var url = getBaseURL() + "Economy?year=" + year;
		window.location = url;
	});
	
});