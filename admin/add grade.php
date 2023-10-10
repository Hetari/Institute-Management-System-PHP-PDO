<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Add grades";
include_once("includes/header.php");
$id = encrypt_machine("decrypt", $_GET['id']);

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

if (isset($_SESSION['message'])) {
?>
    <script>
        Swal.fire({
            icon: <?= "'" . $_SESSION['icon'] . "'" ?>,
            title: 'Massage',
            text: <?= "'" . $_SESSION['message'] . "'" ?>,
            confirmButtonColor: '#151515',
            backdrop: 'rgba(63, 194, 139, 0.5)'
        })
    </script>
<?php unset($_SESSION['message']);
} else
?>

<main role="main" class="home text main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="card navbar navbar-main navbar-expand-lg my-2 mx-4 border-radius-xl shadow-none" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm opacity-5 text-dark">
                        Pages
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active">
                        <?= (basename($_SERVER['PHP_SELF'], ".php") == 'index') ? "Dashboard" : ucwords(basename($_SERVER['PHP_SELF'], ".php")) ?>
                    </li>
                </ol>
                <h6 class="font-weight-bolder mb-0">
                    <?= (basename($_SERVER['PHP_SELF'], ".php") == 'index') ? "Dashboard" : ucwords(basename($_SERVER['PHP_SELF'], ".php")) ?>
                </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Type here...</label>
                        <input type="number" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card my-2 mx-4 border-radius-xl shadow-none">
        <div class="container-fluid p-4">
            <form action="grades_conf.php" method="post" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Presentation</label>
                    <input type="number" min="0" class="form-control grade-input" id="presentation-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Participation</label>
                    <input type="number" class="form-control grade-input" id="participation-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Homework</label>
                    <input type="number" class="form-control grade-input" id="homework-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Attendance</label>
                    <input type="number" class="form-control grade-input" id="attendance-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Story</label>
                    <input type="number" class="form-control grade-input" id="story-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Story</label>
                    <input type="number" class="form-control grade-input" id="story-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Quiz - 1</label>
                    <input type="number" class="form-control grade-input" id="quiz1-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Quiz - 2</label>
                    <input type="number" class="form-control grade-input" id="quiz2-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="grade" class="form-label">Final Exam</label>
                    <input type="number" class="form-control grade-input" id="final-grade" name="grade" aria-describedby="inputGroupPrepend3 nameFeedback" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write the grade correctly!
                    </div>
                </div>

                <!-- <div class="my-2 col-lg-3 col-md-3 col-sm-6 form-outline">
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
                <option user="<?= $user['ID'] ?>"> <?= $user['Name'] ?></option>
        <?php
            }
        }
        ?>
    </select>
    <div class="invalid-feedback">
        You must to choose a student!
    </div>
</div> -->

                <div class="my-2 col-lg-3 col-md-3 col-sm-6 form-outline">
                    <label for="single_select2" class="form-label">Course Name</label>
                    <select class="form-select2" id="single_select2" data-placeholder="Choose a student">
                        <option></option>
                        <?php
                        $all_courses = select("courses");
                        foreach ($all_courses as $key => $user) {
                        ?>
                            <option value="<?= $value['ID'] ?>"> <?= $value['Name'] ?></option>
                        <?php } ?>
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        You must to choose a student!
                    </div>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-6 form-outline">
                    <label for="grade" class="form-label">Sum</label>
                    <input name="sum-grade" id="sum-grade" class="form-control" value="0" type="number" disabled readonly>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-6 form-outline">
                    <label for="grade" class="form-label">Average</label>
                    <input name="average-grade" id="average-grade" class="form-control" value="0" type="number" disabled readonly>
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

    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>
                            <?= ucwords(basename($_SERVER['PHP_SELF'], ".php")) ?>
                        </h6>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover table-bordered align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Presentation
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Participation
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Homework
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Attendance
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Story
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Quiz1
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Quiz2
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Final_exam
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Sum
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Average
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Student
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Course
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_grades = select("grades");
                                    foreach ($all_grades as $key => $value) {
                                        $id = encrypt_machine("encrypt", $value['ID']);
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Presentation'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Participation'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Homework'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Attendance'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Story'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Quiz1'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Quiz2'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Final_exam'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Sum'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Average'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Student_id'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Course_id'] ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>

                            <script>
                                new DataTable('#table', {
                                    dom: "<'row'<'col-3 mt-auto'l><'offset-3 col-6 col-6 d-flex justify-content-end'f><'col-sm-3 text-right'C>>" +
                                        "<'row'<'col-sm-12'tr>>" +
                                        "<'row'<''p>>"
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("includes/footer.php"); ?>