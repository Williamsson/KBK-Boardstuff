<script type="text/javascript" src="scripts/sendEconomicAlteration.js"></script>
<script>
  $(function() {
	  $("#date").datepicker({ dateFormat: "yy/mm/dd"});
  });

//Convert divs to queue widgets when the DOM is ready
	var url = getBaseURL();
	$("#uploader").pluploadQueue({
		// General settings
		runtimes : 'gears,flash,silverlight,browserplus,html5',
		url : url + 'api/uploadimage',
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,

		// Resize images on clientside if we can
		resize : {width : 320, height : 240, quality : 90},

		// Specify what files to browse for
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		],

		// Flash settings
		flash_swf_url : 'scripts/plupload/plupload.flash.swf',

		// Silverlight settings
		silverlight_xap_url : 'scripts/plupload/plupload.silverlight.xap'
	});

	// Client side form validation
	$('form').submit(function(e) {
      var uploader = $('#uploader').pluploadQueue();

      // Files in queue upload them first
      if (uploader.files.length > 0) {
          // When all files are uploaded submit form
          uploader.bind('StateChanged', function() {
              if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                  $('form')[0].submit();
              }
          });
              
          uploader.start();
      } else {
          alert('You must queue at least one file.');
      }

      return false;
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
		
		
	</div>
	
	<div class="column">
		<label for="date">Datum:</label>
		<input type="text" name="date" id="date"/>
		
		<label for="description">Vidare information: </label>
		<textarea name="description" id="description" rows="8" cols="30"></textarea><br/>
		
		<input type="hidden" value="" id="alterationType"/>
	</div>
	<div style="clear:both">
		<label for="receiptImage">Bild på kvitto om sådant existerar: </label>
	</div>
	<div id="uploader">
		<p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
	</div>
	<div style="clear:both;">
		<input type="submit" value="Lägg till" style="bottom:0;left:0;padding:20px;" name="economicAlterationSubmit" id="economicAlterationSubmit"/>
	</div>
</form>