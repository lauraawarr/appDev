$(document).ready(function() {
  var compare_items = JSON.parse(localStorage.getItem('array'));
  // for each object the the compare_items array, add the name and image to the
  // page.
  $.each(compare_items, function() {
    $('#results').append('<div class="ind-result dtc-ns tc ba pv4 relative '+this.id+'">'+
      '<a href="#" class="pointer absolute ba top-0-m right-6-m" id="'+this.id+'"">X</a>'+
      '<h3 class="silver f4 b">'+this.name+'</h3><div><img src="http://chibuzouguru.com/img/prod3.png" class="bg-light-gray w6">'+
      '</div></div>');
  });

  // when the user clicks on the the 'X', the product is removed from the
  // comparison page as well as the local storage.
  $('a').click(function(e) {
    //e.stopPropagation();
    if ($(this).attr("id")) {
      var id = ($(this).attr('id'));
      var remove_array = JSON.parse(localStorage.getItem('array'));
      for(var i = 0; i < remove_array.length; i++) {
        if(remove_array[i].id == id) {
          remove_array.splice(i, 1);
          localStorage.setItem('array', JSON.stringify(remove_array));
        }
      }
      e.target.parentNode.remove();
    } else {
      console.log('no id attribute');
    }
    e.stopPropagation();
  });
});
