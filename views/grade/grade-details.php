<?php
require_once '../../config.php';

$LRN          = '';
$GradeLevelId = '';
$SY           = '';
$StrandId     = '';
if (isset($_POST['gradelevelid'])) {

    $LRN          = $_POST['lrn'];
    $StrandId     = $_POST['strandid'];
    $GradeLevelId = $_POST['gradelevelid'];
    $SY           = $_POST['sy'];
}

?>


<div class="container card mb-2 rounded-4 bg-success col-8">
    <div class="card-body text-light">
        <h6 class="card-title text-center"><strong>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</strong></h6>
    </div>
</div>
<div class="card rounded-4 mb-4">
    <div class="card-body">
        <h6 class="card-title text-center text-dark border-bottom border-1 p-2 fw-bold">[ FIRST SEMESTER ]</h6>
        <table class="table table-hover align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">Subjects</th>
                    <th scope="col" class="">Q1</th>
                    <th scope="col" class="">Q2</th>
                    <th scope="col" class="text-center">Semester <br> Final Grade</th>
                </tr>
            </thead>
            <tbody>
<?php
$Q1   = '0';
$Q2   = '0';
$S1FG = 0;
$S1   = 0;
?>
              <?php foreach (GradeController::Get($LRN) as $r): ?>
                <?php if ($r['lrn'] == $LRN && $r['gradelevelid'] == $GradeLevelId && $r['semesterid'] == Enum_Semester::First() && $r['sy'] == $SY && $r['strandid'] == $StrandId): ?>
                <?php $S1++;?>
                    <tr>
                    <?php $Subject = SubjectController::GetById($r['subjectid'])?>
                    <td scope="row"><?=$Subject->Name?></td>

                    <?php $q1 =  GradeController::GetGrade($LRN, $GradeLevelId, $StrandId, Enum_Semester::First(), Enum_Quarter::Q1(), $r['subjectid'], $SY); ?>
                    <?php $Q1 = $q1;?>
                    <td scope="row"><?= $q1 ?? 0?></td>
                    
                    <?php $q2 =  GradeController::GetGrade($LRN, $GradeLevelId, $StrandId, Enum_Semester::First(), Enum_Quarter::Q2(), $r['subjectid'], $SY); ?>
                    <?php $Q2 = $q2;?>
                    <td scope="row"><?= $q2 ?? 0?></td>

                   

                   <?php $S1FG += round(($Q1 + $Q2) / 2)?>
                <th scope="row" class="text-center"><?=round(($Q1 + $Q2) / 2) ?? 0?></th>

                </tr>
                <?php endif;?>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">General Average for the Semester:</th>
                    <?php if ($S1FG > 0 && $S1 > 0): ?>
                    <td class="text-center fw-bold"><?= round($S1FG / $S1)?></td>
                    <?php endif;?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="card rounded-4 mb-5">
    <div class="card-body">
    <h6 class="card-title text-center text-dark border-bottom border-1 p-2 fw-bold">[ SECOND SEMESTER ]</h6>
        <table class="table table-hover align-middle">
            <thead class="align-middle">
                <tr>
                <th scope="col">Subjects</th>
                    <th scope="col" class="">Q3</th>
                    <th scope="col" class="">Q4</th>
                    <th scope="col" class="text-center">Semester <br> Final Grade</th>
                </tr>
            </thead>
            <tbody>
            <?php
$Q3   = 0;
$Q4   = 0;
$S2FG = 0;
$S2   = 0;
?>
 <?php foreach (GradeController::Get($LRN) as $r): ?>
                <?php if ($r['lrn'] == $LRN && $r['gradelevelid'] == $GradeLevelId && $r['semesterid'] == Enum_Semester::Second() && $r['sy'] == $SY && $r['strandid'] == $StrandId): ?>
                <?php $S2++;?>

                <tr>
                <?php $Subject = SubjectController::GetById($r['subjectid'])?>
                    <td scope="row"><?=$Subject->Name?></td>

                    <?php $q3 =  GradeController::GetGrade($LRN, $GradeLevelId, $StrandId, Enum_Semester::Second(), Enum_Quarter::Q3(), $r['subjectid'], $SY); ?>
                    <?php $Q3 = $q3;?>
                    <td scope="row"><?= $q3?></td>

                    <?php $q4 =  GradeController::GetGrade($LRN, $GradeLevelId, $StrandId, Enum_Semester::Second(), Enum_Quarter::Q4(), $r['subjectid'], $SY); ?>
                    <?php $Q4 = $q4;?>
                    <td scope="row"><?= $q4?></td>

                <?php $S2FG += round(($Q3 + $Q4) / 2)?>
                <th scope="row" class="text-center"><?=round(($Q3 + $Q4) / 2)?></th>
                </tr>
                <?php endif;?>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                <th colspan="3" class="text-end">General Average for the Semester:</th>
                    <?php if ($S2FG > 0 && $S2 > 0): ?>
                    <td class="text-center fw-bold"><?=round($S2FG / $S2)?></td>
                    <?php endif;?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
