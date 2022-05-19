<?php
require_once __DIR__ . '/../config.php';

class AccountController
{
    public static function Insert(Account $a)
    {
        $sql = "INSERT INTO `account`(`username`, `password`, `typeid`, `studentid`)
        VALUES(
            ?,?,?,?
        )";

        try {
            DBx::ExecuteCommand($sql, [$a->Username, $a->Password, $a->AccountTypeId, $a->StudentId]);
            return true;
        } catch (\Throwable $th) {
            return false;
            throw $th;

        }
    }

    public static function GetData()
    {
        $sql = "SELECT * FROM `account`";
        return DBx::GetData($sql);
    }

    public static function IsAuthenticate($username, $password)
    {
        if(DBx::GetRowCount("SELECT * FROM `account`  WHERE `username` =? AND `password` =?", [$username, $password]) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function SeedAccount()
    {
        if (!DBx::GetRowCount("SELECT * FROM `account` WHERE typeid=?", [Enum_AccountType::Admin()]) > 0) {
            $a                = new Account();
            $a->Username      = 'admin';
            $a->Password      = 'admin12345';
            $a->AccountTypeId = Enum_AccountType::Admin();

            AccountController::Insert($a);
        }
    }

    public static function GetById($id){
        $a = new Account();
        foreach(AccountController::GetData() as $r){
            if($r['id'] == $id){
                $a->Id = $r['id'];
                $a->Username = $r['username'];
                $a->StudentId = $r['studentid'];
                $a->AccountTypeId = $r['typeid'];
            }
        }
        return $a;
    }
}
