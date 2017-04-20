$(document).ready(function() {
   $(".delete").on("mousedown", function(ev) {
      var quiz = $(this).closest(".quiz");

      $("#confirm-delete-box, #confirm-overlay").removeClass("dn");

      $("#removeQuiz").on("mousedown", function(ev) {
         getRoute( ev );
         console.log("clicked delete");
         quiz.remove();
         $("#confirm-delete-box, #confirm-overlay").addClass("dn");
      });

      $("#cancel-button").on("mousedown", function() {
         console.log("clicked cancel");
         $("#confirm-delete-box, #confirm-overlay").addClass("dn");
      });
   });
})
