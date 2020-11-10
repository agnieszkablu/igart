/**
 * Sticky navbar.
 * Add classes to navbar on scroll
 * 
 */

(function($) {
  $(function() {
    //Menu - change background color after scrolling.
    function stickyNav() {
      var scroll = $(window).scrollTop();
      var navbar = $('.navbar.sticky-top');

      // animate showing the navbar on scroll on each page
      if (scroll > 0) {
        navbar.addClass('nav-scrolling');
      } else if (scroll === 0) {
        navbar.removeClass('nav-scrolling');
      }
    }

    //stickyNav();
    $(window).on("scroll", function() {
      stickyNav();
    });
  });
}(jQuery));
