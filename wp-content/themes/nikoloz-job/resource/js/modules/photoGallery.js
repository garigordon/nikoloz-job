import imagesLoaded from 'imagesloaded'

let photoGallery = (function ($) {
    'use strict';

    function init() {
        var $gallery = $(".photo-gallery");
        $gallery .imagesLoaded(function () {
            $gallery.masonry({
                columnWidth: '.photo-gallery-item',
                itemSelector: '.photo-gallery-item',
                percentPosition: true
                //  gutter: 10
            });
            //$(".photo-gallery-item").imagefill();
        });

    }

    return {
        init: init
    };

}(jQuery));

export default photoGallery;
