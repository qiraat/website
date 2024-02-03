;(function ($) {

    "use strict";
    /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        // Testimonial Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/qiraat-testimonial-one-widget.default', function ($scope) {
            activeTestimonialSliderOne($scope);
        });
        /* Counter Up */
        elementorFrontend.hooks.addAction('frontend/element_ready/qiraat-counterup-one-widget.default', function ($scope) {
            counterupInit($scope.find('.count-num'));
        });

    });

    // JS for rtl
    var rtlEnable = $('html').attr('dir');
    var SlickRtlValue = !(typeof rtlEnable === 'undefined' || rtlEnable === 'ltr');



    /*----------------------------
    * Testimonial Slider
    * --------------------------*/
    function activeTestimonialSliderOne($scope) {
        var el = $scope.find('.testimonial-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            dots: elSettings.dot === 'yes',
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            vertical: elSettings.vertical === 'yes',
            rtl: SlickRtlValue,
            appendArrows: $scope.find('.slick-carousel-controls .slider-nav'),
            appendDots: $scope.find('.slick-carousel-controls .slider-dots'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            centerPadding: elSettings.centerpadding + 'px',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerPadding: 0,
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerPadding: 0,

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: 0,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: 0,
                        arrows: false

                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);

    }


    //slick init function
    function wowSlickInit($selector, settings, animateOut = false) {
        $($selector).slick(settings);
    }

    /*------------------------------
            counter section activation
          -------------------------------*/
    function counterupInit($scope) {
        $scope.counterUp({
            delay: 20,
            time: 3000
        });
    }

    $(document).ready(function () {
        /*--------------------
          wow js init
      ---------------------*/
        new WOW().init();

        /*---------------------------------
        * Magnific Popup
        * --------------------------------*/
        $('.video-play-btn,.video-play-btn-02,.play-video-btn,.button-video').magnificPopup({
            type: 'video',
            removalDelay: 400,
            preloader: false,
        });
        // Nice select
        // $("select").niceSelect();

    });

})(jQuery);

