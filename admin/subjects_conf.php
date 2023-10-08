<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$name = $shortcut = "";
$errors = array();
if (isset($_POST["add-subject-btn"])) {
    $requiredRegisterFields = [
        "name" => "name",
        "shortcut" => "shortcut"
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field";
        } elseif (!ctype_alpha($_POST[$field])) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " must only contain alphabetic characters";
        }
    }

    if (!empty($errors)) {
        re_direct("subjects.php", "error", "Error: " . implode(", ", $errors) . " fields is required!");
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }

    $shortcut = ucfirst($shortcut);
    $name = ucfirst($name);
    $data = [
        "Name" => $name,
        "Shortcut" => $shortcut
    ];
    $results = add("subjects", ...array_flatten($data));

    if ($results) {
        re_direct("subjects.php", "success", "Add new record successfully");
        die();
    } else {
        re_direct("subjects.php", "error", "There was an error");
        die();
    }
} else if (isset($_POST["update-subject-btn"])) {
    $requiredRegisterFields = [
        "name" => "name",
        "shortcut" => "shortcut"
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field";
        } elseif (strpos($_POST[$field], ' ') !== false) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " should not contain spaces";
        }
    }

    if (!empty($errors)) {
        re_direct("update subjects.php", "error", "Error: " . implode(", ", $errors) . " fields are required!");
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }

    $id = $_GET["id"];
    $shortcut = ucfirst($shortcut);
    $name = ucfirst($name);
    $data = [
        "Name" => $name,
        "Shortcut" => $shortcut
    ];

    $results = update("subjects", $data, $id);

    if ($results) {
        re_direct("subjects.php", "success", "Update record successfully");
        die();
    } else {
        re_direct("subjects.php", "error", "Update record unsuccessfully");
        die();
    }
} else if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        $id = encrypt_machine("decrypt", $_GET['id']);
        $deleted = delete("subjects", $id);
        re_direct("subjects.php", "success", "The record deleted successfully");
        die();
    }
}
