// モーダル
$(function () { //①
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });

  $('.modal-main').on('click', function (e) {
    if(!$(e.target).closest('.modal-inner').length) {
      $('.js-modal').fadeOut();
      return false;
    }
  });
});

// メニューバー

$(function () {
  $(".up").on("click", function () {
    $(".text").slideToggle(500);
    $(".up").toggleClass("active");
  });
});

