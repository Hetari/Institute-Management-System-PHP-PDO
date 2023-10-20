<?php
require_once("functions/code.php");

$title = "index";
require_once("includes/header.php");
require_once("dbcon/dbconfig.php");

// $ims_conditions = [
//   array("Page_id", ["=", 1])
// ];

// $ims = select("ims", $ims_conditions);
$students = select("users");
$employees = select("employees");
$courses = select("courses");
$subjects = select("subjects");

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

<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative">
    <h1>Learning Today, <br>Leading Tomorrow</h1>
    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
    <a href="courses.php" class="btn-get-started">Get Started</a>
  </div>
</section>

<main id="main">
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, iusto.</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua.
          </p>
          <ul>
            <li>
              <i class="fas fa-check-circle"></i>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              Duis aute irure dolor in reprehenderit in voluptate velit.
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
              irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
              pariatur.
            </li>
          </ul>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
            voluptate
          </p>

        </div>
      </div>

    </div>
  </section>

  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span><?= (count($students) - count($employees)) > 0 ? count($students) - count($employees) : 0 ?></span>
          <p>Students</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span><?= count($courses) > 0 ? count($courses) : 0 ?></span>
          <p>Courses</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span><?= count($subjects) > 0 ? count($subjects) : 0 ?></span>
          <p>Subjects</p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span><?= count($employees) > 0 ? count($employees) : 0 ?></span>
          <p>Trainers</p>
        </div>
      </div>

    </div>

    </div>
  </section>

  <section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Why Choose Mentor?</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Duis aute irure dolor in reprehenderit
              Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
              corporis.
            </p>
            <div class="text-center">
              <a href="about.php" class="more-btn">Learn More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="fas fa-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="fas fa-cube"></i>
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="fas fa-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section>

  <section id="popular-courses" class="courses">
    <div class="container">

      <div class="section-title">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div>

      <div class="row">
        <?php
        foreach ($courses as $course_tb => $row) {
          $conditions = array(
            array("Employee_id", ["=", $row["Employee_id"]])
          );
          $teacher_id = select("employees", $conditions, "User_id")[0]["User_id"];

          $conditions = array(
            array("ID", ["=", $teacher_id])
          );
          $teacher_img = select("users", $conditions, "Img_url, Name")[0];
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="uploads/<?= $row["Img_url"] ?>" class="img-fluid" alt="course image">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h3 class="btn btn-success btn-sm">
                    <a href="course-details.php" class="text-white">
                      <?= $row["Name"] ?>
                    </a>
                  </h3>

                </div>

                <p><?= $row["Description"] ?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="uploads/<?= $teacher_img["Img_url"] ?>" class="img-fluid" alt="">
                    <span><?= $teacher_img["Name"] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container">
      <div class="section-title">
        <h2>Trainers</h2>
        <p>Popular Trainers</p>
      </div>
      <div class="row">
        <?php
        foreach ($employees as $key => $value) {
          $conditions = array(
            array("ID" => ["=", $value['User_id']])
          );
          $user_name = select("users", $conditions, "Name")[0];
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?= $user_name["Name"] ?></h4>
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
  </section>
</main>
<?php require_once("includes/footer.php"); ?>