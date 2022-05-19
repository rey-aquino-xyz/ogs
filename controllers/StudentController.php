<?php
require_once __DIR__ . '/../config.php';

class StudentController
{

    public static function Insert(Student $m)
    {
        $sql = "INSERT INTO `student`(
            `fisrtname`,
            `lastname`,
            `lrn`,
            `sex`,
            `dib`,
            `lrnstatus`
        )
        VALUES(
           ?,?,?,?,?,?
        )";

        try {
            DBx::ExecuteCommand($sql, [$m->Firstname, $m->Lastname, $m->LRN, $m->Gender, $m->DOB, $m->LRNStatus]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function UpdateLRN($lrn, $id)
    {
        $sql = "UPDATE `student` SET `lrn` = ? WHERE `id`=?";
        try {
            DBx::ExecuteCommand($sql, [$lrn, $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function UpdateInfo(Student $m)
    {
        $sql = "UPDATE
        `student`
        SET
        `fisrtname` = ?,
        `lastname` = ?,
        `sex` = ?,
        `dib` = ?
        WHERE
        `id`=?";

        try {
            DBx::ExecuteCommand($sql, [$m->Firstname, $m->Lastname, $m->Gender, $m->DOB, $m->Id]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function GetData(){
        return DBx::GetData("SELECT * FROM `student`");
    }

    public static function UpdateLRNStatus($lrn, $status){
        $sql = "UPDATE `student` SET `lrnstatus` = ? WHERE `lrn`=?";
        try {
            DBx::ExecuteCommand($sql, [$status, $lrn]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }
}
