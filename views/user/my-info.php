<?php
session_start();
require_once __DIR__ . '../../../config.php';

if (isset($_POST['lrn'])) {
    $LRN       = $_POST['lrn'];
    $LRNStatus = $_POST['lrnstatus'];

    try {
        if(StudentController::UpdateLRNStatus($LRN, $LRNStatus)){
            
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}

$Student = StudentController::GetById($_SESSION['studentid']);

?>
<script src="../../js/user.myinfo.js"></script>

<br><br>
<div class="container col-10">
    <div class="card shadow-sm rounded-4 bg-light mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="card-title"><strong>Personal Information</strong></h6>
                <a href="" class="btn btn-primary">Edit Information</a>
            </div>
            <hr>
            <div class="col-8">
                <h6 class="card-title">Name: <strong><?=$Student->Lastname . ' ' . $Student->Firstname?></strong></h6>
                <h6 class="card-title ">Date of Birth: <strong><?=$Student->DOB?></strong></h6>
                <h6 class="card-title ">Sex: <strong><?=$Student->Gender?></strong></h6>
            </div>

        </div>
    </div>

    <div class="card rounded-4 shadow-sm mb-3">
        <div class="card-body">
            <h6 class="card-title"><strong>Manage LRN </strong></h6>
            <hr>
            <h6 class="card-title ">LRN: <strong><?=$Student->LRN?></strong></h6>
            <input type="hidden" name="lrn" value="<?=$Student->LRN?>">
            <div class="form-check form-switch" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" title="You can lock your LRN to avoid others seeing your grades">
                <input class="form-check-input" type="checkbox" role="switch" <?=Enum_LRNStatus::ParseStatus($Student->LRNStatus)?> id="lrnSwicth">
                <label class="form-check-label" for="lrnSwicth">Lock LRN</label>
            </div>
            <label for="">You can lock your LRN to avoid others seeing your grade.</label>

        </div>
    </div>

    <div class="card rounded-4 shadow-sm mb-3">
        <div class="card-body">
            <h6 class="card-title"><strong>Manage Account</strong></h6>
            <hr>
            <a href="" class="btn btn-primary">Change Password</a>
        </div>
    </div>
</div>