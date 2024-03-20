// モーダル
$(function () { //①
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      console.log('hello')
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });

  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

// メニューバー

$(function () {
  $(".up").on("click", function () {
    $(".text").slideToggle(500);
    $(".up").toggleClass("active");
  });
});

