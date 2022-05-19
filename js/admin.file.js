$(document).ready(function () {
    $("#uploadfile").on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);
        $.ajax({
            url: '../../includes/uploadfile.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (r) {
                if (r == "t") {
                    $("#uploadfile")[0].reset();
                    $("#uploadFileModal").modal('hide');
                    $("#admin-content").load("../../views/admin/files.php");
                } else {
                    alert(r);
                }
            }
        });
    });

    $("#uploadlink").on('click', function (e) {
        e.preventDefault();
        $("#uploadFileModal").modal('show');
    });
});