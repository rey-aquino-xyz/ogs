<?php
require_once __DIR__ . '/../config.php';

class DbFileController
{

    public static function Insert($fileid)
    {
        $sql = "INSERT INTO `dbfile` (`fileid`) VALUES (?)";
        try {
            DBx::ExecuteCommand($sql, [$fileid]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public static function Get()
    {
        return DBx::GetData("SELECT * FROM `dbfile`");
    }

    public static function IsExistFile($fileid)
    {
        if (DBx::GetRowCount("SELECT * FROM `dbfile` WHERE `fileid`=?", [$fileid]) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
