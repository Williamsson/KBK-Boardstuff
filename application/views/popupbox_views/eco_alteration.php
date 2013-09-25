<script type="text/javascript" src="scripts/sendEconomicAlteration.js"></script>
<script>
  $(function() {
	  $("#date").datepicker({ dateFormat: "yy/mm/dd"});
  });
</script>
<form>
	<div class="column">
		<label for="title">Titel: *</label>
		<input type="text" id="title" name="title" placeholder="Titel"/><br/>
		
		<label for="description">Kostnad: *</label>
		<input type="text" id="money" name="money" placeholder="Kostnad"/><br/>
		
		<label for="receipt">Kvitto: *</label><br/>
		<select name="receipt" id="receipt">
			<option value="1">Ja</option>
			<option value="0">Nej</option>
		</select><br/>
		
		<label for="receiptImage">Bild på kvitto: </label>
		<input type="file" id="receiptImage" name="receiptImage" accept="image/*"/><br/>
		
		<input type="submit" value="Lägg till" name="economicAlterationSubmit" id="economicAlterationSubmit"/>
	</div>
	
	<div class="column">
		<label for="date">Datum:</label>
		<input type="text" name="date" id="date"/>
		
		<label for="description">Vidare information: </label>
		<textarea name="description" id="description" rows="8" cols="30"></textarea><br/>
		
		<input type="hidden" value="" id="alterationType"/>
	</div>
</form>