<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Aperture">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMS</title>
    <meta name="description" content="Aperture">

    <style>
        #main-content {
            display: none;
        }
    </style>

    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> -->

    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"> -->

    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" /> -->


    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/select2.min.css">
    <link rel="stylesheet" href="./assets/css/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="./assets/css/password-strength.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.4.2-web/css/all.css" />


    <script src="./assets/js/jquery-3.7.0.min.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script src="./assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="./assets/css/site.css" />
</head>

<body>
    <?php
    require_once("script.php");
    ?>
    <script src="./assets/js/sweetalert2.js"></script>
    <div id="main-content">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="./assets/img/User.svg" alt="User">
                    </span>
                    <div class="text logo-text">
                        <span class="name">Academia</span>
                        <span class="profession">The perect software</span>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right toggle"></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="m-auto">
                        <li class="search-box">
                            <i class='fa-solid fa-magnifying-glass icon'></i>
                            <input type="text" placeholder="Search...">
                        </li>

                        <li>
                            <a href="./users.php" title="Users">
                                <i class="fa-solid fa-users icon"></i>
                                <span class="text nav-text">
                                    Users
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="./subjects.php" title="">
                                <i class="fa-solid fa-chalkboard-teacher icon"></i>
                                <span class="text nav-text">
                                    Subjects
                                </span>
                            </a>
                        </li>

                        <!-- <li>
                        <a title="Classes">
                            <i class="fa-solid fa-chalkboard icon"></i>
                            <span class="text nav-text">
                                Classes
                            </span>
                        </a>
                    </li> -->

                        <li>
                            <a href="./courses.php" title="Courses">
                                <!-- <i class="fa-solid fa-table-columns icon"></i> -->
                                <i class="fa-solid fa-chalkboard icon"></i>

                                <span class="text nav-text">
                                    Courses
                                </span>
                            </a>
                        </li>

                        <!-- <li>Today's
                        <a href="#" title="Students">
                            <i class="fa-solid fa-user-graduate icon"></i>
                            <span class="text nav-text">
                                Students
                            </span>
                        </a>
                    </li> -->

                        <li>
                            <a href="./employees.php" title="Employees">
                                <i class="fa-solid fa-person-half-dress icon"></i>
                                <span class="text nav-text">
                                    Employees
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="./departments.php" title="Departments">
                                <i class="fa-solid fa-building-columns icon"></i>
                                <span class="text nav-text">
                                    Departments
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="./money.php" title="Money">
                                <i class="fa-solid fa-wallet icon"></i>
                                <span class="text nav-text">Money</span>
                            </a>
                        </li>

                        <li>
                            <a href="./timetable.php" title="Time Table">
                                <i class="fa-solid fa-check-double icon"></i>
                                <span class="text nav-text">
                                    Time Table
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="./grades.php" title="Grades">
                                <i class="fa-solid fa-file-circle-question icon"></i>
                                <span class="text nav-text">
                                    Grades
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="./reports.php" title="Reports">
                                <i class="fa-solid fa-print icon"></i>
                                <span class="text nav-text">Reports</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>

                        <li class="mode">
                            <div class="sun-moon">
                                <i class='bx bx-sun icon sun'></i>
                                <i class="fa-solid fa-sun icon sun"></i>
                                <i class="fa-solid fa-moon icon moon"></i>
                            </div>
                            <span class="mode-text text">Light mode</span>

                            <div class="toggle-switch">
                                <span class="switch"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>