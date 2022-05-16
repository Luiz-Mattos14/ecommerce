$(document).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $('.header-top').addClass('header-top2');
    } else {
      $('.header-top').removeClass('header-top2');
    }
});
  

