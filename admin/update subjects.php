<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update subjects";
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
$subject = select("subjects", $conditions)[0];

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
            <form action="subjects_conf.php?id=<?= $subject['ID'] ?>" method="post" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="name" class="form-label">Subject Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $subject["Name"] ?>" required>
                    <div id="nameFeedback" class="invalid-feedback">
                        Write subject name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="shortcut" class="form-label">Subject shortcut</label>
                    <input type="text" class="form-control" id="shortcut" name="shortcut" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $subject["Shortcut"] ?>" required>
                    <div id="shortcutFeedback" class="invalid-feedback">
                        Write subject shortcut correctly!
                    </div>
                </div>

                <div class="my-2 row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="subjects.php" class="btn btn-danger m-auto">Cancel</a>
                        <input type="submit" name="update-subject-btn" value="Update" class="btn btn-success new-btn m-auto"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("includes/footer.php");
?>