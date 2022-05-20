<?php 
require_once __DIR__ . '/../config.php';

if(isset($_POST['lrn'])){
    //Check if LRn is LOck
    if(StudentController::IsLRNLock($_POST['lrn'])){
      echo "t";
    }else{
    //Show grade
     echo "Unlock";   
    }

}


?>