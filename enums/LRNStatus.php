<?php
class Enum_LRNStatus{
    public static function Lock(){
        return '1';
    }
    public static function Unlock(){
        return '2';
    }
    public static function ParseStatus($id){
        if($id == '1'){
            return 'Lock';
        }
        if($id == '2'){
            return 'Unlock';
        }
    }
}

?>