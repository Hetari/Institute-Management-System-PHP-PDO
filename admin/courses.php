<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Courses";
require_once("includes/header.php");

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
            title: 'message',
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
            <form action="courses_conf.php" method="post" enctype="multipart/form-data" class="row needs-validation" novalidate>
                <input type="hidden" id="hidden" name="hidden" value="">

                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupPrepend3 nameFeedback">
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="inputGroupPrepend3 nameFeedback" placeholder="1A" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write course name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label class="form-label" for="fees">Course Fees</label>
                    <input name="fees" placeholder="1xxx" type="number" class="form-control" autocomplete="off" id="fees" />
                    <div class="invalid-feedback">
                        You must write a valid number for fees!
                    </div>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="single_select2" class="form-label">Subject</label>
                    <select class="form-select" id="single_select2">
                        <?php
                        $all_subjects = select("subjects");
                        foreach ($all_subjects as $key => $value) {
                        ?>
                            <option value="<?= $value['ID'] ?>"> <?= $value['Name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                        You must to choose a subject!
                    </div>
                </div>

                <div class="my-2 col-12 form-floating">
                    <textarea class="form-control" placeholder="Leave a note here" name="note" id="note"></textarea>
                    <label for="note">Note</label>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            fee
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            subject
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            note
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_course = select("courses");
                                    foreach ($all_course as $key => $value) {
                                        $id = encrypt_machine("encrypt", $value['ID']);
                                        $conditions = array(
                                            array("ID" => ["=", $value['Subject_id']])
                                        );
                                        $subject = select("subjects", $conditions)[0];
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Name'] ?>
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Fees'] ?>
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $subject["Name"] ?>
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Description'] ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="update courses.php?id=<?= $id ?>" class="badge badge-sm bg-gradient-warning text-decoration-none">Edit</a>
                                                </a>
                                                <a href="courses_conf.php?action=delete&id=<?= $id ?>" class="badge badge-sm bg-gradient-danger text-decoration-none">Delete</a>
                                                </a>
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
<?php require_once("includes/footer.php"); ?>