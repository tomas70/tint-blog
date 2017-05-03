//menu trigger

$('.menu-trigger').on('click', function(){
  $(this).toggleClass('active');
	$('header').toggleClass('active');
  if( $(this).hasClass('active') ){
    disableScroll();
  }else{
    enableScroll();
  }
});