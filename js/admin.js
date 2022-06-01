$(document).ready(function () {

    $("#admin-content").load("../../views/admin/files.php");

    $("#fileslink").on('click', function (e) {
        e.preventDefault();
        $("#admin-content").load("../../views/admin/files.php");
    })

    $("[name ='myInfoLink']").on('click', function (e) {
        e.preventDefault();
        $("#admin-content").load("../../views/admin/account.php");

    })

    $("[name ='userslink']").on('click', function (e) {
        e.preventDefault();
        $("#admin-content").load("../../views/admin/users.php");

    })



});