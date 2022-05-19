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
        foreach (AccountController::GetData() as $r) {
            if ($r['username'] == $username) {
                if ($r['password'] == $password) {
                    return true;
                } else {return false;}
            } else {return false;}
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
}
