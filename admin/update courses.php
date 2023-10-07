<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update course";
include("includes/header.php");

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
            <form action="courses_conf.php" method="post" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="inputGroupPrepend3 nameFeedback" placeholder="1A" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write course name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label class="form-label" for="fees">Course Fees</label>
                    <input name="fees" placeholder="1xxx" type="text" class="form-control" autocomplete="off" id="fees" />
                    <div class="invalid-feedback">
                        You must write a valid number for fees!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-12 form-outline">
                    <label for="single_select2" class="form-label">Subject</label>
                    <select class="form-select" id="single_select2" data-placeholder="Choose a subject">
                        <?php
                        $all_subjects = select("subjects");
                        $options = array();
                        foreach ($all_subjects as $sub_id => $sub_name) {
                            $options[$sub_id] = $sub_name;
                        }

                        foreach ($options as $value => $label) {
                            $selected = ($course['ID'] == $value) ? 'selected' : '';
                            echo "<option value=\"$value\" $selected>$label</option>";
                        }
                        ?>
                    </select>

                    <div class="invalid-feedback">
                        You must to choose a subject!
                    </div>
                </div>

                <div class="my-2 col-12 form-floating">
                    <textarea class="form-control" placeholder="Leave a note here" id="floatingTextarea2"></textarea>
                    <label for="floatingTextarea2">Note</label>
                </div>

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