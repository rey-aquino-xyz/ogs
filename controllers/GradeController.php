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
}
