$(document).ready(function() {

   $(".cta-button").on("click", function(ev) {
      if ($("input[name=quiz-name]").val() == undefined || $("input[name=quiz-name]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a quiz name.");
      } else if ($("input[name=quiz-description]").val() == undefined || $("input[name=quiz-description]").val() == "") {
         ev.preventDefault();
         $(".error-message").html("Please enter a quiz description.");
      };
   });
});
