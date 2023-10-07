<?php

session_start();

require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");
$first_name = $last_name = $phone = $username = $email = $gender = $password = $password_confirmation = $active = $role  = "";
$errors = array();

if (isset($_POST["add-course-btn"])) {
}
