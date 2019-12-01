
$(document).ready(function() {
  // Check if element is scrolled into view
  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }
  // If element is scrolled into view, fade it in
  $(window).scroll(function() {
    $('.scroll-animation-in-left .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('fadeInLeft');
      }
    });
    $('.scroll-animation-in-right .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('fadeInRight');
      }
    });
    $('.scroll-animation-bounce-in-down .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('bounceInDown');
      }
    });
    $('.scroll-animation-bounce-in-up .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('bounceInUp');
      }
    });
    $('.scroll-animation-bounce .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('bounce');
      }
    });
    $('.scroll-animation-zoom-in .animated').each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('zoomIn');
      }
    });
  });
});
