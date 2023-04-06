(function ($) {
  "use strict";

    $(document).ready(function () {
      
      cwwPortfolioPro.init();
      

        
    });

    var cwwPortfolioPro = {

      init: function () {

        var that = this;

        that.preloaderFadeOut();
        that.scrollToTopToggle();
        that.stickyHeaderEnable();
        that.circularLoader();
        that.ProgressBar();
        that.wooSlider();
        
        
        if( $.cookie('cww_dark_mode_enable') ){
          DarkReader.setFetchMethod(window.fetch);
          DarkReader.enable({
            brightness: 100,
            contrast: 85,
            sepia: 10
          });
          if ($('.site-branding').children('.logo-dark').length > 0) {
            $('.site-branding .custom-logo-link').css('display','none');
            $('.site-branding .logo-dark').css('display','block');
          }

          $('.dark-mode-switch .dark').css('display','none');
          $('.dark-mode-switch .light').css('display','block');
         
        }
        
      
        

        
        
        $(document).on('click', '#back-to-top'                , this.scrollToTop  );
        $(document).on('click', 'a.cww-hide-preloader'    , this.preloaderButtonDisable  );
        $(document).on('click', '.dark-mode-switch'           , this.darkMode  );
      },

      //close preloader on after loading complets
      preloaderFadeOut: function(){

        $(window).load(function() {
          setTimeout(function() {
            $('.cww-loader').fadeOut('slow');
            $('body').removeClass('cww-loader-enabled');
           }, 1000);
        }); 

      },

      //preloader remove by btn click
      preloaderButtonDisable: function(){
        $('.cww-loader').fadeOut('slow');
        $('body').removeClass('cww-loader-enabled');
      },

      stickyHeaderEnable: function(){
        
        var stickyHeader = cwwPP.stickyHeader;
         
        if( 1 == stickyHeader ){
          
          $(window).scroll(function () {
            
              var height = $(window).scrollTop();
              if ( height > 100 ) {
                  $('.site-header').addClass('fixed');
              } else {
                  $('.site-header').removeClass('fixed');
              }
          });
        }

      },

     

      

      //scroll to top show / hide
      scrollToTopToggle: function(){

        $(window).scroll(function () {
          if ($(window).scrollTop() > 300) {
              $('#back-to-top').addClass('active');
          } else {
              $('#back-to-top').removeClass('active');
          }
        });

      },

      //scroll to top on click
      scrollToTop: function(e){
        e.preventDefault();
          $('html,body').animate({
              scrollTop: 0
          }, 800);
      },

      circularLoader: function(e){
        $('.cloader').each(function () {
          var thColor = cwwPP.thColor;
        var that = $(this);
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

      ProgressBar: function(){

        /**
        * Progress Bar
        */
        $('.progressBar').each(function () {
        var bar = $(this);
        var max = $(this).attr('id');
        var label = $(this).attr('data-label');
        max = max.substring(3);
            
            bar.waypoint({
                handler: function (){
                    $(".percent").animate({ 'padding-left' : label+'%' }, "slow");
                    var progressBarWidth = max * bar.width() / 100;
                    bar.find('div').animate({ width: progressBarWidth }, 1000).html(max+"%&nbsp;");
                },
                offset: '95%'
            });
        });
        $('.percent-bar').each(function () {
            var bar2 = $(this);
            var idval = this.id;
            var label_val = $(this).attr('percent');
            bar2.waypoint({
                handler: function (){
                    $("#"+idval).animate({ 'padding-left' : label_val+'%' }, 1000);
                },
                offset: '95%'
            });
        });

      },

      darkMode: function(){
        $('body').toggleClass('dark-mode');
        $('html').toggleClass('wp-dark-mode-active');

        const isEnabled = DarkReader.isEnabled();
        
        if( isEnabled == true ){
          if ($('.site-branding').children('.logo-dark').length > 0) {
            $('.site-branding .custom-logo-link').css('display','block');
            $('.site-branding .logo-dark').css('display','none');
          }

          $('.dark-mode-switch .dark').css('display','block');
          $('.dark-mode-switch .light').css('display','none');
          

          DarkReader.disable();
          $.removeCookie('cww_dark_mode_enable', { path: '/' }); 

        }else{
          $('.dark-mode-switch .dark').css('display','none');
          $('.dark-mode-switch .light').css('display','block');

          if ($('.site-branding').children('.logo-dark').length > 0) {
            $('.site-branding .custom-logo-link').css('display','none');
            $('.site-branding .logo-dark').css('display','block');
          }

          DarkReader.enable({
            brightness: 100,
            contrast: 90,
            sepia: 10
          });
          $.cookie(
                  'cww_dark_mode_enable',
                  '1',
                  {
                    expires: 1,
                    path: '/'
                  }
                );
        }

      },


      wooSlider:  function(){
        $('.cww-woo-products ul').slick({
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




    


     


    


    }; //var cwwPortfolioPro



})(jQuery);