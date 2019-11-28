import bgVideo from "jquery-background-video";

let videoBackground = (function ($) {
    'use strict';

    function init() {
        $('.background-video').bgVideo({
            fadeIn: 2000,
            pauseAfter: 0,
            pausePlayYPos: 'bottom', // top|bottom|center
            pausePlayXOffset: '15px', // pixels or percent from side - ignored if positioned center
            pausePlayYOffset: '15px' // pixels or percent from top/bottom - ignored if positioned center
        });

    }

    return {
        init: init
    };

}(jQuery));

export default videoBackground;
