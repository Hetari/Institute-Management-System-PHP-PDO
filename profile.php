<?php
session_start();
require_once("dbcon/dbconfig.php");
require_once("functions/code.php");

if (!isset($_SESSION["auth"])) {
?>
    <script>
        window.location.assign("login.php")
    </script>
<?php
    die();
} else {
    if (isset($_SESSION["auth_user"])) {
        $conditions = array(
            array("ID" => ["=", $_SESSION["auth_user"]["user_id"]])
        );
        $user = select("users", $conditions)[0];

        $conditions = array(
            array("Student_id" => ["=", $user["ID"]])
        );
        $enrolled = select("enrolled_courses", $conditions);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Aperture">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mentor</title>
    <meta name="description" content="Aperture">

    <style>
        #main-content {
            display: none;
        }

        .main-content {
            height: 98vh;
        }

        .container {
            top: 50%;
            transform: translateY(-45%);
            position: relative;
        }
    </style>

    <link rel="icon" type="image/png" href="admin/assets/img/favicon.png">


    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/select2.min.css">
    <link rel="stylesheet" href="admin/assets/css/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="admin/assets/css/password-strength.css">
    <link rel="stylesheet" href="admin/assets/fontawesome-free-6.4.2-web/css/all.css" />


    <script src="admin/assets/js/jquery-3.7.0.min.js"></script>
    <script src="admin/assets/js/bootstrap.js"></script>
    <script src="admin/assets/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="admin/assets/css/dash.css" />
    <link rel="stylesheet" href="admin/assets/css/site.css" />
</head>

<body>
    <?php

    require_once("admin/includes/script.php");
    ?>

    <script src="admin/assets/js/sweetalert2.js"></script>
    <div id="main-content">

        <?php
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
        <link rel="stylesheet" href="admin/assets/css/material-dashboard.css" />
        <link rel="stylesheet" href="admin/assets/css/site.css" />

        <main class="text main-content position-relative border-radius-lg d-flex align-items-center flex-column mx-5">
            <div class="h-100 w-100 card my-2 mx-4 border-radius-xl shadow-none d-flex align-items-center">
                <div class="container-fluid">
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column align-self-end card h-100 mb-4">
                                    <div class="card-body text-center">
                                        <img src="uploads/<?= $user['Img_url'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                        <h5 class="my-3"><?= $user["Name"] ?></h5>
                                        <p class="mb-1"><?= $user["Role_id"] == 1 ? "Admin" : "Not an admin" ?></p>
                                        <p class="mb-4">Mentor - management system</p>
                                        <div class="mt-5 pt-5 d-flex justify-content-around">
                                            <a href="update profile.php?action=profile&id=<?= encrypt_machine("encrypt", $user['ID']) ?>" class="btn btn-success">Edit</a>
                                            <a href="index.php" class="btn btn-dark">Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-1">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="mb-1"><?= $user["Name"] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-1">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="mb-1"><?= $user["Email"] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-1">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="mb-1"><?= $user["Phone"] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-1">Gender</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="mb-1"><?= $user["Gender"] == 1 ? "Male" : "Female" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-2 mb-md-0">
                                            <div class="card-body">
                                                <p class="mb-2"><span class="fw-bold">Courses</span> enrolled
                                                </p>
                                                <?php
                                                foreach ($enrolled as $key => $value) {
                                                    $conditions = array(
                                                        array("ID" => ["=", $value["Course_id"]])
                                                    );
                                                    $course = select("courses", $conditions)[0];
                                                ?>
                                                    <p class="mb-1" style="font-size: .77rem;"><?= $course["Name"] ?></p>
                                                    <div class="progress rounded" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/form.js"></script>
    <script src="assets/js/site.js"></script>

    <script>
        document.querySelector('form').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission
                document.getElementById('add-btn').click();
            }
        });

        $('#single_select2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: true
        });
        $('#single_select').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: true
        });
    </script>
    </div>
    <script>
        document.getElementById('main-content').style.display = 'block';
    </script>
</body>

</html>