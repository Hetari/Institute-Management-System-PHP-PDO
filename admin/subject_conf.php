<?php
session_start();
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

if ($_GET['action'] == "delete") {
    $id = encrypt_machine("decrypt", $_GET['id']);

    $deleted = delete("subjects", $id);
    re_direct("subjects.php", "success", "The record deleted successfully");
    die();
}
