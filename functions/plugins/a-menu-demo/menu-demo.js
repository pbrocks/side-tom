jQuery(document).ready(function($){
  $("#main-menu > li > a").click(function(){
    $('ul.sub-menu').not($(this).siblings()).slideUp();
    $(this).siblings("ul.sub-menu").slideToggle();
  });
});
