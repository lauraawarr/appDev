$(document).ready(function() {

   $(".cta-button").on("click", function(ev) {
      if ($("input[name=trait-name]").val() == undefined || $("input[name=trait-name]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a trait name.");
   	};
   });
})
