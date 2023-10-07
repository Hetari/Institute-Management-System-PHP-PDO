<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update subjects";
include("includes/header.php");

$id = encrypt_machine("decrypt", $_GET['id']);

$conditions = array(
    array("ID" => ["=", $id])
);
$subject = select("subjects", $conditions)[0];

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
            <form action="users_conf.php" method="post" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="Name" class="form-label">Subject Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" aria-describedby="inputGroupPrepend3 nameFeedback" value="<?= $subject["Name"] ?>" required>
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
                                <button type="submit" name="add-user-btn" class="btn btn-success fw-bold">Save changes</button>
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