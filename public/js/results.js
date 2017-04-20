$(document).ready(function() {
  // this function will add a result object into
  // an array that is stored in an object in localStorage
  var addObj = function(obj) {
    var retrieved_object = JSON.parse(localStorage.getItem('quiz'));
    if(retrieved_object[quizId]) {
      var array = retrieved_object[quizId];
    } else {
      var array = [];
    }

    // check if the id of the current result item is already
    // in the array, if it is, don't add it again
    for(var i = 0; i < array.length; i++) {
      if(obj.id === array[i].id) {
        console.log("id exists");
        return false;
      }
    }

    // if the id of the result is not in the array,
    // push in the whole object for that result into
    // the array.
    array.push(obj);
    console.log(array);
    retrieved_object[quizId] = array;
    localStorage.setItem('quiz', JSON.stringify(retrieved_object));
  }

  // add event handlers to the buttons for each product.
  // when each button is clicked, it calls the addObj function
  // on a specific result from the result array.
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
    $('.dn-0').slideToggle("fast");
  });
  $('.view-description-2').click(function() {
    $('.dn-1').slideToggle("fast");
  });
  $('.view-description-3').click(function() {
    $('.dn-2').slideToggle("fast");
  });
});
