$(document).ready(function() {
  var addObj = function(obj) {
    var retrieved_object = JSON.parse(localStorage.getItem('quiz'));
    if(retrieved_object[quizId]) {
      var array = retrieved_object[quizId];
    } else {
      var array = [];
    }
    for(var i = 0; i < array.length; i++) {
      if(obj.id === array[i].id) {
        console.log("id exists");
        console.log(retrieved_object);
        return false;
      }
    }
    array.push(obj);
    console.log(array);
    retrieved_object[quizId] = array;
    localStorage.setItem('quiz', JSON.stringify(retrieved_object));
  }
  // add event handlers to the buttons for each product
  $('#btn1').click(function() {
    addObj(result[0]);
  });

  $('#btn2').click(function() {
    addObj(result[1]);
  });

  $('#btn3').click(function() {
    addObj(result[2]);
  });

  $('#btn4').click(function() {
    addObj(result[3]);
  });

  // toggle the description
  $('.view-description-1').click(function(e) {
    $('.dn-0').slideToggle();
  });
  $('.view-description-2').click(function() {
    $('.dn-1').slideToggle();
  });
  $('.view-description-3').click(function() {
    $('.dn-2').slideToggle();
  });
});
