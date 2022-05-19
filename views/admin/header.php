<?php
session_start();
require_once __DIR__ . '../../../config.php';

if (isset($_SESSION['accountid'])) {
    $Account = AccountController::GetById($_SESSION['accountid']);
    if ($Account->AccountTypeId == Enum_AccountType::Student()) {
        header("location:/ogs/views/user/", true, 301);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
    <script src="../../js/admin.js"></script>
    <style>
        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: auto;
            overflow-y: hidden;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-light shadow-sm">
        <div class="container-fluid justify-content-between align-items-center">
            <div class="d-flex align-items-center">

                <a class="navbar-brand d-flex align-items-center" href="/ogs/">
                    <img src="../../assets/school_logo.jpg" alt="" width="45" height="45"
                        class="d-inline-block align-text-top me-2">
                    AMECI
                </a>
                <ul class="nav">
                    <li>
                       <a href="#MyInfo" class="nav-link link-dark">My Info</a>
                    </li>
                    <li>
                        <a href="#Files" id="fileslink" class="nav-link link-dark">Files</a>
                    </li>
                    <li>
                        <a href="#Account" class="nav-link link-dark">Account</a>
                    </li>
                </ul>
            </div>
            <a href="../../includes/logout.php" class="btn btn-danger">Sign Out</a>
        </div>
    </nav>
    <br>
