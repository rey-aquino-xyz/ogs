<?php
session_start();

require_once '../config.php';

if (isset($_SESSION['accountid'])) {
    $Account = AccountController::GetById($_SESSION['accountid']);

    if ($Account->AccountTypeId == Enum_AccountType::Admin()) {
        header("location:/ogs/views/admin/", true, 301);
        exit;
    }
    if ($Account->AccountTypeId == Enum_AccountType::Student()) {
        header("location:/ogs/views/user/", true, 301);
        exit;
    }
} else {
    header("location:/ogs/", true, 301);
}

?>