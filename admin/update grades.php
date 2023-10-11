<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update grades";
include("includes/header.php");

if (isset($_SESSION["auth"])) {
    if ($_SESSION["roleAs"] != 1) {
        re_direct("../index.php", "warning", "You are not the admin");
        die();
    }
} else {
?>
    <script>
        window.location.assign("../index.php")
    </script>
<?php
    die();
}

$id = encrypt_machine("decrypt", $_GET['id']);
$conditions = array(
    array("ID" => ["=", $id])
);
$grade = select("grades", $conditions)[0];

?>

<main role="main" class="home text main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="card navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3 d-flex justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm opacity-5 text-dark">
                        Pages
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active">
                        <?= (basename($_SERVER['PHP_SELF'], ".php") == 'index') ? "Dashboard" : ucwords(basename($_SERVER['PHP_SELF'], ".php")) ?>
                    </li>
                </ol>
                <h6 class="font-weight-bolder mb-0"><?= (basename($_SERVER['PHP_SELF'], ".php") == 'index') ? "Dashboard" : ucwords(basename($_SERVER['PHP_SELF'], ".php")) ?></h6>
            </nav>
            <ul class="navbar-nav  d-flex  align-items-end justify-content-around">
                <li class="nav-item px-3">
                    <a href="profile.php" class="nav-link p-0 text-body">
                        <i class="fa fa-user fixed-plugin-button-nav cursor-pointer fs-4" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="card my-2 mx-4 border-radius-xl shadow-none">
        <div class="container-fluid p-4">
            <form action="grades_conf.php" method="post" class="row needs-validation" novalidate>
                Sure! Here's the code with the value attribute added to each input element:
                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Participation</label>
                    <input type="text" class="form-control grade-input" id="participation-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Participation'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Homework</label>
                    <input type="text" class="form-control grade-input" id="homework-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Homework'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Attendance</label>
                    <input type="text" class="form-control grade-input" id="attendance-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Attendance'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Story</label>
                    <input type="text" class="form-control grade-input" id="story-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Story'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Story</label>
                    <input type="text" class="form-control grade-input" id="story-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Story'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Quiz - 1</label>
                    <input type="text" class="form-control grade-input" id="quiz1-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Quiz1'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Quiz - 2</label>
                    <input type="text" class="form-control grade-input" id="quiz2-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Quiz2'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Final Exam</label>
                    <input type="text" class="form-control grade-input" id="final-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $grade['Final_exam'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-3 col-md-3 col-sm-6 form-outline">
                    <label for="single_select" class="form-label">Student Name</label>
                    <select class="form-select" id="single_select" data-placeholder="Choose a student">
                        <option></option>
                        <?php
                        $all_users = select("users");
                        $all_employees = select("employees");
                        foreach ($all_users as $key => $user) {
                            $is_employee = false;
                            foreach ($all_employees as $employee) {
                                if ($user['ID'] == $employee['User_id']) {
                                    $is_employee = true;
                                    break;
                                }
                            }
                            if (!$is_employee) {
                        ?>
                                <option value="<?= $user['ID'] ?>"> <?= $user['Name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        You must to choose a student!
                    </div>
                </div>

                <div class="my-2 col-lg-3 col-md-3 col-sm-6 form-outline">
                    <label for="single_select2" class="form-label">Course Name</label>
                    <select class="form-select2" id="single_select2" data-placeholder="Choose a student">
                        <option></option>
                        <?php
                        $all_courses = select("courses");
                        foreach ($all_courses as $key => $value) {
                        ?>
                            <option value="<?= $value['ID'] ?>"> <?= $value['Name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                        You must to choose a student!
                    </div>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-6 form-outline">
                    <label for="grade" class="form-label">Sum</label>
                    <input name="sum-grade" id="sum-grade" class="form-control" type="text" disabled value="<?= $grade['Sum'] ?>" readonly>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-6 form-outline">
                    <label for="grade" class="form-label">Average</label>
                    <input name="average-grade" id="average-grade" class="form-control" type="text" disabled value="<?= $grade['Average'] ?>" readonly>
                </div>

                <script>
                    var gradeInputs = document.getElementsByClassName('grade-input');
                    var sumInput = document.getElementById('sum-grade');
                    var averageInput = document.getElementById('average-grade');
                    for (var i = 0; i < gradeInputs.length; i++) {
                        gradeInputs[i].addEventListener('input', calculate);
                    }

                    function calculate() {
                        var sum = 0;
                        for (var i = 0; i < gradeInputs.length; i++) {
                            var grade = parseFloat(gradeInputs[i].value) || 0;
                            sum += grade;
                        }
                        var average = sum / gradeInputs.length;
                        sumInput.value = sum;
                        averageInput.value = average.toFixed(2);
                    }
                </script>

                <div class="col-12 mt-4 pt-3">
                    <a class="btn btn-danger">Cancel</a>
                    <a class="btn btn-success ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure of the data that you want to save it?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add-course-btn" class="btn btn-success fw-bold">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("includes/footer.php");
?>