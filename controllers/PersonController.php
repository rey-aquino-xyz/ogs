<?php
require_once __DIR__ .  '/../config.php';


class PersonController{

    public static function Insert(Person $m){
        return $m->Id;
    }
}

?>