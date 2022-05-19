<?php
require_once __DIR__ . '/../config.php';

class FileController{

    public static function Insert(File $f){
        $sql ="INSERT INTO `file`(
            `filename`,
            `gradelevelid`,
            `strandid`,
            `semesterid`,
            `subjectid`,
            `quarterid`,
            `sy`
        )
        VALUES(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )";

        try {
            DBx::ExecuteCommand($sql, [$f->Filename, $f->GradeLevelId, $f->StrandId, $f->SemesterId, $f->SubjectId, $f->QuarterId, $f->SY]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function Get(){
        return DBx::GetData("SELECT * FROM `file`");
    }
}

?>