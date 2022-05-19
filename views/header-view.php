<?php
session_start();
require_once 'config.php';

AccountController::SeedAccount();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/form.css">

    <script type="application/javascript" src="/ogs/js/main.js"></script>

    <title>AMECI | Portal</title>

</head>

<body style="background-color: #d2d8d6;
background-image: linear-gradient(315deg, #d2d8d6 0%, #dce8e0 74%);
">

    <br>
    <main>
        <div class="container">
            <nav class="navbar shadow-sm navbar-expand-md navbar-light bg-light rounded-4"
                aria-label="Fourth navbar example">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="assets/school_logo.jpg" alt="logo" width="45" height="45">
                        AMECI
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0 align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" id="homelink" href="#Home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gallerylink" href="#Gallery">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="inquirelink" href="#InquireGrade">Inquire Grade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="aboutlink" href="#About">About</a>
                            </li>
                            <!--
                                <li class="nav-item">
                                    <a class="nav-link disabled">Disabled</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown"
                                        aria-expanded="false">Dropdown</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                            -->
                        </ul>
                        <div id="accountNav">
                            <ul class="navbar-nav me-auto">
                                <?php if(isset($_SESSION['username'])): ?>
                                    <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <?= $_SESSION['username']; ?>
                                    </a>
                                </li>
                                <?php else: ?>
                                    <li class="nav-item">
                                    <a href="views/login-view.php" id="signinlink" class="nav-link">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a href="views/register-view.php" class="btn btn-primary">Create Account</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </main>