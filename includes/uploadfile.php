<?php
require_once __DIR__ . '/../config.php';

use \Shuchkin\SimpleXLSX;

if (isset($_POST['sy'])) {

    $EXC = new File();

    $EXC->StrandId     = $_POST['strandid'];
    $EXC->SemesterId   = $_POST['semesterid'];
    $EXC->SubjectId    = $_POST['subjectid'];
    $EXC->QuarterId    = $_POST['quarterid'];
    $EXC->GradeLevelId = $_POST['gradelevelid'];
    $EXC->SY           = $_POST['sy'];

    $fileName            = basename($_FILES['excelfile']['name']);
    $fileType            = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileError           = $_FILES['excelfile']['error'];
    $fileId              = uniqid();
    $destination_folders = '../assets/files/' . $fileId . '.' . $fileType;
    $allowTypes          = ['xlsx'];

    if (in_array(strtolower($fileType), $allowTypes)) {
        if ($fileError === 0) {
            $rawfile = $_FILES['excelfile']['tmp_name'];
            if (move_uploaded_file($rawfile, $destination_folders)) {
                //Set Id to File
                $EXC->Filename = $fileId . '.' . $fileType;
            }
        }
    }

    try {
        if (FileController::Insert($EXC)) {
            echo "t";
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}

if (isset($_POST['readexc'])) {
    $File    = FileController::GetById(base64_decode($_POST['id']));
    $Strand  = StrandController::GetById($File->StrandId);
    $Subject = SubjectController::GetById($File->SubjectId);

    echo '<div class="card rounded-4 shadow-sm mb-2">';
    echo '<div class="card-body">';
    echo '<h6 class="card-title"> Grade:  <strong>' . Enum_GradeLevel::ParseId($File->GradeLevelId) . '</strong></h6>';
    echo '<h6 class="card-title"> Strand:  <strong>' . $Strand->Name . '</strong></h6>';
    echo '<h6 class="card-title"> Subject: <strong>' . $Subject->Name . '</strong></h6>';
    echo '<h6 class="card-title"> Semester:  <strong>' . Enum_Semester::ParseSem($File->SemesterId) . '</strong></h6>';
    echo '<h6 class="card-title"> Quarter:  <strong>' . Enum_Quarter::ParseQ($File->QuarterId) . '</strong></h6>';
    echo '</div>';
    echo '</div>';
    if ($xlsx = SimpleXLSX::parse('../assets/files/' . $File->Filename)) {
        echo '<div class=card rounded-4 p-2 shadow-sm>';
        echo '<table  class="table table-hover"><tbody>';
        $i = 0;
        foreach ($xlsx->rows() as $elt) {
            if ($i == 0) {
                echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>" . $elt[2] . "</th></tr>";
            } else {
                echo "<tr><td>" . $elt[0] . "</td><td>" . $elt[1] . "</td><td>" . $elt[2] . "</td></tr>";
            }
            $i++;
        }
        echo "</tbody></table>";
        echo '</div>';
    } else {
        echo SimpleXLSX::parseError();
    }

}

if (isset($_POST['deleteexc'])) {
    $File = FileController::GetById(base64_decode($_POST['id']));
  
    try {
        if (unlink('../assets/files/' . $File->Filename)) {
            FileController::Delete($File->Id);
        }
        echo "t";
    } catch (\Throwable $th) {
        throw $th;
    }
}

if(isset($_POST['exportexc'])){
    $File = FileController::GetById(base64_decode($_POST['id']));
    $Grade = new Grade();
    $Grade->GradeLevelId = $File->GradeLevelId;
    $Grade->StrandId = $File->StrandId;
    $Grade->SemesterId = $File->SemesterId;
    $Grade->QuarterId = $File->QuarterId;
    $Grade->SubjectId = $File->SubjectId;
    $Grade->SY = $File->SY;

    if ($xlsx = SimpleXLSX::parse('../assets/files/' . $File->Filename)) {
        $i = 0;
        foreach ($xlsx->rows() as $elt) {
            if ($i == 0) {
                echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>" . $elt[2] . "</th></tr>";
            } else {
              $Grade->LRN = $elt[0];
              $Grade->Grade = $elt[2];
              try {
                if(GradeController::Insert($Grade)){
                    echo "t";
                }
              } catch (\Throwable $th) {
                  throw $th;
              }
              
            }
            $i++;
        }
        DbFileController::Insert($File->Id);
    } else {
        echo SimpleXLSX::parseError();
    }
}
