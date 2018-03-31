jQuery(document).ready(function($){
  $(window).bind('scroll', function() {
    var distance = 50;
    if ($(window).scrollTop() > distance) {
      $('#content-header').addClass('opaque');
      // $('#content-header').hide('1500');
    }
    else {
      $('#content-header').removeClass('opaque');
      // $('#content-header').show();
    }
  });
});