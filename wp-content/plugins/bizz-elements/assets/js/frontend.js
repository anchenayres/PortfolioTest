/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($, elementor) {
    "use strict";
    var BizzElements = {

        init: function () {

            var widgets = {
                'services.default'              : BizzElements.perspectiveHover,
                'simple-services.default'       : BizzElements.perspectiveHover,
                'animated-banner.default'       : BizzElements.widgetAnimatedBanner,
                'aea-animated-heading.default'  : BizzElements.widgetAnimatedHeading,
                'circular-bars.default'         : BizzElements.circularLoader,
                'product-slider.default'        : BizzElements.wooSlider,
                
                'testimonials.default'          : BizzElements.widgetTestimonials,
                'testimonials.layout-two'       : BizzElements.widgetTestimonialsTwo,
                'testimonials.layout-three'     : BizzElements.widgetTestimonialsThree,
                'testimonials.layout-four'      : BizzElements.widgetTestimonialsFour,
                'testimonials.layout-five'      : BizzElements.widgetTestimonialsFive,
                'testimonials.layout-six'       : BizzElements.widgetTestimonialsSix,
                'tabs.default'                  : BizzElements.widgetTabs,
                //'tabs.default'             : BizzElements.portfolioFilter,
                
                
                
               
            };

            $.each(widgets, function (widget, callback) {
                elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
            });

            elementor.hooks.addAction('frontend/element_ready/section', BizzElements.elementorSection);
        },
        
        perspectiveHover: function ($scope) {
              

            

                    var $card                       = $('.code-wrapp.services,.code-wrapp.simple-services .service-wrapp'),
                        $cardInner                  = $('.code-wrapp.services .inner-service,.code-wrapp.simple-services .service-inner-wrapp'),
                        $cardBorder                 = $('.code-wrapp.services .content-wrapp'),
                        $cardText                   = $('.code-wrapp.services .content-wrapp'),
                        xAngle                      = 0,
                        yAngle                      = 0,
                        zValue                      = 0,
                        xSensitivity                = 15,
                        ySensitivity                = 25,
                        borderSensitivity           = 0.66,
                        textSensitivity             = 0.45,
                        restAnimSpeed               = 300,
                        perspective                 = 500;
    

                    $card.on('mousemove', function(element) {
                    var $item = $(this),

                        // Get cursor coordinates
                        XRel = element.pageX - $item.offset().left,
                        YRel = element.pageY - $item.offset().top,
                        width = $item.width();

                    // Build angle val from container width and cursor value
                    xAngle = (0.5 - (YRel / width)) * xSensitivity;
                    yAngle = -(0.5 - (XRel / width)) * ySensitivity;

                    // Container isn't manipulated, only child elements within
                    updateElement($item.children($cardInner));
                });
        
                // Move element around
                function updateElement(modifyLayer) {
                    modifyLayer.css({
                        'transform': 'perspective('+ perspective + 'px) translateZ(' + zValue + 'px) rotateX(' + xAngle + 'deg) rotateY(' + yAngle + 'deg)',
                        'transition': 'none'
                    });

                    modifyLayer.find($cardBorder).css({
                        'transform': 'perspective(' + perspective + 'px) translateZ(' + zValue + 'px) rotateX(' + (xAngle/borderSensitivity) + 'deg) rotateY(' + (yAngle/borderSensitivity) + 'deg)',
                        'transition': 'none'
                    });
                        
                          modifyLayer.find($cardText).css({
                        'transform': 'perspective(' + perspective + 'px) translateZ(' + zValue + 'px) rotateX(' + (xAngle/textSensitivity) + 'deg) rotateY(' + (yAngle/textSensitivity) + 'deg) translateY('+ xAngle +'px)',
                        'transition': 'text-shadow'
                    });
                }

                // Reset element to default state
                $card.on('mouseleave', function() {

                    var modifyLayer = $(this).children($cardInner);

                    modifyLayer.css({
                        'transform': 'perspective(' + perspective + 'px) translateZ(0) rotateX(0) rotateY(0)',
                        'transition': 'transform ' + restAnimSpeed + 'ms linear'
                    });

                    modifyLayer.find($cardBorder).css({
                        'transform': 'perspective(' + perspective + 'px) translateZ(0) rotateX( 0deg) rotateY(0)',
                        'transition': 'transform ' + restAnimSpeed + 'ms linear'
                    });
                        
                             modifyLayer.find($cardText).css({
                        'transform': 'perspective(' + perspective + 'px ) translateZ(0) rotateX(0) rotateY(0) translateX(0)',
                        'transition': 'all ' + restAnimSpeed + 'ms linear'
                    });
                });
            



        },

        /**
        * Animated Banner 
        */
        widgetAnimatedBanner: function ($scope) {

            //$('.aea-animated-banner').parents('section').addClass('aea-overflow');

        },


        //Animated Heading object
        widgetAnimatedHeading: function( $scope ) {
            var $animatedHeading = $scope.find( '.aea-heading > * > .aea-animated-heading' );
                
            if ( ! $animatedHeading.length ) {
                return;
            }

            if ( $animatedHeading.data('heading_layout') == 'animated' ) {
                $($animatedHeading).Morphext({
                    animation : $animatedHeading.data('heading_animation'), 
                    speed     : $animatedHeading.data('heading_animation_delay'),
                });
            } else if ( $animatedHeading.data('heading_layout') == 'typed' ) {
                var animateSelector = $($animatedHeading).attr('id');
                var typed = new Typed('#'+animateSelector, {
                  strings    : $animatedHeading.data('animate_text'),
                  typeSpeed  : $animatedHeading.data('type_speed'),
                  startDelay : $animatedHeading.data('start_delay'),
                  backSpeed  : $animatedHeading.data('back_speed'),
                  backDelay  : $animatedHeading.data('back_delay'),
                  loop       : $animatedHeading.data('type_loop'),
                  loopCount  : $animatedHeading.data('type_loop_count'),
                });
            }

        },


        circularLoader: function(e){
        $('.cloader').each(function () {
        var that    = $(this);
        var thColor = that.attr("data-color");
        var percent = that.attr("data-percentage");
        that.waypoint({
            handler: function (direction) {
                that.ClassyLoader({
                    percentage: percent,
                    diameter: 55,
                    lineWidth: 8,
                    speed: 10,
                    lineColor: thColor,
                    remainingLineColor: '#fff',
                    fontSize: '20px',
                    fontColor: thColor,
                    roundedLine: true,
                    showRemaining: true,
                    animate: true,
                    displayOnLoad: true,
                    start: 'top'
                });
                this.destroy();
            },
            offset: '95%'
            });
        });
      },


      wooSlider:  function(){
        $('.code-wrapp.product-slider ul').not('.slick-initialized').slick({
          /*infinite: true,*/
          slidesToShow: 3,
          slidesToScroll: 3,
          autoplay: true,
          arrows: false,
          dots: true,
          responsive: [
              {
                breakpoint: 800,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                }
              },
            
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          
        ]


        });
      },


      /*=================================*/
    /* Testimonials
    /*=================================*/    
    widgetTestimonials: function () {

        $('.cww-testimonials.layout-one .testimonial-wrapp').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
             responsive: [
                {
                  breakpoint: 769,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                },
                 {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
            ]
        });

    },

    widgetTestimonialsTwo: function () {

        $('.cww-testimonials.layout-two .testimonial-wrapp').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
        });

    },

    widgetTestimonialsThree: function () {

        $('.cww-testimonials.layout-three .testimonial-wrapp').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            centerPadding: '20px',
            arrows: true,
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            responsive: [
                {
                  breakpoint: 769,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                },
                 {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
            ]

        });

    },


    widgetTestimonialsFour: function () {

        $('.cww-testimonials.layout-four .testimonial-wrapp').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true
        });

    },

    widgetTestimonialsFive: function () {

        $('.cww-testimonials.layout-five .testimonial-wrapp').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true
        });

    },



    widgetTestimonialsSix: function () {

        $('.cww-testimonials.layout-six .testimonial-wrapp').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                },
            ]
        });

    },


    portfolioFilter: function(){

        var $grid = $('.cww-portfolio .pfolio-inner').imagesLoaded(function () {

            $grid.isotope({
              itemSelector: '.cww-portfolio .inner-wrapp',
              layoutMode: 'fitRows'
            });
        });
        
        $('body').on('click', '.portfolio-filter-wrapp .filter', function () {
            $('.portfolio-filter-wrapp .filter').removeClass('active');
            $(this).addClass('active');
            var filterValue = $(this).attr('data-filter');
            $('.cww-portfolio .pfolio-inner').isotope({
                filter: filterValue
            });
        });

    },

     //Tabs widget
    widgetTabs: function( $scope ) {

        var $tabs = $scope.find( '.aea-tabs' ),
            $tab = $tabs.find('.aea-tab');
            
        if ( ! $tabs.length ) {
            return;
        }

        var tabID = $(location.hash);

        if (tabID.length > 0 && tabID.hasClass('aea-tabs-item-title')) {
            $('html').animate({
                easing:  'slow',
                scrollTop: tabID.offset().top,
            }, 500, function() {
                aeaUIkit.tab($tab).show($(tabID).data('tab-index'));
            });  
        }
    },

    widgetSwitcher: function ($scope) {

            $('body').on('click','.aea-tabs-container .aea-tabs-item', function(){
                $('.aea-tabs-container .aea-tabs-item').removeClass('aea-active');
                $(this).addClass('aea-active');
                var currentID = $(this).attr('data-id');

                $('.aea-switcher-item-content-inner').removeClass('aea-active');
                $('.aea-switcher-item-content-inner.'+currentID).addClass('aea-active');

            });
        },

      
      elementorSection: function( $scope ) {

          var $section   = $scope,
          instance   = null,
          sectionID  = $section.data('id');

          //sticky fixes for inner section.
          $.each($section, function( index ) {
            var $sticky      = $(this),
            $stickyFound = $sticky.find('.elementor-element.cww-sticky-bar');

            if ($stickyFound.length) {
              $stickyFound.stickySidebar({
                topSpacing: 10,
                bottomSpacing: 10
              });

            }
          });

        //parallax scrolling sections  
        $('.cww-parallax').jarallax({
            speed: 0.2
        });


        }




    };
    $(window).on('elementor/frontend/init', BizzElements.init);
}(jQuery, window.elementorFrontend));
