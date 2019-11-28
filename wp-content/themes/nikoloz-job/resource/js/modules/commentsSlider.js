
let commentsSlider = (function ($) {
    'use strict';

    function init() {
        $('.carousel').carousel();
    }

    return {
        init: init
    };

}(jQuery));

export default commentsSlider;
