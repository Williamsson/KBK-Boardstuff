<script type="text/javascript" src="<?php echo base_url();?>scripts/globalStuff.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/economicsHandler.js"></script>


<div id="ecoWrapper">

	<div id="ecoHeader">
		<ul>
			<li>
				<p style="margin:0; margin-top:3px; padding:0; float:left;">Verksamhetsår: </p>
				<select>
					<option value="2013">2013</option>
					<option value="2012">2012</option>
					<option value="2011">2011</option>
					<option value="2010">2010</option>
				</select>
			</li>
			<li><a href="#" id="addIncome">Lägg till inkomst</a></li>
			<li><a href="#" id="addExpense">Lägg till utgift</a></li>
			<li><a href="#">Exportera årets inkomster/utgifter till PDF</a></li>
		</ul>
	</div>
	
	<div id="ecoContent">
		<table>
			<tr>
				<th>Titel:</th>
				<th>Inkomst/utgift:</th>
				<th>Datum:</th>
				<th>Kvitto: </th>
				<th>Godkänd av revisor:</th>
				<th>Återstående saldo:</th>
			</tr>
		</table>
	</div>
	
</div>

<div id="popupBox">
	 <a id="popupBoxClose" href="#">Stäng</a>
	 <h2></h2>
	 <div id="popupBoxContent">
	 	
	 </div>
</div>

