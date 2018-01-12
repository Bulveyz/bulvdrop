$(document).ready(function () {
    $('#login__form').on('submit', function (e) {
        e.preventDefault();

        $(this).ajaxSubmit({
            url: 'http://bulvdrop2/login/login',
            beforeSend: function () {
                $('#go_reg').addClass('disabled');
            },
            success: function (data) {
                if (data === '')
                {
                    window.location.href = '/';
                }
                else
                {
                    $('#go_reg').removeClass('disabled');
                    Materialize.toast(data, 4000);
                    $('.toast').addClass('red');
                }
            }
        });

    });
});