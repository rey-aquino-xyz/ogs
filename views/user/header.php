<?php
session_start();

require_once __DIR__ . '../../../config.php';


if (isset($_SESSION['accountid'])) {
    $Account = AccountController::GetById($_SESSION['accountid']);

    if ($Account->AccountTypeId == Enum_AccountType::Admin()) {
        header("location:/ogs/views/admin/", true, 301);
        exit;
    }
} else {
    header("location:/ogs/", true, 301);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
    <script src="../../js/user.js"></script>
</head>

<body style="background: #f8f8ff;">
    <nav class="navbar bg-light shadow-sm">
        <div class="container-fluid justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="/ogs/">
                <img src="../../assets/school_logo.jpg" alt="" width="45" height="45"
                    class="d-inline-block align-text-top me-2">
                AMECI
            </a>
            <a href="../../includes/logout.php" class="btn btn-danger">Sign Out</a>
        </div>
    </nav>