$('input[type=submit]').on('mousedown', function(ev){
	
	var hash = ev.target.id;
	var question = ($('#' + hash + 'Input').val() || null );
	var name = ($('#' + hash + 'InputName').val() || null );
	var description = ($('#' + hash + 'InputDescription').val() || null );
	var data = {
		question : question,
		name: name,
		description: description
	};
	var response = sendData( hash , data);
	console.log( response );
});


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
			console.log( response );

		},
		error: function( data ){
			console.log( "Error");
			$('.error').html( data.responseText );
			console.log( data );
		},
		complete: function( data ){
			console.log( "complete" );
		}
	});
};