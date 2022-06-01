$(document).ready(function () {

    $("[name ='resetPasswordLink']").on('click', function (e) {
        e.preventDefault();
        var refLrn = $(this).attr('href');
        $.ajax({
            url:  '../../includes/admin.users.php',
            data: { resetPwd: 'POST', lrn: refLrn },
            type: 'POST',
            success: function (r) {
                if (r == "t") {
                    pushNotify("Information", "Password has been updated", "success");
                }else{
                    pushNotify("Error", "Something went wrong. . .", "error");
                }
            }
        });
    })

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