import flippingGallery from '../vendors/flippingGallery/jquery.flippingGallery'

let advanceGallery = (function ($) {
    'use strict';

    function init() {
        $('#advance-gallery').flippingGallery({
            direction: "forward",
            spacing: 10,
            showMaximum: 15,
            autoplay: 3000,
            enableCaption:false,
            enableScroll: true
        });
    }

    return {
        init: init
    };

}(jQuery));

export default advanceGallery;
