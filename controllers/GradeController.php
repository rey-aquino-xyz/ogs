<?php
require_once __DIR__ . '/../config.php';

class GradeController
{
    public static function Insert(Grade $g)
    {
        $sql = "INSERT INTO `grade`(
            `lrn`,
            `gradelevelid`,
            `strandid`,
            `semesterid`,
            `quarterid`,
            `subjectid`,
            `grade`,
            `sy`
        )
        VALUES(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )";

        try {
            DBx::ExecuteCommand($sql, [
                $g->LRN,
                $g->GradeLevelId,
                $g->StrandId,
                $g->SemesterId,
                $g->QuarterId,
                $g->SubjectId,
                $g->Grade,
                $g->SY
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }

    }

    public static function Get($lrn){
        return DBx::GetData("SELECT * FROM grade WHERE lrn =? GROUP BY subjectid ", [$lrn]);
    }
    public static function IsLRNExist($lrn){
        if(DBx::GetRowCount("SELECT * FROM `grade` WHERE `lrn`=?", [$lrn]) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function GetGrade($lrn, $gradelevelid, $strandid, $semesterid, $quarterid, $subjectid, $sy){
        return Dbx::GetSingleData("SELECT grade FROM grade WHERE lrn =? && gradelevelid=? && strandid=? && semesterid=? && quarterid=? && subjectid=? && sy=?", [
            $lrn,
            $gradelevelid,
            $strandid,
            $semesterid,
            $quarterid,
            $subjectid,
            $sy
        ]);
    }


    public static function GetSY(){
        $sql ="SELECT `sy` FROM `grade` GROUP BY `sy` ASC";
        return DBx::GetData($sql);
    }
}
