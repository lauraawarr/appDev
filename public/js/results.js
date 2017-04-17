$(document).ready(function() {
  // create function that adds the obeject to the array
  var addObj = function(obj) {
    var retrieved_array = JSON.parse(localStorage.getItem('array'));
    for(var i = 0; i < retrieved_array.length; i++) {
      if(obj.id === retrieved_array[i].id) {
        console.log("id exists");
        return false;
      }
    }
    // push into the array from localStorage
    retrieved_array.push(obj);
    // add the array back into localStorage
    localStorage.setItem('array', JSON.stringify(retrieved_array));
    console.log(retrieved_array);
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
