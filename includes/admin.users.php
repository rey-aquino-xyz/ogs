<?php
require_once __DIR__ . '/../config.php';

if(isset($_POST['lrn'])){
    $RefLRN = $_POST['lrn'];
    $StudentData = StudentController::GetByLRN($RefLRN);
    $Account = AccountController::GetByStudentId($StudentData->Id);

    try {
        if(AccountController::UpdatePwd($Account->Id, 'user@' . $RefLRN)){
            echo "t";
        }
    } catch (\Throwable $th) {
        throw $th;
    }
    
}
?>