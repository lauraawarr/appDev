$(document).ready(function() {

   $(".delete-product").on("mousedown", function(ev) {
      getRoute(ev);
   });

   $(".cta-button").on("mousedown", function(ev) {
      if ($("input[name=product-name]").val() == undefined || $("input[name=product-name]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a product name.");
      } else if ($("textarea").val() == undefined || $("textarea").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a product description.");
      } else if (!isImage( $("input[name=image]").val() )) {
         ev.preventDefault();
         $(".error-message").html("Please choose a valid image file.");
      } else {
         getRoute(ev);
      };
   });
});


function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
    case 'jpeg':
        //etc
        return true;
    }
    return false;
}
