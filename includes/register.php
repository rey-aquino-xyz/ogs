<?php
session_start();
require_once __DIR__ . '/../config.php';

if (isset($_POST['firstname'])) {
    $s         = new Student();
    $StudentId = XtraController::GenerateGUID();

    $s->Id        = $StudentId;
    $s->Firstname = $_POST['firstname'];
    $s->Lastname  = $_POST['lastname'];
    $s->Gender    = $_POST['gender'];
    $s->DOB       = $_POST['dob'];
    $s->LRN       = $_POST['lrn'];
    $s->LRNStatus = Enum_LRNStatus::Lock();

    $a                = new Account();
    $a->Username      = $_POST['username'];
    $a->Password      = $_POST['password'];
    $a->AccountTypeId = Enum_AccountType::Student();
    $a->StudentId     = $StudentId;

    //Check First if the LRN is already registered
    if (StudentController::IsLRNExist($_POST['lrn'])) {
        echo "LRN Already Exist.";
        return;
    }
    try {
        if (StudentController::Insert($s)) {
            if (AccountController::Insert($a)) {
                header('location:/ogs/views/login-view.php', true, 301);
            }
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}
