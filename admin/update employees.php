<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update employee";
include("includes/header.php");

$id = encrypt_machine("decrypt", $_GET['id']);

$conditions = array(
    array("ID" => ["=", $id])
);
$employee = select("employees", $conditions)[0];

$conditions = array(
    array("ID" => ["=", $employee["User_id"]])
);
$user = select("users", $conditions)[0];
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
            <?php $user_id = encrypt_machine("encrypt", $user['ID']);
            ?>
            <form action="employees_conf.php?id=<?= $employee['ID'] ?>" method="post" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label class="form-label" for="salary">Salary</label>
                    <input name="salary" type="text" class="form-control" value="<?= $employee["Salary"] ?>" autocomplete="off" id="salary" />
                    <div class="invalid-feedback">
                        You must write a valid number for salary!
                    </div>
                </div>
                <div class="my-2 col-lg-6 col-md-6 col-sm-12">
                    <label class="form-label d-block w-100">Did you want to</label>
                    <a href="update users.php?id=<?= $user_id ?>" class="btn btn-dark m-auto">Update user information?</a>
                </div>
                <div class="my-2 row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="users.php" class="btn btn-danger m-auto">Cancel</a>
                        <input type="submit" name="update-employee-btn" value="Update" class="btn btn-success new-btn m-auto"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("includes/footer.php");
?>