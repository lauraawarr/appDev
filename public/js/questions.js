/* Settings */
var url = "submitAnswer"; // web route
var dataObj = []; // array of user's answers

/* Append user's answers to the data array */
dataObj.push( parseInt($('.input').text()) );

/* Send user's answers to the server */
var ajaxObj = $.ajax({
	type: "POST",
	url: url,
	data: { userArray : [5,4,3,1]},
	beforeSend: function (xhr) {
        // Function needed from Laravel because of the CSRF Middleware
        var token = $('meta[name="csrf-token"]').attr('content');

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    },
    success: function( data ){
		console.log( data );
		var response = data.result;
		// Do whatever with the result:
		$('.results').text( "Remaining: " + response.length );
	},
	error: function( data ){
		console.log( "Error");
		$('.results').html( data.responseText );
		console.log( data );
	},
	complete: function( data ){
		console.log( "complete" );
	}
});
