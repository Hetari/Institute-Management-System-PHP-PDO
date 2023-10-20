<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Employees";
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
            <form action="employees_conf.php" method="post" class="row needs-validation validate-form" novalidate>
                <input type="hidden" id="hidden" name="hidden" value="">

                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label for="single_select2" class="form-label">User</label>
                    <select class="form-select" id="single_select2" data-placeholder="Choose one user">
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
                                $id = encrypt_machine("encrypt", $user["ID"]);
                        ?>
                                <option value="<?= $user['ID'] ?>"> <?= $user['Name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                    <div class="invalid-feedback">
                        You must to choose a user!
                    </div>
                </div>
                <div class="my-2 col-lg-6 col-md-6 col-sm-12 form-outline">
                    <label class="form-label" for="salary">Salary</label>
                    <input name="salary" type="number" class="form-control grade-input" autocomplete="off" id="salary" name="salary" />
                    <div class="invalid-feedback">
                        You must write a valid number for salary!
                    </div>
                </div>

                <div class="my-2 row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a class="btn btn-danger">Cancel</a>
                        <a class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="add-btn">Add</a>
                    </div>
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
                                <button type="submit" name="add-employee-btn" class="btn btn-success fw-bold">Save changes</button>
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
                            <table id="table" class="table table-striped table-hover table-bordered align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            username
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Salary
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Join date
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_employees = select("employees");

                                    foreach ($all_employees as $key => $user) {
                                        $id = encrypt_machine("encrypt", $user['ID']);
                                        $conditions = array(
                                            array("ID" => ["=", $user['User_id']])
                                        );
                                        $users = select("users", $conditions)[0];
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="./assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            <?= $users['Name'] ?>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <?= $users['Gender'] == 1 ? "Male" : "Female" ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $users['Username'] ?>
                                                </p>
                                                <p class="text-xs text-secondary mb-0">
                                                    <?= $users['Email'] ?>
                                                </p>
                                            </td>
                                            <?php ($users['Is_active'] == 1) ? $color = "success" : $color = "danger" ?>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-<?= $color ?>">
                                                    <?php ($users['Is_active'] == 1) ? $state = "Online" : $state = "Offline";
                                                    echo $state;
                                                    ?>
                                                </span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $users['Phone'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $user['Salary'] ?>
                                                </span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $user['Join_date'] ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="update employees.php?id=<?= $id ?>" class="badge badge-sm bg-gradient-warning text-decoration-none">Edit</a>
                                                </a>
                                                <a href="employees_conf.php?action=delete&id=<?= $id ?>" class="badge badge-sm bg-gradient-danger text-decoration-none">Delete</a>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php };
                                    ?>
                                </tbody>
                            </table>
                            <script>
                                new DataTable('#table');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once("includes/footer.php"); ?>