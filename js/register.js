$(document).ready(function () {

    $("[name='register-form]").on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);
        $.ajax({
            url: '../includes/register.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (r) {
                if (r == "t") {
                    window.location.href = "/ogs/views/login-view.php";
                }
                else {
                    $("$register-msg").html(r);
                }

            }
        })
    })


});