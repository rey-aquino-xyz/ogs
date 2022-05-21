$(document).ready(function () {



    $("#lrnSwicth").on('click', function () {
        var a = $(this).prop('checked') ? 1 : 0;
        var lrn = $("[name='lrn']");

        $("#user-content").load("../../views/user/my-info.php", {
            lrn: lrn.val(), lrnstatus: a
        });
    });
});
