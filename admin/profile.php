<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");
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
    if (isset($_SESSION["auth_user"])) {
        $conditions = array(
            array("ID" => ["=", $_SESSION["auth_user"]["user_id"]])
        );
        $user = select("users", $conditions)[0];
    } else {
        $user = null;
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
<link rel="stylesheet" href="./assets/css/material-dashboard.css" />
<link rel="stylesheet" href="./assets/css/site.css" />

<main role="main" class="home text main-content position-relative border-radius-lg ">
    <div class="card my-2 mx-4 border-radius-xl shadow-none">
        <div class="container-fluid">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-self-end card h-100 mb-4">
                            <div class="card-body text-center">
                                <img src="assets/img/User.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?= $user["Name"] ?></h5>
                                <p class="mb-1"><?= $user["Role_id"] == 1 ? "Admin" : "Not an admin" ?></p>
                                <p class="mb-4">Mentor - management system</p>
                                <div class="mt-5 pt-5">
                                    <a href="update users.php?action=profile&id=<?= encrypt_machine("encrypt", $user['ID']) ?>" class="btn btn-success">Edit</a>
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
                                        <p class="mb-2"><span class="fw-bold">Skills</span> Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
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