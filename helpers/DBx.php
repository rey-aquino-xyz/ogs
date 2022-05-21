<?php
require_once 'DBConfig.php';

class DBx extends DBConfig {

    public static function ExecuteCommand($query, array $param = null) {
     $config       = new DBConfig();
     $DBConnection = $config->GetConnectionString();
     $DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $BindParam = $DBConnection->prepare($query);
     if ($param != null):
      if($BindParam->execute($param)){
          return true;
      }else{ return false;}
     else:
      if($BindParam->execute()){return true;}else{
          return false;
      }
     endif;
     $DBConnection = null;
    }
   
    public static function GetRowCount($query, array $param = null) {
     $config       = new DBConfig();
     $DBConnection = $config->GetConnectionString();
     $DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $getData = $DBConnection->prepare($query);
     if ($param != null):
      $getData->execute($param);
     else:
      $getData->execute();
     endif;
     $data = $getData->rowCount();
     return $data;
     $DBConnection = null;
    }
   
    public static function GetData($query, array $param = null) {
     $config       = new DBConfig();
     $DBConnection = $config->GetConnectionString();
     $DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $getData = $DBConnection->prepare($query);
     if ($param != null):
      $getData->execute($param);
     else:
      $getData->execute();
     endif;
     $data = $getData->fetchAll();
     return $data;
     $DBConnection = null;
    }
    public static function GetSingleData($query, array $param = null) {
     $config       = new DBConfig();
     $DBConnection = $config->GetConnectionString();
     $DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $getData = $DBConnection->prepare($query);
     if ($param != null):
      $getData->execute($param);
     else:
      $getData->execute();
     endif;
     $data = $getData->fetchColumn();
     return $data;
     $DBConnection = null;
    }


   }
?>