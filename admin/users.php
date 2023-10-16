<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Users";
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

if (isset($_SESSION["auth"])) {
    if ($_SESSION["roleAs"] != 1) {
        re_direct("../index.php", "warning", "You are not the admin");
        die();
    }
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
            <form action="users_conf.php" method="post" enctype="multipart/form-data" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-3 col-md-4 col-sm-12 form-outline">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupPrepend3 nameFeedback">
                </div>

                <div class="my-2 col-lg-3 col-md-4 col-sm-6 form-outline">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="inputGroupPrepend3 nameFeedback" placeholder="Ebraheem" maxlength="30" required>
                    <div id="fnameFeedback" class="invalid-feedback">
                        Write your first name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-3 col-md-4 col-sm-6 form-outline">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="inputGroupPrepend3 nameFeedback" placeholder="Hetari" maxlength="30" required>
                    <div id="lnameFeedback" class="invalid-feedback">
                        Write your last name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-3 col-md-4 col-sm-6 form-outline">
                    <label class="form-label" for="phone">Phone number</label>
                    <input type="tel" id="phone" class="form-control" maxlength="9" placeholder="7xxxxxxxx" name="phone" />
                    <div id="phoneFeedback" class="invalid-feedback">
                        Write your number correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-6 form-outline">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" maxlength="30" placeholder="E_1_E" required>
                    <div id="usernameFeedback" class="invalid-feedback">
                        Please write a valid username.
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-12 form-outline">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="off" placeholder="name@domain.com" name="email" required>
                    <div id="emailHelp" class="form-text">
                    </div>
                    <small class="form-text text-danger invalid-feedback">Email must be valid!</small>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option selected disabled>You are...</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Don't mention it</option>
                    </select>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option selected disabled>The role is...</option>
                        <?php
                        $all_roles = select("roles");

                        // print_r($role);
                        foreach ($all_roles as $arr => $values) {
                            // foreach ($arr as $key => $value) {
                            echo "<option value=\"{$values['ID']}\">{$values['Name']}</option>";
                            // }
                        }
                        ?>
                    </select>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-2 form-check mt-5">
                    <div class="form-check">
                        <input name="active" class="form-check-input" checked type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label text-black" for="flexCheckDefault">
                            Active
                        </label>
                    </div>
                    <div class="invalid-feedback">
                        You must tell the account is active or not!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label class="form-label" for="password">Password</label>
                    <input name="password" type="password" class="form-control" autocomplete="off" id="password" aria-describedby="passwordHelp" maxlength="25" required />
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label class="form-label" for="conPassword">Conform password</label>
                    <input name="conPassword" type="password" class="form-control" autocomplete="off" id="conPassword" aria-describedby="conPasswordHelp" value="" maxlength="25" required />
                    <div id="conPasswordFeedback" class="invalid-feedback">
                        Doesn't match!
                    </div>
                </div>

                <div class="password-strength-group col-lg-4 col-md-4 col-sm-12 mt-5 pt-1" data-strength="">
                    <div id="password-strength-meter" class="mb-4 mt-1 password-strength-meter">
                        <div class="meter-block"></div>
                        <div class="meter-block"></div>
                        <div class="meter-block"></div>
                        <div class="meter-block"></div>
                    </div>
                </div>

                <div class="my-2 row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a class="btn btn-danger m-auto">Cancel</a>
                        <a class="btn btn-success m-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" id="add-btn">Add</a>
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
                                <button type="submit" name="add-user-btn" class="btn btn-success fw-bold" value="Save changes"></button>
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
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_users = select("users");
                                    foreach ($all_users as $key => $value) {
                                        $id = encrypt_machine("encrypt", $value['ID']);
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="./assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            <?= $value['Name'] ?>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <?= $value['Gender'] == 1 ? "Male" : "Female" ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $value['Username'] ?>
                                                </p>
                                                <p class="text-xs text-secondary mb-0">
                                                    <?= $value['Email'] ?>
                                                </p>
                                            </td>
                                            <?php ($value['Is_active'] == 1) ? $color = "success" : $color = "danger" ?>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-<?= $color ?>">
                                                    <?php ($value['Is_active'] == 1) ? $state = "Online" : $state = "Offline";
                                                    echo $state;
                                                    ?>
                                                </span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= $value['Phone'] ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="update users.php?id=<?= $id ?>" class="badge badge-sm bg-gradient-warning text-decoration-none">Edit</a>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }; ?>
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