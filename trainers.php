<?php
require_once("functions/code.php");

$title = "trainers";
require_once("includes/header.php");
require_once("dbcon/dbconfig.php");

$employees = select("employees");

if (isset($_SESSION['message'])) {
?>
  <script>
    Swal.fire({
      icon: <?= "'" . $_SESSION['icon'] . "'" ?>,
      position: 'top',
      title: <?= "'" . $_SESSION['message'] . "'" ?>,
      showConfirmButton: false,
      timer: 2000
    })
  </script>
<?php unset($_SESSION['message']);
} else
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Trainers</h2>
      <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
        quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container">
      <div class="row">
        <?php
      foreach ($employees as $key => $value) {
        $conditions = array(
          array("ID" => ["=", $value['User_id']])
        );
        $user_name = select("users", $conditions, "Name")[0];

        $conditions = array(
          array("ID" => ["=", $value['Subject_id']])
        );
        $subject_name = select("subjects", $conditions, "Name")[0];
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?= $user_name["Name"] ?></h4>
                <span><?= $subject_name["Name"] ?></span>
                <p><?= $value["Description"] ?></p>
                <div class="social">
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href=""><i class="fab fa-facebook"></i></a>
                  <a href=""><i class="fab fa-instagram"></i></a>
                  <a href=""><i class="fab fa-telegram"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php
      }
        ?>
      </div>
    </div>
  </section><!-- End Trainers Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once("includes/footer.php"); ?>