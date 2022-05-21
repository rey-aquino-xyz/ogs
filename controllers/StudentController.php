<?php

require_once __DIR__ . '/../config.php';

class StudentController
{

    public static function Insert(Student $m)
    {
        $sql = "INSERT INTO `student`(
            `id`,
            `fisrtname`,
            `lastname`,
            `lrn`,
            `sex`,
            `dib`,
            `lrnstatus`
        )
        VALUES(
           ?,?,?,?,?,?,?
        )";

        try {
            DBx::ExecuteCommand($sql, [$m->Id, $m->Firstname, $m->Lastname, $m->LRN, $m->Gender, $m->DOB, $m->LRNStatus]);
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

    public static function GetData()
    {
        return DBx::GetData("SELECT * FROM `student`");
    }

    public static function UpdateLRNStatus($lrn, $status)
    {
        $sql = "UPDATE `student` SET `lrnstatus` = ? WHERE `lrn`=?";
        try {
            DBx::ExecuteCommand($sql, [$status, $lrn]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function IsLRNLock($lrn)
    {
        $sql = "SELECT * FROM `student` WHERE `lrn`=?";
        foreach (DBx::GetData($sql, [$lrn]) as $r) {
            if ($r['lrnstatus'] == Enum_LRNStatus::Lock()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function IsLRNExist($lrn)
    {
        if (DBx::GetRowCount("SELECT * FROM `student` WHERE `lrn`=?", [$lrn]) > 0) {
            return true;
        } else {
            return false;
        }

    }

    public static function GetByLRN($lrn){
        $sql ="SELECT * FROM `student` WHERE `lrn`=?";
        $s = new Student();
        foreach(DBx::GetData($sql, [$lrn]) as $r){
            $s->Id = $r['id'];
            $s->Firstname = $r['fisrtname'];
            $s->Lastname = $r['lastname'];
            $s->LRN = $r['lrn'];
            $s->Gender = $r['sex'];
            $s->DOB = $r['dib'];
            $s->LRNStatus = $r['lrnstatus'];
        }
        return $s;
    }
    public static function GetById($id){
        $sql ="SELECT * FROM `student` WHERE `id`=?";
        $s = new Student();
        foreach(DBx::GetData($sql, [$id]) as $r){
            $s->Id = $r['id'];
            $s->Firstname = $r['fisrtname'];
            $s->Lastname = $r['lastname'];
            $s->LRN = $r['lrn'];
            $s->Gender = $r['sex'];
            $s->DOB = $r['dib'];
            $s->LRNStatus = $r['lrnstatus'];
        }
        return $s;
    }
}
