$(window).on("load", function() {

   // object to keep track of user's answers
   var answers = {"q1": "", "q2": "", "q3": "", "q4": ""};

   function openAnswers(questionNum) {
      $("#question-" + questionNum + " h6").on("click", function() {
         $("#question-" + questionNum + " input, #question-" + questionNum + " label").removeClass("dn");
      });
   };

   // this number needs to be set
   var totalQuestions = 4;

   for (i=1; i<totalQuestions+1; i++) {
      openAnswers(i);
   }
});
