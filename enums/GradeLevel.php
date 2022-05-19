<?php

class Enum_GradeLevel
{
    public static function Grade11()
    {
        return "1";
    }
    public static function Grade12()
    {
        return "2";
    }
    public static function ParseId($id)
    {
        if ($id == "1") {
            return "Grade 11";
        }
        if ($id == "2") {
            return "Grade 12";
        }
    }
}

?>
