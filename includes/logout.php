<?php

session_start();
unset($_SESSION['accountid']);
unset($_SESSION['studentid']);

session_destroy();
header("location:/ogs/", true, 301);
exit;
