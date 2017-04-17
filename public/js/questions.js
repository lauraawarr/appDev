$(window).on("load", function() {

   // object to keep track of user's answers
   var answers = {"q1": "", "q2": "", "q3": "", "q4": ""};

   // delay times to be used later
   var outTime = 500;
   var delayTime = 500;
   var inTime = 600;

   function updateAnswer(questionNum) {
      $(".q" + questionNum).on("click", function() {

         var q = $("input[name=q" + questionNum + "]:checked").val();
         answers["q" + questionNum] = q;
         console.log(q);
         console.log(answers);

         // animate out current question
         $("#question-" + questionNum).animate({"opacity": 0}, outTime);

         // change current circle's BG from blue to white
         $("#circle-" + questionNum).removeClass("bg-blue").addClass("bg-white");
         // change current circle's inner text from white to silver (silver is inherited from parent)
         $("#circle-" + questionNum + " span").removeClass("near-white");

         // change next circle's BG and text color
         $("#circle-" + (questionNum+1)).addClass("active-circle bg-blue");
         $("#circle-" + (questionNum+1) + " span").addClass("near-white");

         // remove current question, animate in next question
         setInterval(function() {
            $("#question-" + questionNum).remove();
            $("#question-" + (questionNum+1)).css("display", "block").animate({"opacity": 1}, inTime);
         }, delayTime);
      });
   };

   // this number needs to be set
   var totalQuestions = 4;

   for (i=1; i<totalQuestions+1; i++) {
      updateAnswer(i);
   };
});
