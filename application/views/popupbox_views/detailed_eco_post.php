<script>
  $(function() {
    $("#date").datepicker({ dateFormat: "yy/mm/dd"});
  });
</script>

<form>
	<div class="column">
		<label for="title">Titel: *</label>
		<input type="text" id="title" name="title"/><br/>
		
		<label for="description">Kostnad: *</label>
		<input type="text" id="money" name="money" value=""/><br/>
		
		<label for="receipt">Kvitto: *</label><br/>
		<select name="receipt" id="receipt">
			<option value="1">Ja</option>
			<option value="0">Nej</option>
		</select><br/>
		
		<label for="incomeOrExpense">Inkomst/utgift *</label><br/>
		<select name="incomeOrExpense" id="receipt">
			<option value="1">Inkomst</option>
			<option value="0">Utgift</option>
		</select><br/>
		
		<?php 
			$isAdmin = true;
			if($isAdmin){?>
			<input type="submit" value="Redigera" name="editEcoPost" id="editEcoPost"/>
	<?php }
		?>
		
	</div>
	
	<div class="column">
		<label for="date">Datum:</label>
		<input type="text" name="date" id="date" value=""/>
		
		<label for="description">Vidare information: </label>
		<textarea name="description" id="description" rows="8" cols="30">Text</textarea><br/>
		
	</div>
</form>