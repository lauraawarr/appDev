$(window).on("load", function() {

   var answers = {"q1": "", "q2": "", "q3": "", "q4": ""};
   var outTime = 500;
   var delayTime = 500;
   var inTime = 600;

   $(".q1").on("click", function() {
      var q1 = $('input[name=q1]:checked').val();
      answers["q1"] = q1;
      console.log(q1);
      console.log(answers);

      $("#question-1").animate({"opacity": 0}, outTime);
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
      setInterval(function() {
         $("#question-4").remove();
         $("#submit-answers").css("display", "block").animate({"opacity": 1}, inTime);
      }, delayTime);
   });


});
