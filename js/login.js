$(document).ready(function () {

    var loader = $("[name ='loader']");
    var username = $("[name ='username']");
    var password = $("[name ='password']");

    $("[name='form-login']").on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);
        $.ajax({
            url: '../includes/login.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (r) {
                if (r == "t") {
                    loader.addClass("loader");
                    const myTimeout = setTimeout(setHome, 2000);
                }
                else {
                    loader.addClass("loader");
                    const myTimeout = setTimeout(setLoader, 1000);
                }

            }
        })

    });

    function setHome() {
        window.location.href = "/ogs/";
    }
    function setLoader() {
        username.addClass("is-invalid");
        password.addClass("is-invalid");
        loader.removeClass("loader");
    }


});