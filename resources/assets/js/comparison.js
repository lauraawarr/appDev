$(document).ready(function() {
  // get the stored object from localStorgae
  // the object will include all the items saved from each quiz,
  // with the quizId being the results identifier
  var compare_items = getCompareFromLocalStorage();
  console.log(compare_items);
  if(compare_items.hasOwnProperty(quizId)) {
    var items = compare_items[quizId];
  }
  console.log(items);

  // loop through the array of objects in the results and
  // add them to the compare page.
  $.each(items, function() {
    $('.cf').append('<div class="fl w-100 w-50-m w-25-l tc pv4">'+
        '<article class="br2 ba dark-gray b--black-10 bw2 mv1 w-100 mw10 center">'+
        '<div class="pa2 ph3-ns pb3-ns"><div class="dt w-100 mt1">'+
        '<div class="dtc tr"><a href="#" class="pointer no-underline" id="'+this.id+'""><h2 class="f4 mv0 blue nunito">x</h2></a></div>'+
        '</div><img src="../uploads/'+this.img+'" class="bg-light-gray w6 mt2">'+
        '<h3 class="silver f4 b">'+this.name+'</h3></div>');
  });

  // when the user clicks on the the 'X', the product is removed from the
  // comparison page as well as the local storage.
  $('a').click(function(e) {
    if ($(this).attr("id")) {
      var id = ($(this).attr('id'));
      var retrieved_items = getCompareFromLocalStorage();
      var remove_array = retrieved_items[quizId];
      for(var i = 0; i < remove_array.length; i++) {
        if(remove_array[i].id == id) {
          remove_array.splice(i, 1);
          console.log(retrieved_items);
          setCompareToLocalStorage(retrieved_items);
        }
      }
      e.target.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
    } else {
      console.log('no id attribute');
    }
    e.stopPropagation();
  });

  // functions for getting values from local storage and
  // putting values back into localStorage
  function getCompareFromLocalStorage() {
    var compare_items = JSON.parse(localStorage.getItem('quiz'));
    return compare_items;
  }

  function setCompareToLocalStorage(array) {
    localStorage.setItem('quiz', JSON.stringify(array));
  }
});
