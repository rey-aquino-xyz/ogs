<?php
session_start();
require_once __DIR__ . '/../config.php';

if(isset($_POST['old_pwd'])){
    $r = 'f';

    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $confirm_pwd = $_POST['confirm_pwd'];
    //CHeck first is password is valid
    $Account = AccountController::GetById($_SESSION['accountid']);

    if($old_pwd == $Account->Password){
        //Check if New and Confirm is same
        if($_POST['new_pwd'] == $_POST['confirm_pwd']){
            //Update Password
            if(AccountController::UpdatePwd($_SESSION['accountid'], $_POST['confirm_pwd'])){
                $r= "t";
            }
            else{
                $r= "f";
            }
        }else{
            $r= "f";
        }
    }else{
        $r = "f";
    }

    echo $r;
}

?>