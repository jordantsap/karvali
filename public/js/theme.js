// function show(howto) {document.getElementById(howto).style.display = 'block';}
// function hide(howto) {document.getElementById(howto).style.display = 'none';}

(function ($) {

    "use strict";

   /*==================================================================

    [ Simple slide100 ]*/

    $('.simpleslide100').each(function(){

        var delay = 3000;

        var speed = 1000;

        var itemSlide = $(this).find('.simpleslide100-item');

        var nowSlide = 0;

        $(itemSlide).hide();

        $(itemSlide[nowSlide]).show();

        nowSlide++;

        if(nowSlide >= itemSlide.length) {nowSlide = 0;}

        setInterval(function(){

            $(itemSlide).fadeOut(speed);

            $(itemSlide[nowSlide]).fadeIn(speed);

            nowSlide++;

            if(nowSlide >= itemSlide.length) {nowSlide = 0;}

        },delay);

    });

})(jQuery);

window.onscroll = function() {scrollFunction()};

function scrollFunction() {

if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {

document.getElementById("topbtn").style.display = "block";

} else {

document.getElementById("topbtn").style.display = "none";

}

}
