<?php
session_start();

$title = "Course";
require_once("functions/code.php");
require_once("includes/header.php");
require_once("./dbcon/dbconfig.php");

$courses = select("courses");

if (isset($_SESSION["auth_user"])) {
  if (isset($_SESSION["auth_user"]["user_id"])) {
    $login = true;
    $id = $_SESSION["auth_user"]["user_id"];
  } else {
    $login = false;
    $id = null;
  }
}

$conditions = array(
  array("Student_id" => ["=",  $id])
);
$enrolled = select("enrolled_courses", $conditions)[0];

?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Courses</h2>
      <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
        quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Courses Section ======= -->
  <section id="courses" class="courses">
    <div class="container">

      <div class="row">

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
                      <a href="admin/enrolled_courses_conf.php?id=<?= $id ?>&course_id=<?= $row["ID"] ?>&login=<?= $login ?>" class="text-white">
                        <?php echo ($enrolled["Course_id"] ==  $row["ID"]) ? "Enrolled" : "Enroll" ?>

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

    </div>
  </section><!-- End Courses Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once("includes/footer.php"); ?>