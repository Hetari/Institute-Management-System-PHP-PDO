<?php
session_start();
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$name = $fees = $subject_id = $description = "";
$errors = array();
if (isset($_POST["add-course-btn"])) {
    $subject_id = $_POST['hidden'];

    $requiredRegisterFields = [
        "name" => "name",
        "fees" => "fees",
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field";
        } elseif (strtolower($field) == "fees") {
            continue;
        } elseif (!ctype_alpha($_POST[$field])) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " must only contain alphabetic characters";
        }
    }

    if (!empty($errors)) {
        re_direct("courses.php", "error", "Error: " . implode(", ", $errors) . " fields is required!");
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }
    $description = validate($_POST["note"]);
    $subject_id = validate($subject_id);

    $data = [
        "Name" => $name,
        "Description" => $description ? $description : null,
        "Fees" => $fees,
        "Subject_id" => $subject_id
    ];

    $results = add("courses", ...array_flatten($data));

    if ($results) {
        re_direct("courses.php", "success", "Add new record successfully");
        die();
    } else {
        re_direct("courses.php", "error", "Chose a subject please!");
        die();
    }
} elseif (isset($_POST["update-course-btn"])) {
    $id = $_GET["id"];
    $subject_id = $_POST['hidden'];

    $requiredRegisterFields = [
        "name" => "name",
        "fees" => "fees",
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field is required!";
        } elseif (strtolower($field) == "fees") {
            continue;
        } elseif (!ctype_alpha($_POST[$field])) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " must only contain alphabetic characters";
        }
    }
    echo "id: {$id}";
    echo "<pre>";
    print_r($errors);
    echo "</pre>";

    // if (!empty($errors)) {
    //     re_direct("courses.php", "error", "Error: " . implode(", ", $errors));
    //     die();
    // }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }
    $description = validate($_POST["note"]);
    $subject_id = validate($subject_id);

    $data = [
        "Name" => $name,
        "Description" => $description ? $description : null,
        "Fees" => $fees,
        "Subject_id" => $subject_id
    ];

    $results = update("courses", $data, $id);
    echo $results ? "YES" : "NO";
    // if ($results) {
    //     re_direct("courses.php", "success", "Update new record successfully");
    //     die();
    // } else {
    //     re_direct("courses.php", "error", "Chose a subject please!");
    //     die();
    // }
} else if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        $id = encrypt_machine("decrypt", $_GET['id']);
        $deleted = delete("courses", $id);
        if ($deleted) {
            re_direct("courses.php", "success", "The record deleted successfully");
            die();
        }
        re_direct("courses.php", "error", "The record is not deleted");
        die();
    }
}
