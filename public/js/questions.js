$(document).ready(function(){var t={q1:"",q2:"",q3:"",q4:""},n="",o=500,e=500,s=600,a=0;for(i=1;i<totalQuestions+1;i++)!function(i){$(".q"+i).on("click",function(){a=Math.round(i/totalQuestions*100),$("#quiz-bar").css("width",a+"%"),$("#done-text").html(a);var u=$("input[name=q"+i+"]:checked").val();t["q"+i]=u,n+=u,console.log(u),console.log(t),$("#question-"+i).animate({opacity:0},o),setInterval(function(){$("#question-"+i).remove(),$("#question-"+(i+1)).css("display","block").animate({opacity:1},s)},e),i==totalQuestions&&($("#submit-answers").removeClass("dn").addClass("db"),setInterval(function(){$("#submit-answers").animate({opacity:1},s)},e))})}(i);$("#submit-answers").on("mousedown",function(t){t.preventDefault(),window.location.href="../results/"+quizId+"/"+n})});