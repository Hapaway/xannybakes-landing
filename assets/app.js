$(document).ready(main);

function main() {
  var $imgs = $('.gallery img');
  $imgs.fadeTo(0, 0.01);
  $imgs.each(function(i) {
    var e = $(this);
    setTimeout(function() {
      e.fadeTo(250, 1);
    }, (i*2)*50);
  });
}