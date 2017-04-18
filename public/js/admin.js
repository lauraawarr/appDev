var imgName = null;
var imgSrc = null;

/* Listen to click event on any submit button and handles case based on id */
$('input[type=submit], .submit').on('mousedown', function(ev){
	var hash = ev.target.id;
	var trait = ($('#' + hash + '-Trait').val() || null );
	var name = ($('#' + hash + '-Name').val() || null );
	var description = ($('#' + hash + '-Description').val() || null );
	var image = imgName;
	var data = {
		trait : trait,
		name: name,
		description: description,
		image: image
	};
	sendData( hash , data);

	if ( name && description && imgSrc ) previewProduct( name, description, imgSrc );
	if ( trait ) previewTrait( trait );

});

/* Upload an image */
function previewFile( file ) {
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    imgName = file.name;
    imgSrc = reader.result;
    $('#image-name').text( imgName );
    console.log('Name: ', imgName);
    // console.log(reader.result);
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
};

/* Preview added products as thumbnails */
function previewProduct( name, des, imgSrc ){
	$('#products').prepend( '<img src="' + imgSrc + '" height="200">');
	$('#submitProduct-Name').val(null);
	$('#submitProduct-Description').val(null);
	$('#image-name').text( null );
};

/* Preview added trait in list */
function previewTrait( trait ){
	$('#traits').prepend( '<div>' + trait + '</div>');
	$('#submitTrait-Trait').val(null);
};

/* Send user's data to the server and returns response */
function sendData( url, data ){
	return $.ajax({
		type: "POST",
		url: url,
		data: data,
		beforeSend: function (xhr) {
	        // Function needed from Laravel because of the CSRF Middleware
	        var token = $('meta[name="csrf-token"]').attr('content');

	        if (token) {
	            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	        }
	    },
	    success: function( data ){
	    	var response = data.result;
			console.log( data );
			// if (url == "newQuiz") window.location.href = "admin-step2";

		},
		error: function( data ){
			console.log( "Error");
			$('body').html( data.responseText );
			console.log( data );
		},
		complete: function( data ){
			console.log( "complete" );
		}
	});
};