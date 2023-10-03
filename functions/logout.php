<?php
session_start();
unset($_SESSION['auth']);

require_once("code.php");
re_direct("../index.php", "success", "Logging out...");
session_destroy();
