<?php
session_start();
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

if (isset($_GET['login'])) {
    $login = $_GET['login'];
    if (!$login) {
        re_direct("../login.php", "warning", "You need to login first");
        die();
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $conditions = array(
            array("Student_id" => ["=", $id]),
            array("Course_id" => ["=", $_GET["course_id"]])
        );

        $enrolled_courses = select("enrolled_courses", $conditions);

        if (count($enrolled_courses)) {
            re_direct("../courses.php", "info", "You are enrolled in this course");
            die();
        }

        $courses = select("courses", array(
            array("ID", ["=", $_GET["course_id"]]),
        ))[0];


        $data = [
            "Student_id" => $id,
            "Course_id" => $_GET["course_id"],
        ];
        $results = add("enrolled_courses", ...array_flatten($data));
        if ($results) {
            re_direct("../courses.php", "success", "Course enrolled successfully");
            die();
        } else {
            re_direct("../courses.php", "error", "Course does not enrolled!");
            die();
        }
    } else {
        re_direct("../login.php", "warning", "You need to login first");
        die();
    }
}
