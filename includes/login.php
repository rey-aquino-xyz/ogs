<?php
session_start();
require_once __DIR__ . '/../config.php';

if(isset($_POST['username'])){
   if(AccountController::IsAuthenticate($_POST['username'], $_POST['password'])){
    foreach(AccountController::GetData() as $r){
        if($r['username'] == $_POST['username'] AND $r['password'] == $_POST['password']){
            $_SESSION['accountid'] = $r['id'];
            $_SESSION['studentid'] = $r['studentid'];
            $_SESSION['username'] = $r['username'];
        }
    }
    echo "t";
   }else{
       echo 'Invalid Username / Password. Please try again.';
   }
}


?>