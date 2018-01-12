$(document).ready(function () {
    update();

    $('.modal').modal();

    $('#form-upload').on('change', function (e) {
        e.preventDefault();

        $(this).ajaxSubmit({
            url: "http://bulvdrop2/upload/upload",
            beforeSend:function(){
                $(".progress").show();
                $('#file_inps').addClass('disabled');
            },
            uploadProgress:function(event,position,total,percentComplete){
                $('.determinate').width(percentComplete+'%');
            },
            success:function(data){
                $(".progress").hide();
                $('.determinate').width(0);
                $('#file_inps').removeClass('disabled');
                Materialize.toast(data, 4000);
                update();
            },
            resetForm: true
        });
    });

    $('#files').on('click', '#delete' ,function (){
        var $id = $(this).data("id");
        $.ajax({
            url: 'http://bulvdrop2/delete/deleteFile',
            beforeSend:function(){
                $('#layer_fixed').show();
            },
            data: {
                'id': $id
            },
            type: 'POST',
            success: function () {
                update();
            }
        });
    });
});

function update() {
    $.ajax({
        url: "http://bulvdrop2/update/updateFiles",
        beforeSend:function(){
            $('#layer_fixed').show();
        },
        method: "GET",
        success: function (data) {
            $('#files').empty();
            $('#files').append(data);
            $('#layer_fixed').hide();
            setTimeout(function () {
                $('#layer_fixed').hide();
            }, 1000);
        }
    });
}
