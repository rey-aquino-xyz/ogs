<?php
require_once __DIR__ . '/../config.php';

if (isset($_POST['lrn'])) {

    //CHeck if LRN EXIST
    if (GradeController::IsLRNExist($_POST['lrn'])) {
        if (StudentController::IsLRNLock($_POST['lrn'])) {
            if (($_POST['pwd']) == null) {
                echo "ip";
            }
        }

        if (StudentController::IsLRNLock($_POST['lrn'])) {
            if (!($_POST['pwd']) == null) {
                //Check Password
                $Student = StudentController::GetByLRN($_POST['lrn']);
                $Account = AccountController::GetByStudentId($Student->Id);
                if ($Account->Password == $_POST['pwd']) {
                    echo "pwdm";
                    //Show grades
                } else {
                    echo "invpwd";
                }
            }
        }

        if (!StudentController::IsLRNLock($_POST['lrn'])) {
            echo "shwg";
        }
    } else {
        echo "lrnnull";
    }

}


