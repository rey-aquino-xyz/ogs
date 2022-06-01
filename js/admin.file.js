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

    $("[name='deletefilelink']").on('click', function (event) {
        event.preventDefault();
        var id = $(this).attr('href');
        $.ajax({
            url: '../../includes/uploadfile.php',
            data: { deleteexc: 'POST', id: id },
            type: 'POST',
            success: function (r) {
                if (r == "t") {
                    $("#admin-content").load("../../views/admin/files.php");
                }

            }
        });
    });

    $("[name='savefilelink']").on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $.ajax({
            url: '../../includes/uploadfile.php',
            data: { exportexc: 'POST', id: id },
            type: 'POST',
            success: function (r) {
                if(r=="t"){
                    $("#admin-content").load("../../views/admin/files.php");
                    pushNotify("Process File", "File has been saved to database.", "success");
                }else{
                    pushNotify("Process File", "Something went wrong", "error");
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