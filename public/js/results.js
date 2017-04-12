/* Settings */
var url = "getResult"; // web route
var dataObj = []; // array of user's answers

/* Append user's answers to the data array */
dataObj.push( parseInt($('.input').text()) );

/* Send user's answers to the server */
var ajaxObj = $.ajax({
	type: "POST",
	url: url,
	data: { userArray : [1,2,3,4]},
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
		/* Do whatever with the result */
		// A sample:
		$('.results').html( "Top Choice: " + response[0].name + "<br/>" + response[0].description
			+ "<br/></br> Other suggestions: </br>" + response[1].name + "</br>" + response[2].name + "</br>" + response[3].name);
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
