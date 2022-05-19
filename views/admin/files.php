<?php
session_start();
require_once __DIR__ . '../../../config.php';

if (isset($_SESSION['accountid'])) {
    $Account = AccountController::GetById($_SESSION['accountid']);
    if ($Account->AccountTypeId == Enum_AccountType::Student()) {
        header("location:/ogs/views/user/", true, 301);
        exit;
    }
} else {
    header("location:/ogs/", true, 301);
}

$SubjectLists = SubjectController::Get();
$StrandLists  = StrandController::Get();
$FileLists = FileController::Get();
?>
<script src="../../js/admin.file.js"></script>
<div class="container mb-3">
    <a href="#UploadFile" id="uploadlink" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16"
            height="16" fill="currentColor" class="bi bi-cloud-upload me-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
            <path fill-rule="evenodd"
                d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
        </svg>Upload File</a>
</div>
<div class="card rounded-4">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">Grade</th>
                    <th scope="col">Strand</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Quarter</th>
                    <th scope="col">S.Y.</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($FileLists as $f): ?>
                <tr class="fw-normal">
                    <td><?= Enum_GradeLevel::ParseId($f['gradelevelid']); ?></th>

                    <?php $Strand = StrandController::GetById($f['strandid']);?>
                    <td><?= $Strand->Name; ?></th>

                    <?php $Subject = SubjectController::GetById($f['subjectid']) ?>
                    <td><?= $Subject->Name ?></th>

                    <td><?= Enum_Semester::ParseSem($f['semesterid']); ?></td>

                    <td><?= Enum_Quarter::ParseQ($f['quarterid']); ?></td>
                    <td><?= $f['sy']; ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="" class="text-decoration-none">View</a>
                            <a href="" class="text-decoration-none  text-danger">Delete File</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!--MODAL-->
<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFileModalLabel">Upload Excel File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" id="uploadfile">
                    <div class="card mb-3 p-2">
                        <h6 class="card-title">Grade Records</h6>
                        <div class="input-group">
                            <input type="file" name="excelfile" class="form-control" id="inputGroupFile02" required>
                        </div>
                    </div>
                    <div class="card">
                        <div class="form-floating">
                            <select name="gradelevelid" class="form-select mb-1" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option value="1">Grade 11</option>
                                <option value="2">Grade 12</option>
                            </select>
                            <label for="floatingSelect">Grade</label>
                        </div>
                        <div class="form-floating">
                            <select name="strandid" class="form-select mb-1" id="floatingSelect"
                                aria-label="Floating label select example">
                                <?php foreach($StrandLists as $s): ?>
                                <option value="<?= $s['id']; ?>"><?= $s['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Strand</label>
                        </div>
                        <div class="form-floating">
                            <select name="subjectid" class="form-select mb-1" id="floatingSelect"
                                aria-label="Floating label select example">
                                <?php foreach($SubjectLists as $s): ?>
                                <option value="<?= $s['id']; ?>"><?= $s['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Subject</label>
                        </div>
                        <div class="form-floating">
                            <select name="quarterid" class="form-select mb-1" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option value="1">First Quarter</option>
                                <option value="2">Second Quarter</option>
                                <option value="3">Third Quarter</option>
                                <option value="4">Fourth Quarter</option>
                            </select>
                            <label for="floatingSelect">Quarter</label>
                        </div>
                        <div class="form-floating">
                            <select name="semesterid" class="form-select mb-1" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option value="1">First Semester</option>
                                <option value="2">Second Semester</option>
                            </select>
                            <label for="floatingSelect">Semester</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="School Year" name="sy"
                                required>
                            <label for="floatingInput">S.Y.</label>
                        </div>
                    </div>
                    <div class="card text-end mt-3">
                        <button class="btn btn-outline-primary" type="submit">Process File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>