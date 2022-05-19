<?php
require_once __DIR__ . '/../config.php';

class FileController
{

    public static function Insert(File $f)
    {
        $sql = "INSERT INTO `file`(
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

    public static function Get()
    {
        return DBx::GetData("SELECT * FROM `file`");
    }
    public static function Delete($id)
    {
        $sql = "DELETE
        FROM
            `file`
        WHERE
            `id`=?";
        try {
            DBx::ExecuteCommand($sql, [$id]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function GetById($id)
    {
        $f = new File();
        foreach (FileController::Get() as $r) {
            if ($r['id'] == $id) {
                $f->Id           = $r['id'];
                $f->Filename     = $r['filename'];
                $f->StrandId     = $r['strandid'];
                $f->GradeLevelId = $r['gradelevelid'];
                $f->SemesterId   = $r['semesterid'];
                $f->QuarterId    = $r['quarterid'];
                $f->SubjectId    = $r['subjectid'];
                $f->SY           = $r['sy'];
            }
        }
        return $f;
    }
}
