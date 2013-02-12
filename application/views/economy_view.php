<script type="text/javascript" src="<?php echo base_url();?>scripts/popup.js"></script>

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
			
			<tr>
				<td>Tält20</td>
				<td>-2500r</td>
				<td>2013-02-01</td>
				<td>Ja</td>
				<td>Nej</td>
				<td>4800</td>
			</tr>
			
			<tr>
				<td>Gary</td>
				<td>-500</td>
				<td>2013-02-01</td>
				<td>Nej</td>
				<td>Nej</td>
				<td>4300</td>
			</tr>
			
			<tr>
				<td>Grundbidrag Sverok</td>
				<td>+ 3000</td>
				<td>2013-02-01</td>
				<td>Nej</td>
				<td>Nej</td>
				<td>7300</td>
			</tr>
			
			<tr>
				<td>Medlemsavgift</td>
				<td>+ 700</td>
				<td>2013-02-01</td>
				<td>Nej</td>
				<td>Nej</td>
				<td>8000</td>
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
