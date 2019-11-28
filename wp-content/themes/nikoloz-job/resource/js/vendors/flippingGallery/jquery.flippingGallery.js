/* ===========================================================
 * jquery-flippingGallery.js v1.1
 * ===========================================================
 * Copyright 2013 Pete Rojwongsuriya.
 * https://www.thepetedesign.com
 *
 * Create a simple but beautiful
 * 3D flipping gallery with on JS call
 *
 * https://github.com/peachananr/flippingGallery
 *
 * ========================================================== */

(function($) {
  //  Don't throw any errors when jQuery
  if(!$) {
    return console.warn('flippinGallery needs jQuery');
  }

  $.FlippinGallery = function(context, options) {
    var self = this;

    self._ = 'fg';

    self.defaults = {
      direction: "forward",
      flipDirection: "bottom",
      spacing: 10,
      showMaximum: 15,
      enableScroll: true,
      enableCaption:true,
      autoplay: false,
      arrows: {
        flipBackward: '<a class="' + self._ + '-arrow prev"></a>',
        flipForward: '<a class="' + self._ + '-arrow next"></a>'
      },
      selectors: {
        container: 'div:first',
        slides: '.fg-slide'
      },
    };

    self.$context = context;
    self.$container = null;
    self.$slides = null;
    self.$caption = null;
    self.options = {};

    self.total = 0;
    self.space = 0;
    self.scale = 0;
    self.opacity = 0;
    self.lastAnimation = 0;
    self.quietPeriod = 500;
    self.$arrows = [];

    //  Get everything set up innit
    self.init = function(options) {
      //  Set up our options inside here so we can re-init at
      //  any time
      self.options = $.extend({}, self.defaults, options);

      //  Our elements
      //self.$container = self.$context.find(self.options.selectors.container).addClass(self._ + '-container');
      self.$container = self.$context.addClass(self._ + '-container');
      self.$slides = self.$container.find(self.options.selectors.slides);

      if(self.options.enableCaption) {
        self.$caption = $('<div class="' + self._ + '-caption"></div>');
        self.$container.prepend(self.$caption);
      }


      //  We'll manually init the container
      self.setup();

      //  We want to keep this script as small as possible
      //  so we'll optimise some checks
      $.each(['arrows'], function(index, module) {
        self.options[module] && self['init' + $._ucfirst(module)]();
      });

      //  Add swipe support
      if(jQuery.event.special.swipe && self.options.swipe) {
        self.initSwipe();
      }

      self.initEvents();

      self.initScroll();

      //  If autoplay is set to true, call self.start()
      //  to start calling our timeouts
      self.options.autoplay && self.start();

      //  We should be able to recalculate slides at will
      self.calculateSlides();

      //  Listen to a ready event
      self.$context.trigger(self._ + '.ready');
    };

    self.setup = function() {
      self.total = self.$slides.length;
      self.scale = 0.5 / self.total;
      self.opacity = 1 / self.total;
    };

    self.calculateSlides = function() {
      self.$slides = self.$container.find(self.options.selectors.slides);
      $.each(self.$slides, function(i) {
        var $this = $(this);
        if (i == 0) {
          $this.addClass(self._ + '-active ' + self.options.flipDirection);
          if(self.options.enableCaption) {
            self.$caption.remove();
            if ($this.data('caption')) {
              self.$caption = $('<div class="' + self._ + '-caption" style="opacity: 0;">' + $this.attr('data-caption') + '</div>');
              self.$container.append(self.$caption);
              self.$caption.css({'opacity': 1});
            }
          }
        }

        self.space = self.space  + self.options.spacing;

        var new_scale = 1 - (self.scale * i);
        var new_opacity = 1 - (self.opacity * i);

        if (i >= self.options.showMaximum) {
          $this.css("opacity", 0);
        } else {
          $this.css("opacity", 1);
        }

        $this.addClass(self._ +  '-item animate').css({
          'z-index': 5 - i,
          'margin-top': '-' + self.space + 'px',
          '-webkit-transform': "scale(" + new_scale + ')',
          '-moz-transform': "scale(" + new_scale + ')',
          '-o-transform': "scale(" + new_scale + ')',
          'transform': "scale(" + new_scale + ')',
          'opacity': new_opacity
        });

        $this.on('click', function (e) {
          e.preventDefault();
        });

      });
    };

    self.start = function () {
      setInterval(function() {
        if(self.$container.filter(':hover').length < 1) {
          self.flipForward();
        }
      }, self.options.autoplay);
    };

    //  Set up our left-right arrow navigation
    //  (Not keyboard arrows, prev/next buttons)
    self.initArrows = function() {
      if(self.options.arrows === true) {
        self.options.arrows = self.defaults.arrows;
      }

      //  Loop our options object and bind our events
      $.each(self.options.arrows, function(key, val) {
        //  Add our arrow HTML and bind it
        self.$arrows.push(
            $(val).appendTo(self.$container).on('click', self[key])
        );
      });
    };

    self.initEvents = function() {
      self.$container.on('click','.' + self._ +'-item.' + self._ + '-active', function(e) {
        e.preventDefault();
        if (self.options.direction == 'forward') {
          self.flipForward();
        } else {
          self.flipBackward();
        }
      });
    };
    self.initScroll = function() {
      if (self.options.enableScroll == true) {
        self.$container.on('mousewheel DOMMouseScroll', function (e) {
          e.preventDefault();
          var delta = e.originalEvent.wheelDelta || -e.originalEvent.detail;
          self.scroll(e, delta);
        });
      }
    };
    self.initSwipe = function() {
      var width = self.$slides.width();

      self.$container.on({
        swipeleft: self.flipForward,
        swiperight: self.flipBackward,

        movestart: function(e) {
          //  If the movestart heads off in a upwards or downwards
          //  direction, prevent it so that the browser scrolls normally.
          if((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
            return !!e.preventDefault();
          }
        }
      });
    };

    //  Remove any trace of arrows
    //  Loop our array of arrows and use jQuery to remove
    //  It'll unbind any event handlers for us
    self.destroyArrows = function() {
      $.each(self.$arrows, function($arrow) {
        $arrow.remove();
      });
    };

    //  Remove any swipe events and reset the position
    self.destroySwipe = function() {
      //  We bind to 4 events, so we'll unbind those
      self.$container.off('movestart move moveend');
    };

    self.scroll = function(e, delta) {
      var deltaOfInterest = delta;
      var timeNow = new Date().getTime();
      // Cancel scroll if currently animating or within quiet period
      if(timeNow - self.lastAnimation < self.quietPeriod + self.options.animationTime) {
        e.preventDefault();
        return;
      }

      if (deltaOfInterest < 0) {
        self.flipForward();
      } else {
        self.flipBackward();
      }
      self.lastAnimation = timeNow;
    };

    self.flipForward = function() {
      if (!self.$container.hasClass('animating')) {
          self.$container.addClass('animating');
          //self.$caption.css({'opacity': 0});

        var slide = self.$slides.first();
        slide.addClass(self._ + '-flipping').css({'opacity': 0});
        slide.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
          var save_slide = slide.removeClass('animate '+self._+'-active '+self._+'-flipping [class^="' + self._ + '-count-"] ' + self.options.flipDirection).clone();
          slide.remove();
          self.$container.append(save_slide.hide());

          self.$container.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
            self.space = 0;
            self.calculateSlides();
          });

          self.$slides.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(e) {
            self.$slides.fadeIn();
            self.$container.removeClass('animating');
          });
        });
      }
    };


    self.flipBackward  = function () {
      if (!self.$container.hasClass("animating")) {
        self.$container.addClass("animating");
        var slide = self.$slides.last();
        var new_slide = slide.clone();
        slide.remove();
        self.$slides.filter('.'+ self._ + '-active').removeClass(self._ + '-active '  + self.options.flipDirection);
        self.$container.prepend(new_slide.attr('style', '')
            .css({
            'opacity': 0,
            'z-index': 99
          })
            .hide()
            .addClass(self._ + '-active ' + self._ +'-flipping '  + self.options.flipDirection));

        self.$slides = self.$container.find(self.options.selectors.slides);
        self.$slides.filter('.' + self._ + '-active')
            .addClass('animate')
            .show()
            .removeClass(self._ + '-flipping')
            .css('opacity', 1);

        self.space = 0;
        self.calculateSlides();
        self.$slides.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(e) {
          self.$container.removeClass('animating');
        });
      }
    };

    //  Allow daisy-chaining of methods
    return self.init(options);

  };

  $._ucfirst = function(str) {
    //  Take our variable, run a regex on the first letter
    return (str + '').toLowerCase().replace(/^./, function(match) {
      //  And uppercase it. Simples.
      return match.toUpperCase();
    });
  };


  $.fn.flipForward = function() {
    return $.fn['flipForward'].apply(this, arguments);
  };

  $.fn.flipBackward = function() {
    return $.fn['flipBackward'].apply(this, arguments);
  };

  //  And set up our jQuery plugin
  $.fn.flippingGallery = function(opts) {
    return this.each(function() {
      var $this = $(this);

      //  Allow usage of .flippingGallery('function_name')
      //  as well as using .data('flippingGallery') to access the
      //  main Unslider object
      if(typeof opts === 'string' && $this.data('flippingGallery')) {
        opts = opts.split(':');

        var call = $this.data('flippingGallery')[opts[0]];

        //  Do we have arguments to pass to the string-function?
        if($.isFunction(call)) {
          return call.apply($this, opts[1] ? opts[1].split(',') : null);
        }
      }

      return $this.data('flippingGallery', new $.FlippinGallery($this, opts));
    });
  };

})(window.jQuery);