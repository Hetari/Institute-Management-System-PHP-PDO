j<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

session_start();
echo "<h1>I'm in `users_conf.php` file</h1>";
if(isset($_POST['add-user-btn']))
{

validateAndRenameImage("image", "users_conf.php");
}
?>
