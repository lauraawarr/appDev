$(window).on("load", function() {

   // IMPORTANT
   // THIS ANSWERS OBJECT SHOULD BE RETRIEVED FROM WHEREVER IT WAS STORED AND USED HERE, INSTEAD OF THE BLANK VERSION BELOW
   var answers = {"q1": "", "q2": "", "q3": "", "q4": ""};

   function openAnswers(questionNum) {
      $("#question-" + questionNum + " h6").on("click", function() {
         $("#question-" + questionNum + " input, #question-" + questionNum + " label").removeClass("dn");
      });

      $(".q" + questionNum).on("click", function() {

         var q = $("input[name=q" + questionNum + "]:checked").val();
         answers["q" + questionNum] = q;
         console.log(q);
         console.log(answers);
      });
   };

   // this number needs to be set
   var totalQuestions = 4;

   for (i=1; i<totalQuestions+1; i++) {
      openAnswers(i);
   }
});
