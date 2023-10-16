<?php
require_once("functions/code.php");

$title = "index";
require_once("includes/header.php");
require_once("dbcon/dbconfig.php");

$ims_conditions = [
  array("Page_id", ["=", 1])
];

$ims = select("ims", $ims_conditions);
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
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative">
    <h1><?= nl2br($ims[0]["Text"]) ?></h1>
    <h2><?= $ims[1]["Text"] ?></h2>
    <a href="courses.php" class="btn-get-started">Get Started</a>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
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
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
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
  </section><!-- End Counts Section -->

  <!-- ======= Why Us Section ======= -->
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
  </section><!-- End Why Us Section -->

  <!-- ======= Features Section ======= -->
  <!-- <section id="features" class="features">
    <div class="container">

      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="fas fa-store" style="color: #ffbb2c;"></i>
            <h3><a href="">Lorem Ipsum</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="fas fa-chart-bar" style="color: #5578ff;"></i>
            <h3><a href="">Dolor Sitema</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="fas fa-calendar-alt" style="color: #e80368;"></i>
            <h3><a href="">Sed perspiciatis</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="fas fa-paint-brush" style="color: #e361ff;"></i>
            <h3><a href="">Magni Dolores</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-database" style="color: #47aeff;"></i>
            <h3><a href="">Nemo Enim</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-ruler-horizontal" style="color: #ffa76e;"></i>
            <h3><a href="">Eiusmod Tempor</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-list-alt" style="color: #11dbcf;"></i>
            <h3><a href="">Midela Teren</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-tags" style="color: #4233ff;"></i>
            <h3><a href="">Pira Neve</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-anchor" style="color: #b2904f;"></i>
            <h3><a href="">Dirada Pack</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-compact-disc" style="color: #b20969;"></i>
            <h3><a href="">Moton Ideal</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-network-wired" style="color: #ff5828;"></i>
            <h3><a href="">Verdo Park</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="fas fa-fingerprint" style="color: #29cc61;"></i>
            <h3><a href="">Flavor Nivelanda</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section> -->
  <!-- End Features Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses">
    <div class="container">

      <div class="section-title">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div>

      <div class="row">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Web Development</h4>
                <p class="price">$169</p>
              </div>

              <h3><a href="course-details.php">Website Design</a></h3>
              <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem
                tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                  <span>Antonio</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="fas fa-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="fas fa-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Marketing</h4>
                <p class="price">$250</p>
              </div>

              <h3><a href="course-details.php">Search Engine Optimization</a></h3>
              <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem
                tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                  <span>Lana</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="fas fa-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="fas fa-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="course-item">
            <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Content</h4>
                <p class="price">$180</p>
              </div>

              <h3><a href="course-details.php">Copywriting</a></h3>
              <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem
                tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                  <span>Brandon</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="fas fa-user"></i>&nbsp;20
                  &nbsp;&nbsp;
                  <i class="fas fa-heart"></i>&nbsp;85
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

      </div>

    </div>
  </section><!-- End Popular Courses Section -->

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>Walter White</h4>
              <span>Web Development</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut
                aut aut
              </p>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>Sarah Jhinson</h4>
              <span>Marketing</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum
                temporibus
              </p>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>William Anderson</h4>
              <span>Content</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Trainers Section -->

</main><!-- End #main -->
<?php require_once("includes/footer.php"); ?>