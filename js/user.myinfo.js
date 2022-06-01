$(document).ready(function () {



    $("#lrnSwicth").on('click', function () {
        var a = $(this).prop('checked') ? 1 : 0;
        var lrn = $("[name='lrn']");

        $("#user-content").load("../../views/user/my-info.php", {
            lrn: lrn.val(), lrnstatus: a
        });
        pushNotify("LRRN Status", "Status has been updated", "success");
    });


    $("[name ='editInfoLink']").on('click', function (e) {
        e.preventDefault();
        $("#myinfoModal").modal('show');
    })
    $("[name ='changePwdLink']").on('click', function (e) {
        e.preventDefault();
        $("#accountModal").modal('show');
    })

    $("[name='myInfoForm']").on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);

        $.ajax({
            url: '../../views/user/my-info.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (r) {
                $("#myinfoModal").modal('hide');
                $("#user-content").load("my-info.php");
            }
        });
    });

    $("[name='accountForm']").on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);

        $.ajax({
            url: '../../includes/user.manage-account.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (r) {
                if (r == "t") {
                    $("[name='accountForm']")[0].reset();
                    $("#accountModal").modal('hide');
                    $("#account-msg").addClass("text-success p-2");
                    $("#account-msg").html("Account has been updated.");
                }
                if (r == "f") {
                    $("[name='accountForm']")[0].reset();
                    $("#accountModal").modal('hide');
                    $("#account-msg").addClass("text-danger p-2");
                    $("#account-msg").html("Something went wrong. Cannot Update your account.");
                }

            }
        });
    });
    function pushNotify(title, msg, status) {
        new Notify({
            status: status,
            title: title,
            text: msg,
            effect: 'slide',
            speed: 500,
            customClass: null,
            customIcon: null,
            showIcon: true,
            showCloseButton: false,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 3,
            position: 'top right'
        })
    }

});
