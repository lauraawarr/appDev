$(document).ready(function() {

   $(".cta-button").on("mousedown", function(ev) {
      if ($("input[name=trait-name]").val() == undefined || $("input[name=trait-name]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a trait name.");
   	  } else {
   	  	getRoute( ev );
   	  };
   });

   $(".remove-trait").on("mousedown", function(ev){
   		getRoute(ev);
   });
});
