$(document).ready(function() {
  var compare_items = JSON.parse(localStorage.getItem('quiz'));
  console.log(compare_items);
  // for each object the the compare_items array, add the name and image to the
  // page.

  /////** remember to add in images from database and remove link **/////
  // $.each(compare_items, function() {
  //   $('.cf').append('<div class="fl w-100 w-50-m w-25-l tc pv4">'+
  //       '<article class="br2 ba dark-gray b--black-10 bw2 mv1 w-100 mw10 center">'+
  //       '<div class="pa2 ph3-ns pb3-ns"><div class="dt w-100 mt1">'+
  //       '<div class="dtc tr"><a href="#" class="pointer no-underline" id="'+this.id+'""><h2 class="f4 mv0 blue nunito">x</h2></a></div>'+
  //       '</div><img src="http://chibuzouguru.com/img/prod3.png" class="bg-light-gray w6 mt2">'+
  //       '<h3 class="silver f4 b">'+this.name+'</h3></div>');
  // });

  // when the user clicks on the the 'X', the product is removed from the
  // comparison page as well as the local storage.
  // $('a').click(function(e) {
  //   if ($(this).attr("id")) {
  //     var id = ($(this).attr('id'));
  //     var remove_array = JSON.parse(localStorage.getItem('array'));
  //     for(var i = 0; i < remove_array.length; i++) {
  //       if(remove_array[i].id == id) {
  //         remove_array.splice(i, 1);
  //         localStorage.setItem('array', JSON.stringify(remove_array));
  //       }
  //     }
  //     e.target.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
  //   } else {
  //     console.log('no id attribute');
  //   }
  //   e.stopPropagation();
  // });
});
