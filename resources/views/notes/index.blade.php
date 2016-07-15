<!DOCTYPE html>
<html>
<head>
<title>Post a Note-to-Yourself</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
	
	#wrapper {
		width: 88%;
		margin: auto;
		border: 2px solid black;
	}

	#wrapper div {
		width: 24%;
		text-align: center;
		margin: auto;
		display: inline-block;
	}

</style>
</head>
<body>
<h1>Note to Yourself</h1>
{{ $image_count }}
<<<<<<< HEAD
{!! Form::open(array('route' => 'Notes.store', 'id' => 'note_form')) !!}
=======
{!! Form::open(array('route' => 'Notes.store', 'id' => 'note_form', 'enctype' => 'multipart/form-data')) !!}
>>>>>>> 138f1aa3fa2906d1b22995fbda798a3a505a803a

<div id="wrapper">
	<div id="notes">
		<h2>Notes</h2>
		<textarea name="note" form='note_form'> {{ $note }} </textarea>
	</div>

	<div id="websites">
		
		<h2>Websites</h2>

	</div>

	<div id="tbd">
		<h2>TBD</h2>
		<textarea name="tbd" form='note_form'> {{ $tbd }} </textarea>
	</div>

	<div>
		
		<h2>Images</h2>
<<<<<<< HEAD
		<input name="image" type="file" id="images"><br>
=======
		<input name="image" type="file" id="images" accept=".jpg,.jpeg,.gif"><br>
>>>>>>> 138f1aa3fa2906d1b22995fbda798a3a505a803a

	</div>
</div>

{{Form::submit('Save changes', array('class' => 'large button round'))}}

{!! Form::close() !!}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
	var websites = '{!! $websites !!}'
	var parsedWebsites = JSON.parse(websites);
	var callbackCounter = 0;
	var image_count = {{ $image_count }}

	for (var property in parsedWebsites) {
		if (parsedWebsites.hasOwnProperty(property)) {
			console.log(parsedWebsites[property])
			websitesCallback(parsedWebsites[property]);
		}
	}

			for (var j = 0; j < 4; j++ ) {
			var websitesHTMLInsertFormat = "<input name='websites[]'/><br/>";
			callbackCounter++;
			$(websitesHTMLInsertFormat).appendTo($('#websites'));
		}


	function websitesCallback(website) {
<<<<<<< HEAD
		var websitesHTMLInsertFormat = "<input name='websites[" + callbackCounter + "]'' value='" + website + "' /></br>"
=======
		var websitesHTMLInsertFormat = "<input onclick='window.open(this.value);' name='websites[" + callbackCounter + "]'' value='" + website + "'/></br>"
>>>>>>> 138f1aa3fa2906d1b22995fbda798a3a505a803a
		callbackCounter++;
		console.log(callbackCounter);
		console.log(websitesHTMLInsertFormat)
		$(websitesHTMLInsertFormat).appendTo($('#websites'));
	}
	console.log(websites)


	//counts images in database. If there isn't room, disables additional image upoads.
	toggle_image_upload();
	function toggle_image_upload() {
		if (image_count == 4 ) {
		var disable_image_upload = "<p>Please delete an image to upload additional images.</p>"
		$('#images').replaceWith(disable_image_upload);

		}
	}

	

</script>
</body>
</html>