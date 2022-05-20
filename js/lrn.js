$(document).ready(function () {

    $("[name='lrn-form']").on('submit', function (e) {
        e.preventDefault();
        var lrn = $("[name='lrn']");
        var pwd = $("[name='lrnpwd']");
        var lrnlock = document.getElementById("lrnlock");
        $.ajax({
            url: '../../includes/grade.php',
            data: { lrn: lrn.val(), pwd: pwd.val() },
            type: 'POST',
            success: function (r) {
                console.log(r);
                if (r == "ip") {
                    lrnlock.style.display = "block";
                }
                if (r == "invpwd") {
                    $("#lrn-msg").html("Invalid Password");
                }
                if (r == "lrnnull") {
                    $("#lrn-msg").html("LRN does not exist");
                }
                if (r == "pwdm") {
                    $("#grade-content").load('grade.php', { lrn: lrn.val() });
                }
                if (r == "shwg") {
                    $("#grade-content").load('grade.php', { lrn: lrn.val() });
                }

            }
        });

    });

    $("[name='grade-frm']").on('submit', function (e) {
        e.preventDefault();
        var form = new FormData(this);
        var lrn = $("[name='q_lrn']");
        var grade = $("[name= 'gradelevelid']");
        var strand = $("[name='strandid']");
        var sy = $("[name= 'sy']");

        $("#grade-record").load("grade-details.php", {
            lrn: lrn.val(), gradelevelid: grade.val(), strandid: strand.val(), sy: sy.val()
        });

        /*
        $.ajax({
            url: '../../includes/grade.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (r) {
                console.log(r);
            }
        });
        **/
    });
});