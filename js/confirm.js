$(document).ready(function () {
    $('#confirm__form').on('submit', function (e) {
        e.preventDefault();

        $(this).ajaxSubmit({
            url: 'http://bulvdrop2/confirm/confirmSignup',
            beforeSend: function () {
                $('#go_cong').addClass('disabled');
            },
            success: function (data) {
                if (data === '')
                {
                    window.location.href = '/';
                }
                else
                {
                    $('#go_cong').removeClass('disabled');
                    Materialize.toast(data, 4000);
                    $('.toast').addClass('red');
                }
            }
        });

    });
});