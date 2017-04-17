$(window).on("load", function() {

   // object to keep track of user's answers
   var answers = {"q1": "", "q2": "", "q3": "", "q4": ""};

   // delay times to be used later
   var outTime = 500;
   var delayTime = 500;
   var inTime = 600;

   $(".q1").on("click", function() {
      // set q1 equal to the user's answer to question 1
      var q1 = $('input[name=q1]:checked').val();
      answers["q1"] = q1;
      console.log(q1);
      console.log(answers);

      // animate out question 1
      $("#question-1").animate({"opacity": 0}, outTime);

      // change circle-1's BG from blue to white
      $("#circle-1").removeClass("bg-blue").addClass("bg-white");
      // change circle-1's inner text from white to silver (silver is inherited from parent)
      $("#circle-1 span").removeClass("near-white");

      // change next circle's BG and text color
      $("#circle-2").addClass("active-circle bg-blue");
      $("#circle-2 span").addClass("near-white");

      // remove question 1, animate in question 2
      setInterval(function() {
         $("#question-1").remove();
         $("#question-2").css("display", "block").animate({"opacity": 1}, inTime);
      }, delayTime);
   });

   $(".q2").on("click", function() {
      var q2 = $('input[name=q2]:checked').val();
      answers["q2"] = q2;
      console.log(q2);
      console.log(answers);

      $("#question-2").animate({"opacity": 0}, outTime);

      $("#circle-2").removeClass("bg-blue").addClass("bg-white");
      $("#circle-2 span").removeClass("near-white");
      $("#circle-3").addClass("active-circle bg-blue");
      $("#circle-3 span").addClass("near-white");

      setInterval(function() {
         $("#question-2").remove();
         $("#question-3").css("display", "block").animate({"opacity": 1}, inTime);
      }, delayTime);
   });

   $(".q3").on("click", function() {
      var q3 = $('input[name=q3]:checked').val();
      answers["q3"] = q3;
      console.log(q3);
      console.log(answers);

      $("#question-3").animate({"opacity": 0}, outTime);

      $("#circle-3").removeClass("bg-blue").addClass("bg-white");
      $("#circle-3 span").removeClass("near-white");
      $("#circle-4").addClass("active-circle bg-blue");
      $("#circle-4 span").addClass("near-white");

      setInterval(function() {
         $("#question-3").remove();
         $("#question-4").css("display", "block").animate({"opacity": 1}, inTime);
      }, delayTime);
   });

   $(".q4").on("click", function() {
      var q4 = $('input[name=q4]:checked').val();
      answers["q4"] = q4;
      console.log(q4);
      console.log(answers);

      $("#question-4").animate({"opacity": 0}, outTime);

      $("#circle-4").removeClass("bg-blue").addClass("bg-white");
      $("#circle-4 span").removeClass("near-white");

      setInterval(function() {
         $("#question-4").remove();
         $("#submit-answers").css("display", "block").animate({"opacity": 1}, inTime);
      }, delayTime);
   });
});
