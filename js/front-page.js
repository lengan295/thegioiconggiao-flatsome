(function ($) {
  $('#feedbacks-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    dotsEach: true,
    nav: false,
    lazyload: true,
    responsiveClass: true,
    slideBy: 1,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      550: {
        items: 3,
        nav: false,
      },
      850: {
        items: 5,
      },
    },
  });
})(jQuery);
