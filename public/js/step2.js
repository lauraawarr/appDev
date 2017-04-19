$(document).ready(function() {

   $(".delete-product").on("click", function() {
      console.log($(this));
      $(this).closest(".product").remove();
   });

   $(".cta-button").on("click", function(ev) {
      if ($("input[name=product-name]").val() == undefined || $("input[name=product-name]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a product name.");
      } else if ($("input[name=product-description]").val() == undefined || $("input[name=product-description]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a product description.");
      };
   });
})
