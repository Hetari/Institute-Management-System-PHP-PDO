<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mentor <?= !empty($title) ? " - " . $title : "" ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="admin/assets/fontawesome-free-6.4.2-web/css/all.css" rel="stylesheet">
  <link href="admin/assets/css/bootstrap.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <script src="./assets/js/sweetalert2.js"></script>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Mentor</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="trainers.php">Trainers</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="pricing.php">Pricing</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="fas fa-list mobile-nav-toggle"></i>
      </nav>
      <?php
      if (isset($_SESSION['auth'])) {
      ?>
        <style>
          .avatar {
            color: #000;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            border-radius: 50rem;
            height: 48px;
            width: 48px;
            transition: all 0.2s ease-in-out;
          }

          .avatar:hover {
            color: #368b68c9 !important;
          }

          .avatar-sm {
            width: 36px !important;
            height: 36px !important;
            font-size: 0.875rem;
          }
        </style>

        <a href="./functions/logout.php" class="get-started-btn">
          <i class="fa fa-sign-out-alt pe-1"></i> Log out
        </a>
        <!-- <img class="avatar avatar-sm me-3" src="uploads/user.svg" alt=""> -->
        <a href="./profile.php" class="avatar avatar-sm me-3">
          <i class="fa fa-user" class="avatar avatar-sm me-3"></i>
        </a>
      <?php
      } else {
      ?>
        <a href="./login.php" class="get-started-btn">
          <i class="fa fa-sign-in-alt pe-1"></i> Log in
        </a>
        <a href="./profile.php" class="avatar avatar-sm me-3">
          <i class="fa fa-user" class="avatar avatar-sm me-3"></i>
        </a>
      <?php } ?>
    </div>
  </header>
  <!-- End Header -->