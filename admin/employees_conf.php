<?php
require_once("../dbcon/dbconfig.php");
require_once("../functions/code.php");

session_start();
?>

<body>
    <?php
    require_once("includes/script.php");
    ?>
    <script>
        document.getElementById('main-content').style.display = 'block';
    </script>
</body>

<?php
if (isset($_SESSION["auth"])) {
    if ($_SESSION["roleAs"] != 1) {
        re_direct("../index.php", "warning", "You are not the admin");
        die();
    }
} else {
?>
    <script>
        window.location.assign("../index.php")
    </script>
<?php
    die();
}

$salary = $user_id = "";
$errors = array();
if (isset($_POST["add-employee-btn"])) {
    $user_id = $_POST['hidden'];

    $requiredRegisterFields = [
        "salary" => "salary"
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field is required!";
        } elseif (strtolower($field) == "salary") {
            continue;
        } elseif (!ctype_alpha($_POST[$field])) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " must only contain alphabetic characters";
        }
    }

    if (!empty($errors)) {
        re_direct("employees.php", "error", "Error: " . implode(", ", $errors));
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }
    $user_id = validate($user_id);

    $data = [
        "User_id" => $user_id,
        "Salary" => $salary
    ];
    $results = add("employees", ...array_flatten($data));


    if ($results) {
        re_direct("employees.php", "success", "Add new record successfully");
        die();
    } else {
        re_direct("employees.php", "error", "There was an error");
        die();
    }
} else if (isset($_POST["update-employee-btn"])) {
    $requiredRegisterFields = [
        "salary" => "salary"
    ];

    foreach ($requiredRegisterFields as $field => $fieldName) {
        if (empty($_POST[$field])) {
            $errors[$field . "Empty"] = ucfirst($fieldName) . " field is required!";
        } elseif (strtolower($field) == "salary") {
            continue;
        } elseif (!ctype_alpha($_POST[$field])) {
            $errors[$field . "Invalid"] = ucfirst($fieldName) . " must only contain alphabetic characters";
        }
    }

    if (!empty($errors)) {
        re_direct("update employees.php", "error", "Error: " . implode(", ", $errors));
        die();
    }

    foreach ($requiredRegisterFields as $fieldName => $variableName) {
        ${$variableName} = validate($_POST[$fieldName]);
    }

    $id = $_GET["id"];
    $data = [
        "Salary" => $salary
    ];
    $results = update("employees", $data, $id);

    if ($results) {
        re_direct("employees.php", "success", "Update record successfully");
        die();
    } else {
        re_direct("employees.php", "error", "Update record unsuccessfully");
        die();
    }
} else if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        $id = encrypt_machine("decrypt", $_GET['id']);
        $deleted = delete("employees", $id);
        if ($deleted) {
            re_direct("employees.php", "success", "The record deleted successfully");
            die();
        }
        re_direct("employees.php", "error", "The record is not deleted");
        die();
    }
}
