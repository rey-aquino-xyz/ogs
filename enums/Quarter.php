<?php
class Enum_Quarter{
    public static function Q1(){
        return '1';
    }
    public static function Q2(){
        return '2';
    }
    public static function Q3(){
        return '3';
    }
    public static function Q4(){
        return '4';
    }
    public static function ParseQ($Q){
        if($Q == '1'){
            return 'First Quarter';
        }
        if($Q == '2'){
            return 'Second Quarter';
        }
        if($Q == '3'){
            return 'Third Quarter';
        }
        if($Q == '4'){
            return 'Fourth Quarter';
        }
    }
}

?>