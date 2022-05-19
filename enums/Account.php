<?php
class Enum_AccountType{
    public static function Admin(){
        return '1';
    }
    public static function Student(){
        return '2';
    }
    public static function ParseAccount($Id){
        if($Id == '1'){
            return 'Admin';
        }
        if($Id == '2'){
            return 'Student';
        }
    }
}


?>