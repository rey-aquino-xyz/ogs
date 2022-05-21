<?php
require_once __DIR__ . '/../config.php';


if(isset($_POST['lrn'])){

    $LRN = $_POST['lrn'];
    $LRNStatus = $_POST['lrnstatus'];

    if(StudentController::UpdateLRNStatus($LRN, $LRNStatus))
    {
    }
}

?>