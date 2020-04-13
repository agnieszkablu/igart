/**
 * Theme functions file.
 *
 */
(function($) {
  $(function() {

    //Object fit for images
    var $someImages = $('.stretch-image');
    objectFitImages($someImages);

    //Scroll To
    $(".scroll-to").on('click', function(e) {
      $('html, body').animate({
        scrollTop: $("main").offset().top
      }, 500);
    });

    //Scroll To Link
    $(".scroll-to-link").on('click', function(e) {
      var pointId = $(this).attr('href');
      $('html, body').animate({
        scrollTop: $(pointId).offset().top - 100
      }, 500);
    });

    //Menu for mobile. This is required for off-canvas menu.
    //Menu. This is required for off-canvas menu.
    $('[data-toggle="offcanvas"]').click(function() {
      $('body').toggleClass("menu-open");
      $('.js-close').click(function() {
        $('body').removeClass("menu-open");
      });
    });

  });
}(jQuery));
