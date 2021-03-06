$(window).on("load", function() {

   // IMPORTANT
   // THIS ANSWERS OBJECT SHOULD BE RETRIEVED FROM WHEREVER IT WAS STORED AND USED HERE, INSTEAD OF THE BLANK VERSION BELOW
   var answers = userArray;

   function openAnswers(questionNum) {
      $("#question-" + questionNum + " h6").on("click", function() {
         $("#question-" + questionNum + " input, #question-" + questionNum + " label").removeClass("dn");
      });

      $(".q" + questionNum).on("click", function() {

         var q = $("input[name=q" + questionNum + "]:checked").val();
         answers[questionNum - 1] = q;
         console.log(q);
         console.log(answers);
      });
   };


   for (i=1; i<totalQuestions+1; i++) {
      openAnswers(i);
   }

   $('#submit-answers').on('mousedown', function(ev){
      ev.preventDefault();
      var answerString = answers.toString().replace(/,/g , "");
      window.location.href = "../../results/" + quizId + "/" + answerString;
   });
});
