<?php
require_once __DIR__ . '/../config.php';

if(isset($_POST['sy'])){

    $EXC = new File();

    $EXC->StrandId = $_POST['strandid'];
    $EXC->SemesterId = $_POST['semesterid'];
    $EXC->SubjectId = $_POST['subjectid'];
    $EXC->QuarterId = $_POST['quarterid'];
    $EXC->GradeLevelId = $_POST['gradelevelid'];
    $EXC->SY = $_POST['sy'];

    $fileName  = basename($_FILES['excelfile']['name']);
    $fileType  = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileError = $_FILES['excelfile']['error'];
    $fileId = uniqid();
    $destination_folders = '../assets/files/' . $fileId . '.' . $fileType;
    $allowTypes          = ['xlsx'];

    if (in_array(strtolower($fileType), $allowTypes)) {
        if ($fileError === 0) {
            $rawfile = $_FILES['excelfile']['tmp_name'];
            if (move_uploaded_file($rawfile, $destination_folders)) {
                //Set Id to File
                $EXC->Filename =  $fileId . '.' . $fileType;
            }
        }
    }

    try {
        if(FileController::Insert($EXC)){
            echo "t";
        }
    } catch (\Throwable $th) {
        throw $th;
    }



}

?>