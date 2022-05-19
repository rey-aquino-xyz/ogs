<?php
require_once __DIR__ . '/../config.php';

class AccountController
{
    public static function Insert(Account $a)
    {
        $sql = "INSERT INTO `account`(`username`, `password`, `typeid`)
        VALUES(
            ?,?,?
        )";

        try {
            DBx::ExecuteCommand($sql, [$a->Username, $a->Password, $a->AccountTypeId]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;

        }
    }

    public static function GetData(){
        $sql="SELECT * FROM `account`";
        return DBx::GetData($sql);
    }

    public static function IsAuthenticate($username, $password){
        foreach(AccountController::GetData() as $r){
            if($r['username'] == $username){
                if($r['password']== $password){
                    return true;
                }else{ return false;}
            }else{ return false;}
        }
    }
}
