$(document).ready(function() {
   $(".delete").on("click", function() {
      var quiz = $(this).closest(".quiz");

      $("#confirm-delete-box, #confirm-overlay").removeClass("dn");

      $("#removeQuiz").on("click", function() {
         console.log("clicked delete");
         quiz.remove();
         $("#confirm-delete-box, #confirm-overlay").addClass("dn");
      });

      $("#cancel-button").on("click", function() {
         console.log("clicked cancel");
         $("#confirm-delete-box, #confirm-overlay").addClass("dn");
      });
   })
})
