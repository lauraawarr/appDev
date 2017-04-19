var imgName = null;
var imgSrc = null;
var imgFile = null;
var ajaxData;
var removeQuizId = 0;

// Grabs index of quiz to remove ( if delete is confirmed, removeQuiz route is triggered with this id )
$('.removeQuiz').on('mousedown', function(ev){
	removeQuizId = ev.target.id.replace('removeQuiz-', '');
});

/* Listen to click event on any submit button and handles case based on id */
$('input[type=submit], .submit').on('mousedown', function(ev){ getRoute(ev)});

function getRoute( ev ){
	var hash = ev.target.id;
	var trait = ($('#' + hash + '-Trait').val() || null );
	var name = ($('#' + hash + '-Name').val() || null );
	var description = ($('#' + hash + '-Description').val() || null );
	var image = imgName;
	var data = {
		trait : trait,
		name: name,
		description: description,
		image: image,
		quizId: quizId,
		removeQuizId: removeQuizId
	};

	if (hash == "submitProduct"){
		ajaxData = data;
		sendData( '../uploadImage', new FormData($("#product-upload")[0]), false, false );

	} else if (hash == "submitRanks"){
		sendData( '../' + hash + '/' + quizId, new FormData($('#ranking')[0]), false, false);

	} else if (hash.includes("removeQuiz")){
		sendData( hash, data); 
		$( '#Quiz-' + removeQuizId).hide('slow');
	} else if (hash.includes("removeProduct") || hash.includes("removeTrait")){
		var tempArray = hash.split("-");
		var url = tempArray[0];
		var removeId = tempArray[1];
		ajaxData = data;
		ajaxData.removeId = removeId;
		console.log( url );
		sendData( '../' + url + '/' + quizId, ajaxData );
		$( '#' + url.replace('remove', '') + '-' + removeId).hide('slow');

	} else if (hash == "newQuiz"){
		sendData( '../' + hash, data);

	} else {
		sendData( '../' + hash + '/' + quizId, data);
	};
};

/* Upload an image */
function previewFile( file ) {
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    imgName = file.name;
    imgSrc = reader.result;
    $('#image-name').text( imgName );
    console.log( imgFile );
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
};

/* Preview added products as thumbnails */
function previewProduct( name, des, imgSrc, prodId){
	$('#products').prepend( '<div id="Product-'+ prodId +'" class="w-100 w-46-m w-30-l pa4 bw1 b--solid b--light-gray tc relative product mb3 mh1"><div id="removeProduct-'+ prodId +'" class="submit link blue absolute top-1p right-1 delete-product pointer">x</div><img src="../uploads/'+ imgSrc +'" width="333" class="w-90 mt2"/><p class="f6">'+ name +'</p><a href="" class="db br1 bg-blue w-100 pv2 tc link white f6">Edit</a></div>');
	$('#removeProduct-'+ prodId).on('mousedown', function(ev){ getRoute(ev) });
	$('#submitProduct-Name').val(null);
	$('#submitProduct-Description').val(null);
	$('#image-name').text( null );
};

/* Preview added trait in list */
function previewTrait( trait, traitId ){
	$('#traits').prepend( '<div id="Trait-'+ traitId + '" class="bb bw1 b--light-gray ph2 pt3 pb2 flex justify-between"><span>'+ trait + '</span><span><a href="" class="ttu f7 mr2 link blue">Edit</a><a id="removeTrait-'+ traitId +'" href="" class="submit link blue ml1">x</a></span></div>');
	$('#Trait-'+ traitId).on('mousedown', function(ev){ getRoute(ev)});
	$('#submitTrait-Trait').val(null);
};

/* Send user's data to the server and returns response */
function sendData( url, data, process, type ){
	if (process == null) process = true;
	if (type == null) type = 'application/x-www-form-urlencoded; charset=UTF-8';
	return $.ajax({
		type: "POST",
		url: url,
		data: data,
		contentType: type,
		processData: process,
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
			if (url.includes("newQuiz") || url.includes("updateQuiz")) window.location.href = "../admin-step2/" + data.quizId;
			if (url.includes("submitProduct")){
				previewProduct( data.name, data.description, data.img, data.prodId );
			};
			if (url.includes("submitTrait")){
				previewTrait( data.trait, data.traitId );
			};;
			if (url.includes("uploadImage")){
				ajaxData.image = data.imgName;
				sendData( '../submitProduct', ajaxData);
			}; 
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