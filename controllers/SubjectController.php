<?php
require_once __DIR__ . '/../config.php';

class SubjectController
{
    public static function Insert($name)
    {
        $sql = "INSERT INTO `subject` (`name`) VALUES (?)";
        try {
            DBx::ExecuteCommand($sql, [$name]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }

    }

    public static function Get(){
        return DBx::GetData("SELECT * FROM `subject`");
    }

    public static function GetById($id){
        $s = new Subject();
        foreach(SubjectController::Get() as $r){
            if($r['id'] ==  $id){
                $s->Id = $r['id'];
                $s->Name = $r['name'];
            }
        }
        return $s;
    }
}
