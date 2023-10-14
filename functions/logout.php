<?php
session_start();
require_once("code.php");
if (isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['messsage'] = "Logged out Successfully";
}
re_direct("../index.php", "success", "Logging out...");


session_destroy();
