<?php
require_once __DIR__ . '../../../config.php';
$LRNLists  = GradeController::GetData();
$LRNStatus = '';

if(isset($_POST['resetPwd'])){
    $RefLRN = $_POST['lrn'];
    $StudentData = StudentController::GetByLRN($RefLRN);
    $Account = AccountController::GetByStudentId($StudentData->Id);

    if(AccountController::UpdatePwd($Account->Id, 'user@' . $RefLRN)){
        echo "t";
    }else{
        echo "f";
    }
}
?>
<script src="../../js/admin.users.js"></script>

<div class="container">
    <div class="card shadow-sm rounded-4 p-2">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">LRN</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">LRN Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LRNLists as $l): ?>
                    <?php $Student = StudentController::GetByLRN($l['lrn'])?>
                    <?php if ($Student->LRNStatus == ''): ?>
                    <?php $LRNStatus = 'Open'?>
                    <?php endif;?>
                    <?php if ($Student->LRNStatus == '0'): ?>
                    <?php $LRNStatus = 'Open'?>
                    <?php endif;?>
                    <?php if ($Student->LRNStatus == '1'): ?>
                    <?php $LRNStatus = 'Lock'?>
                    <?php endif;?>
                    <tr>
                        <td>
                            <?=$l['lrn']?>
                        </td>
                        <td>
                            <?=$Student->Firstname . ' ' . $Student->Lastname?>
                        </td>
                        <td>
                            <?=$LRNStatus?>
                        </td>
                        <td>
                            <?php if ($Student->LRNStatus == '1'): ?>
                            <a href="<?= $Student->LRN ?>" name="resetPasswordLink"
                                class="text-decoration-none text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-clockwise me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg>
                                Reset Password</a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>