$(document).ready(function(){

$("[name='form-login']").on('submit', function(e){
    e.preventDefault();
    var form = new FormData(this);
    $.ajax({
        url: '../includes/login.php',
        data: form,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(r){
            if(r == "t"){
                window.location.href = "/ogs/";
            }
            else{
                $("#login-msg").html(r);
            }
            
        }
    })

})


});