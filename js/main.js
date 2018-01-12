$(document).ready(function () {
    $(".dropdown-button").dropdown();


    $('.button-collapse').sideNav({
        menuWidth: 300,
        draggable: true,
        onOpen: function() {
            $('.side-nav__fixed-top').addClass('active');
        },
        onClose: function() {
            $('.side-nav__fixed-top').removeClass('active');
        }
    });
});