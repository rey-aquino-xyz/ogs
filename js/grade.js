$(document).ready(function () {

    $("[name='lrn-form']").on('submit', function (e) {
        e.preventDefault();
        var lrn = $("#lrn");
        var lrnpwd = document.getElementById("lrnlock");
        $.ajax({
            url: '../../includes/grade.php',
            data: {lrn: lrn.val()},
            processData: false,
            contentType: false,
            type: 'POST',
            sucess: function (r) {
                if (r == "t") {
                    lrnpwd.style.display = "block";
                }
            }
        });

    });
});