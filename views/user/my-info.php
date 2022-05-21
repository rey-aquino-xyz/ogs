<?php
session_start();
require_once __DIR__ . '../../../config.php';

if (isset($_POST['lrn'])) {
    $LRN       = $_POST['lrn'];
    $LRNStatus = $_POST['lrnstatus'];

    try {
        if (StudentController::UpdateLRNStatus($LRN, $LRNStatus)) {

        }
    } catch (\Throwable $th) {
        throw $th;
    }
}

if(isset($_POST['e_firstname'])){

    $S = new Student();
    $S->Id = $_POST['e_id'];
    $S->Firstname = $_POST['e_firstname'];
    $S->Lastname = $_POST['lastname'];
    $S->DOB = $_POST['dob'];
    $S->Gender = $_POST['gender'];
    try {
      if(StudentController::UpdateInfo($S)){
          printf("t");
      }
    } catch (\Throwable $th) {
        echo "f";
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
                <a href="#EditInfo" name="editInfoLink" class="btn btn-primary">Edit Information</a>
            </div>
            <hr>
            <div class="col-8">
                <h6 class="card-title">Name: <strong>
                        <?=$Student->Lastname . ' ' . $Student->Firstname?>
                    </strong></h6>
                <h6 class="card-title ">Date of Birth: <strong>
                        <?=$Student->DOB?>
                    </strong></h6>
                <h6 class="card-title ">Sex: <strong>
                        <?=$Student->Gender?>
                    </strong></h6>
            </div>

        </div>
    </div>

    <div class="card rounded-4 shadow-sm mb-3">
        <div class="card-body">
            <h6 class="card-title"><strong>Manage LRN </strong></h6>
            <hr>
            <h6 class="card-title ">LRN: <strong>
                    <?=$Student->LRN?>
                </strong></h6>
            <input type="hidden" name="lrn" value="<?=$Student->LRN?>">
            <div class="form-check form-switch" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" title="You can lock your LRN to avoid others seeing your grades">
                <input class="form-check-input" type="checkbox" role="switch"
                    <?=Enum_LRNStatus::ParseStatus($Student->LRNStatus)?> id="lrnSwicth">
                <label class="form-check-label" for="lrnSwicth">Lock LRN</label>
            </div>
            <label for="">You can lock your LRN to avoid others seeing your grade.</label>

        </div>
    </div>

    <div class="card rounded-4 shadow-sm mb-3">
        <div class="card-body">
            <h6 class="card-title"><strong>Manage Account</strong></h6>
            <hr>
            <a href="" name="changePwdLink" class="btn btn-primary">Change Password</a>
            <p id="account-msg"></p>
        </div>
    </div>
</div>

<!--MODAL-->
<div class="modal fade" id="myinfoModal" tabindex="-1" aria-labelledby="myinfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myinfoModalLabel">Personal Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" name="myInfoForm">
                <input type="hidden" name="e_id" value="<?=$Student->Id?>">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputFn" placeholder="Firstname"
                            name="e_firstname" required value="<?=$Student->Firstname?>">
                        <label for="floatingInputFn">Firstname</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputLn" placeholder="Lastname"
                            name="lastname" required value="<?=$Student->Lastname?>">
                        <label for="floatingInputLn">Lastname</label>
                    </div>

                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputDOB" placeholder="Date of Birth"
                            name="dob" required value="<?=$Student->DOB?>">
                        <label for="floatingInputDOB">Date of Birth</label>
                    </div>

                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
                        <label for="floatingSelect">Gender</label>
                    </div>
                    <div class="card text-end mt-3">
                        <button class="btn btn-outline-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountModalLabel">Manage Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" name="accountForm">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingInputOldPwd" placeholder="Old Password"
                            name="old_pwd" required>
                        <label for="floatingInputOldPwd">Old Password</label>
                    </div>
                    <hr>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingInputNewPwd" placeholder="New Password"
                            name="new_pwd" required>
                        <label for="floatingInputNewPwd">New Password</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingInputConfirmPwd" placeholder="Confirm Password"
                            name="confirm_pwd" required>
                        <label for="floatingInputConfirmPwd">Confirm Password</label>
                    </div>
                   
                    <div class="card text-end mt-3">
                        <button class="btn btn-outline-primary" type="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>