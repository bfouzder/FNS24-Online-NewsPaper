     $(document).ready(function () {
         
          $("ul#news_scroll_block").liScroll({
                //travelocity: 0.05 // the speed of scrolling
            });
            //Adding class if first level achor text is one,two or three line
            if ($(window).width() > 767) {
                var main_menu_height = $('.head-block .nav > li:first-child').height();
                if (main_menu_height > 44) {
                    $('.head-block .nav > li > a').each(function () {
                        if ($(this).height() == 20) {
                            $(this).css('line-height', '40px');
                        }
                    });
                }
            }
         
         
            $('body').bind('click', function (e) {
                if ($(e.target).closest('.navbar-header').length == 0) {
        
                    var opened = $('.navbar-collapse').hasClass('collapse in');
                    if (opened === true) {
                        $('.navbar-collapse').collapse('hide');
                        $('.navbar-toggle').removeClass('in');
                    }
                } 
            });
          $('.dropdown a.dropdown-toggle').on('click', function() {
                location.assign($(this).attr('href'));
          });
           /* scroll back to top*/
           $("a[href='#top-block']").click(function() {
              $("html, body").animate({ scrollTop: 0 }, "slow");
              return false;
            });
             
     $(".owl-list").owlCarousel({
         navigation: true,
         autoPlay: false, 
        items: 6,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [767, 1],
        itemsMobile: [600, 1]
    });
         
         
         
     });