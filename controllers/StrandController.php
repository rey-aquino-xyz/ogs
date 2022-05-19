<?php
require_once __DIR__ . '/../config.php';

class StrandController
{

    public static function Get()
    {
        return DBx::GetData("SELECT * FROM `strand`");
    }

    public static function GetById($id){
        $s = new Strand();
        foreach(StrandController::Get() as $r){
            if($r['id'] == $id){
                $s->Id = $r['id'];
                $s->Name = $r['name'];
            }
        }
        return $s;
    }
}
