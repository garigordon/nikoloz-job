let slickHeader = (function ($) {
    'use strict';

    function init() {
        var $header = $('.js-header-sticky'),
            $w =  $(window),
            lastScrollTop = $w.scrollTop();
        check();
        //$w.on('scroll mousewheel', check);
        $w.on('scroll', check);
        function check(e) {
            var st = $w.scrollTop();
            if (st >80) {
                $header.addClass('header-shrink');
            }  else {
                $header.removeClass('header-shrink');
            }
            if(st > 150 && st > lastScrollTop){
                $header.addClass('header-hidden');
            } else {
                $header.removeClass('header-hidden');
            }
            lastScrollTop = st;
        }

    }

    return {
        init: init
    };

}(jQuery));

export default slickHeader;
