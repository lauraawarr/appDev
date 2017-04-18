$(document).ready(function() {

   $(".delete-product").on("click", function() {
      console.log($(this));
      $(this).closest(".product").remove();
   })
})
