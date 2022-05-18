<?php
require_once __DIR__ .  '/../config.php';


$Person = new Person();
$Person->Id = '03221320-45454612-54545';

echo PersonController::Insert($Person);


?>