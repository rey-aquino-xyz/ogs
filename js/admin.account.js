$(document).ready(function () {

    $("[name ='changePwdLink']").on('click', function (e) {
        e.preventDefault();
        $("#accountModal").modal('show');
    })

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

});