<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$title = "Update users";
include("includes/header.php");

$id = encrypt_machine("decrypt", $_GET['id']);
$conditions = array(
    array("id" => ["=", $id])
);
$user = select("users", $conditions)[0];
$nameParts = explode(" ", $user['Name']);
$fname = $nameParts[0];
$lname = $nameParts[1];

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
            <form action="users_conf.php?id=<?= $user['ID'] ?>" method="post" class="row needs-validation" novalidate>
                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="inputGroupPrepend3 nameFeedback" required value=<?= "{$fname}" ?>>
                    <div id="fnameFeedback" class="invalid-feedback">
                        Write your first name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="inputGroupPrepend3 nameFeedback" required value=<?= "{$lname}" ?>>
                    <div id="lnameFeedback" class="invalid-feedback">
                        Write your last name correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-6 form-outline">
                    <label class="form-label" for="phone">Phone number</label>
                    <input type="tel" id="phone" class="form-control" placeholder="7xxxxxxxx" name="phone" value=<?= "{$user['Phone']}" ?> />
                    <div id="phoneFeedback" class="invalid-feedback">
                        Write your number correctly!
                    </div>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required value=<?= "{$user['Username']}" ?>>
                    <div id="usernameFeedback" class="invalid-feedback">
                        Please write a valid username.
                    </div>
                </div>

                <div class="my-2 col-lg-4 col-md-4 col-sm-3 form-outline">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="off" placeholder="name@domain.com" name="email" required value=<?= "{$user['Email']}" ?>>
                    <div id="emailHelp" class="form-text">
                    </div>
                    <small class="form-text text-danger invalid-feedback">Email must be valid!</small>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option disabled>You are...</option>
                        <?php
                        $genderOptions = [
                            1 => "Male",
                            2 => "Female",
                            3 => "Don't mention it"
                        ];

                        foreach ($genderOptions as $value => $label) {
                            $selected = ($user['Gender'] == $value) ? 'selected' : '';
                            echo "<option value=\"$value\" $selected>$label</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="my-2 col-lg-2 col-md-2 col-sm-3 form-outline">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option disabled>The role is...</option>
                        <?php
                        $all_roles = select("roles");

                        foreach ($all_roles as $values) {
                            $selected = ($user["Role_id"] == $values['ID']) ? ' selected' : '';
                            echo "<option value=\"{$values['ID']}\"$selected>{$values['Name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-2 form-check mt-5">
                    <div class="form-check">
                        <?php
                        ($user["Is_active"] == 1) ? $check = "checked" : $check = " "

                        ?>
                        <input <?= $check ?> name="active" class="form-check-input" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label text-black" for="flexCheckDefault">
                            Active
                        </label>
                    </div>
                    <div class="invalid-feedback">
                        You must tell the account is active or not!
                    </div>
                </div>

                <div class="my-2 row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a class="btn btn-outline-danger m-auto">Cancel</a>
                        <input type="submit" name="update-user-btn" value="Update" class="btn new-btn m-auto"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include("includes/footer.php");
?>