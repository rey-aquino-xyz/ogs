$(document).ready(function () {

    $("#admin-content").load("../../views/admin/files.php");

    $("#fileslink").on('click', function(e){
        e.preventDefault();
        $("#admin-content").load("../../views/admin/files.php");
    })

   

   

});