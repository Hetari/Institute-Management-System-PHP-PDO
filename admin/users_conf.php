<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

$first_name = $last_name = $phone = $username = $email = $gender = $password = $password_confirmation = $active = $role  = "";
$errors = array();

if (isset($_POST["add-user-btn"])) {
    $requiredRegisterFields = [
        "fname" => "first_name",
        "lname" => "last_name",
        "phone" => "phone",
        "username" => "username",
        "email" => "email",
        "gender" => "gender",
        "role" => "role",
        "password" => "password",
        "conPassword" => "password_confirmation",
    ];


    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field is required!";
        } elseif (!ctype_alpha($_POST[$field])) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " must only contain alphabetic characters";
        }
    }

    $active = isset($_POST["active"]) ? '1' : '0';

    if (!empty($errors)) {
        re_direct("users.php", "error", "Error: " . implode(", ", $errors));
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }

    $name = ucwords(concat_str(strtolower($first_name), " ", strtolower($last_name)));
    $password = password_hash($password, PASSWORD_DEFAULT);

    if (!$password === $password_confirmation) {
        re_direct("users.php", "warning", "Passwords doesn't match!");
        die();
    }

    $data = [
        "Name" => $name,
        "Username" => $username,
        "Email" => $email,
        "Phone" => $phone,
        "Password" => $password,
        "Gender" => $gender,
        "Is_active" => $active,
        "Role_id" => $role,
        "Gender" => $gender
    ];

    $results = add("users", ...array_flatten($data));

    if ($results) {
        re_direct("users.php", "success", "Add new record successfully");
        die();
    } else {
        re_direct("users.php", "error", "There was an error");
        die();
    }
} else if (isset($_POST["update-user-btn"])) {
    $requiredRegisterFields = [
        "fname" => "first_name",
        "lname" => "last_name",
        "phone" => "phone",
        "username" => "username",
        "email" => "email",
        "gender" => "gender",
        "role" => "role",
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field is required!";
        } elseif (strpos($_POST[$field], ' ') !== false) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " should not contain spaces";
        }
    }

    $active = isset($_POST["active"]) ? '1' : '0';

    if (!empty($errors)) {
        re_direct("update users.php", "error", "Error: " . implode(", ", $errors));
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }

    $name = ucwords(concat_str(strtolower($first_name), " ", strtolower($last_name)));
    $password = password_hash($password, PASSWORD_DEFAULT);
    $id = $_GET["id"];

    if (!$password === $password_confirmation) {
        re_direct("users.php", "warning", "Passwords doesn't match!");
        die();
    }

    $data = [
        "Name" => $name,
        "Username" => $username,
        "Email" => $email,
        "Phone" => $phone,
        "Gender" => $gender,
        "Is_active" => $active,
        "Role_id" => $role,
        "Gender" => $gender
    ];

    $results = update("users", $data, $id);

    if ($results) {
        re_direct("users.php", "success", "Update record successfully");
        die();
    } else {
        re_direct("users.php", "error", "Update record unsuccessfully");
        die();
    }
}
