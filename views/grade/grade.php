<?php
date_default_timezone_set('Asia/Hong_Kong');
require_once '../../config.php';

$StudentLRN = '';
if (isset($_POST['lrn'])) {
    $StudentLRN = $_POST['lrn'];
}
?>
<script src="../../js/lrn.js"></script>

<nav class="navbar bg-light shadow-sm rounded-4 mt-3">
    <div class="container-fluid justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="/ogs/">
            <img src="../../assets/school_logo.jpg" alt="" width="45" height="45"
                class="d-inline-block align-text-top me-2">
            AMECI | Online Grade Portal
        </a>
    </div>
</nav>

<div class="container col-10 mt-3">
    <div class="mb-2">
        <div class="card shadow-sm rounded-4 bg-secondary">
            <div class="card-body text-light">
            <h6 class="card-title">LRN: <strong><?=$StudentLRN;?></strong></h6>
            <?php if (StudentController::IsLRNExist($StudentLRN)): ?>
                    <?php $Student = StudentController::GetByLRN($_POST['lrn']);?>
                    <hr>
                <h6 class="card-title">Name: <strong><?=$Student->Lastname . ' ' . $Student->Firstname?></strong></h6>
                <h6 class="card-title">Gender: <strong><?=$Student->Gender?></strong> </h6>
                <h6 class="card-title">Date of Birth: <strong><?=$Student->DOB?></strong></h6>

                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="card mb-2 rounded-4 bg-light">
        <div class="card-body">
            <form action="" name="grade-frm">
                <div class="d-flex p-2">
                    <div class="form-floating col me-2">
                        <select class="form-select" id="floatingSelect" name="gradelevelid" aria-label="Floating label select example">
                            <option value="1">11</option>
                            <option value="2">12</option>
                        </select>
                        <label for="floatingSelect">Grade</label>
                    </div>
                    <input type="hidden" value="<?=$StudentLRN?>" name="q_lrn">
                    <div class="form-floating col me-2">
                        <select class="form-select" id="floatingSelect" name="strandid" aria-label="Floating label select example">
                        <?php foreach (StrandController::Get() as $r): ?>
                        <option value="<?=$r['id']?>"><?=$r['name']?></option>
                        <?php endforeach;?>
                        </select>
                        <label for="floatingSelect">Track / Strand</label>
                    </div>
                    <div class="form-floating col">
                        <select class="form-select" id="floatingSelect" name="sy" aria-label="Floating label select example">
                        <?php foreach (GradeController::GetSY() as $r): ?>
                            <option value="<?= $r['sy']?>"><?= $r['sy']?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="floatingSelect">School Year</label>
                    </div>
                </div>
                <button class="btn btn-primary p-2 me-2 float-end" type="submit">
                    Get Records
                </button>
            </form>
        </div>
    </div>

    <div id="grade-record"></div>

</div>