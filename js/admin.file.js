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

    $("[name='viewfilelink']").on('click', function (event) {
        event.preventDefault();
        var id = $(this).attr('href');
        $("#filereadModal").modal('show');
        $("#exc-content").load("../../includes/uploadfile.php", { readexc: "POST", id: id });
    });

    $("[name='deletefilelink']").on('click', function(event){
        event.preventDefault();
        var id = $(this).attr('href');
        $.ajax({
            url: '../../includes/uploadfile.php',
            data: {deleteexc: 'POST', id: id},
            type: 'POST',
            success: function(r){
                if(r == "t"){
                    $("#admin-content").load("../../views/admin/files.php");
                }
                
            }
        });
    });
});