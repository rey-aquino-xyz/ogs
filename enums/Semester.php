<?php

class Enum_Semester{
    public static function First(){
        return '1';
    }
    public static function Second(){
        return '2';
    }
    public static function ParseSem($S){
       if($S == '1'){
           return 'First Semester';
       }
       if($S == '2'){
           return 'Second Semester';
       }
    }
}

?>