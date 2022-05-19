<?php
/** HELPERS */
require_once 'helpers/DBx.php';
include 'helpers/SimpleXLSX.php';

/** MODELS */
require_once 'models/Account.php';
require_once 'models/File.php';
require_once 'models/Grade.php';
require_once 'models/Strand.php';
require_once 'models/Student.php';
require_once 'models/Subject.php';

/** CONTROLLERS */
require_once 'controllers/StudentController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/XtraController.php';
require_once 'controllers/SubjectController.php';
require_once 'controllers/StrandController.php';
require_once 'controllers/FIleController.php';

/** ENUMS */
require_once 'enums/Account.php';
require_once 'enums/LRNStatus.php';
require_once 'enums/Quarter.php';
require_once 'enums/Semester.php';
require_once 'enums/GradeLevel.php';


?>