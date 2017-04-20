$(document).ready(function() {

   $(".cta-button").on("mousedown", function(ev) {
      if ($("input[name=quiz-name]").val() == undefined || $("input[name=quiz-name]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a quiz name.");
      } else if ($("textarea").val() == undefined || $("textarea").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a quiz description.");
      } else {
      	getRoute(ev);
      };
   });
});
