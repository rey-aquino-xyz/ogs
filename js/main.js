$(document).ready(function (e) {

    $("#content").load('views/home-view.php');


    $("#homelink").on('click', function (e) {
        e.preventDefault();
        $("#content").load('views/home-view.php');
    });


    /**
     *  $("#signinlink").on('click', function (e) {
        e.preventDefault();
        $("#content").load('views/login-view.php');
    });
     */

    $("#aboutlink").on('click', function (e) {
        e.preventDefault();
    });


});