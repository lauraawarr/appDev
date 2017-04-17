$(document).ready(function() {
  var compare_items = JSON.parse(localStorage.getItem('array'));
  $.each(compare_items, function() {
    $('#results').append('<div class="ind-result dtc-ns tc pv4 relative">'+
      '<div class="pointer absolute top-0-m right-0-m"><img src="fonts/close.svg"></div>'+
      '<h3 class="silver f4 b">'+this.name+'</h3><div><img src="http://chibuzouguru.com/img/prod3.png" class="bg-light-gray w6">'+
      '</div></div>');
  });
  // console.log(compare_items);
});

// need to add a thicker font-weight for avenir
//<div class="ind-result dtc-ns tc pv4"><h3 class="silver f4 b">'+this.name+'</h3>'+
  //'<div><img src="http://chibuzouguru.com/img/prod3.png" class="bg-light-gray w6"></div>
