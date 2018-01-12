$(document).ready(function () {
    AOS.init();
});

$(window).scroll(function () {
    marginTopToggle();

    function marginTopToggle() {
        var promoHeight = $('.promo').height();

        if ($(document).scrollTop() >= promoHeight )
        {
            $('div.toggle-line').addClass('black');
        }
        else
        {
            $('div.toggle-line').removeClass('black');
        }
    }
});
