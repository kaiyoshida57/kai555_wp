$(function() {
  // top slider
  $('#js-slider').slick({
    autoplay: true,
    dots: true,
    variableWidth: true,
    centerMode: true,
    // centerPadding: '5%',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
        }
      },
    ]
  });
});
