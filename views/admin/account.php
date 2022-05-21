<?php
session_start();

require_once __DIR__ . '../../../config.php';
$Account = AccountController::GetById($_SESSION['accountid']);
$User = StudentController::GetById($_SESSION['studentid']);


?>
<script src="../../js/admin.account.js"></script>

<div class="container mb-2 mt-2 col-8">
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <h6 class="card-title"><strong>Account Information</strong></h6>
            <hr>
            <h6 class="card-title">Username: <strong>
                    <?= $Account->Username?>
                </strong></h6>

        </div>
    </div>
</div>

<div class="container col-8">
    <div class="card rounded-4 shadow-sm">
        <div class="card-body">
            <h6 class="card-title"><strong>Manage Account</strong></h6>
            <hr>
            <a href="#UpdateAccount" name="changePwdLink" class="btn btn-primary">Change Password</a>
        </div>
        <p id="account-msg"></p>
    </div>
</div>

<!--MODAL-->
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