(function($) {
  $("#menu_btn").click(function() {
    $(this).toggleClass("opened");
    $('#site_menu').toggleClass('menu-open');
    $('#num').toggleClass('hidden-sp-open');
    $('#aside_left>.line').toggleClass('hidden-sp-open');
    $('#fp-nav').toggleClass('hidden-sp-open');
  });

})(jQuery);