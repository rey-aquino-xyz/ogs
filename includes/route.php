<?php

session_start();
require_once __DIR__ . '/../config.php';

if(isset($_SESSION['accountid'])){
    $Account = AccountController::GetById($_SESSION['accountid']);

    if($Account->AccountTypeId == Enum_AccountType::Admin()){
        header("location:../views/admin/", true, 301);
    }
    if($Account->AccountTypeId == Enum_AccountType::Student()){
        header("location:../views/user/", true, 301);
    }
}else{
    header("location:/ogs/", true, 301);
}

?>