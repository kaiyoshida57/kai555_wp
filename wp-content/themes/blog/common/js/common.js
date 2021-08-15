console.log('common');

$(function() {
  // sidebar static
  const sidebar = $('.aside');
  const mainArea = $('.main');
  offset = mainArea.offset();
  $(window).scroll(function() {
    if ($(window).scrollTop() > offset.top ) {
      sidebar.addClass('is-fixed');
    } else {
      sidebar.removeClass('is-fixed');
    };
  });
});
