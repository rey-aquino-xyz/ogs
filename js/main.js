$(document).ready(function (e) {

    $("#content").load('views/home-view.php');

    $("#inquirelink").on('click', function (e) {
        e.preventDefault();
        $("#content").load('views/grade/index.php');
    });

    /**
     *  $("#signinlink").on('click', function (e) {
        e.preventDefault();
        $("#content").load('views/login-view.php');
    });
     */

    $("#aboutlink").on('click', function(e){
        e.preventDefault();
        $("#content").load('views/grade/grade.php');
    });


});