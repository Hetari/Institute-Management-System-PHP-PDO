﻿<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update course";
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
$course = select("courses", $conditions)[0];
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
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="card my-2 mx-4 border-radius-xl shadow-none">
        <div class="container-fluid p-4">
            <form action="courses_conf.php?id=<?= $course['ID'] ?>" method="post" class="row needs-validation" novalidate>
                <input type="hidden" id="hidden" name="hidden" value="">

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="inputGroupPrepend3 nameFeedback" placeholder="1A" value="<?= $course['Name'] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write course name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label class="form-label" for="fees">Course Fees</label>
                    <input name="fees" placeholder="1xxx" type="text" class="form-control" value="<?= $course['Fees'] ?>" autocomplete="off" id="fees" />
                    <div class="invalid-feedback">
                        You must write a valid number for fees!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-12 form-outline">
                    <label for="single_select2" class="form-label d-block">Subject</label>
                    <select class="form-select">
                        <?php
                        $conditions = array(
                            "id" => ["=", $course["Subject_id"]]
                        );
                        $subject = select("subjects", $conditions)[0];
                        $all_subjects = select("subjects");
                        foreach ($all_subjects as $key => $value) {
                            $selected = ($value['Subject_id'] == $subject["ID"]) ? 'selected' : '';
                        ?>
                            <option value=" <?= $value['ID'] ?>"> <?= $value['Name'] ?></option>
                        <?php } ?>
                    </select>

                    <div class="invalid-feedback">
                        You must to choose a subject!
                    </div>
                </div>

                <div class="my-2 col-12 form-floating">
                    <textarea class="form-control" name="note" placeholder="Leave a note here" id="floatingTextarea2"><?= $course['Description'] ?></textarea>
                    <label for="floatingTextarea2">Note</label>
                </div>

                <div class="my-2 row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="courses.php" class="btn btn-danger m-auto">Cancel</a>
                        <input type="submit" name="update-course-btn" value="Update" class="btn btn-success new-btn m-auto"></input>
                    </div>
                </div>
                <script defer>
                    $('#single_select2').on('change', function() {
                        var selectedOption = $(this).select2('data')[0];
                        var id = selectedOption.id;
                        document.getElementById("hidden").value = id;
                    });
                </script>
            </form>
        </div>
    </div>
</main>
<?php
include("includes/footer.php");
?>