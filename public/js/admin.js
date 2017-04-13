/* Listen to click event on any submit button and handles case based on id */
$('input[type=submit]').on('mousedown', function(ev){

	var hash = ev.target.id;
	var trait = ($('#' + hash + '-Trait').val() || null );
	var name = ($('#' + hash + '-Name').val() || null );
	var description = ($('#' + hash + '-Description').val() || null );
	var image = ($('#' + hash + '-Image').val() || null );
	var data = {
		trait : trait,
		name: name,
		description: description,
		image: image
	};
	sendData( hash , data);

});

/* Listen for navigation between rank pages */
$('.navRank').on('mousedown', function(ev){
	ev.target.val();
});

/* Manage active divs within 'ranking' page */
var active = 1;
$('#topic-1').addClass('active');

function rankingNav( dir ){

	$('#topic-' + active ).removeClass('active'); // remove active class form current div

	if ( dir == 'next'){
		active++;
	} else if ( dir == 'prev' ){ // if current div is 1, do not decrease
		if ( active - 1 > 0 ) active--;
	}
	$('#topic-' + active ).addClass('active'); // assign class active to new div
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