
let tabs = (function ($) {
    'use strict';

    function init() {
        $('.tabs-nav a').on('click', function (e) {
            e.preventDefault();
            var $this = $(this)
                ,$container = $this.closest('.tabs');
            $('li',$container).removeClass('active');
            $('.tab-pane',$container).removeClass('active');
            $this.parent().addClass('active');
            $($this.attr('href')).addClass('active');
        });

    }

    return {
        init: init
    };

}(jQuery));

export default tabs;