<?php

function concat_str(...$args)
{
    $result = implode('', $args);
    return $result;
}

// $key = bin2hex(random_bytes(32));
$key = "91da54310d2cb91d96ed9412123daa74e8901b93df2300e160307273c7b7b147";
function re_direct($url, $icon, $msg)
{
    $_SESSION['message'] = $msg;
    $_SESSION['icon'] = $icon;
    header("Location:" . $url);
}

/**
 * Encrypts or decrypts a string using AES-256-CBC encryption method.
 *
 * @param string $action The action to perform. Valid values are 'encrypt' or 'decrypt'.
 * @param string $string The input string to be encrypted or decrypted.
 * @return string|bool The encrypted or decrypted string, or false on failure.
 */
function encrypt_machine($action, $string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Brhoom2002';
    $secret_iv = 'bro_brhoom123';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function validate($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to flatten the associative array
/**
 * Flattens an associative array.
 *
 * @param array $array The array to flatten.
 * @return array The flattened array.
 */
function array_flatten(array $array): array
{
    $result = [];
    foreach ($array as $key => $value) {
        $result[] = $key;
        $result[] = $value;
    }
    return $result;
}

function validate_rename_image($fileInputName, $dir, $old_img = null, $destinationDirectory = "../uploads")
{
    if ($_FILES[$fileInputName]['error'] === 0) {
        return valid_Image($fileInputName, $dir, $old_img, $destinationDirectory);
    } else if ($_FILES[$fileInputName]['error'] === 4) {
        return no_file_error($old_img);
    } else {
        upload_error($fileInputName, $dir);
    }
}

function valid_Image($fileInputName, $dir, $old_img, $destinationDirectory)
{
    $img = $_FILES[$fileInputName]['name'];
    $img_ext = pathinfo($img, PATHINFO_EXTENSION);
    $ext = ['jpg', 'jpeg', 'png', 'svg'];
    if (!in_array($img_ext, $ext)) {
        $_SESSION['messsage'] = "File format not supported.";
        header("Location: $dir");
        die();
    }
    $image = time() . $img;
    $destinationPath = $destinationDirectory . '/' . $image;
    if ($img != "" && $old_img === null) {
        if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $destinationPath)) {
            return $image; // Return the renamed image filename 
        } else {
            $_SESSION['messsage'] = "Error moving the uploaded file.";
            header("Location: $dir");
            die();
        }
    } else if ($old_img !== null) {
        if ($img != "") {
            move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $destinationPath);
            if (file_exists("../../uploads/" . $old_img)) {
                @unlink("../../uploads/" . $old_img);
            }
            return $image; // Return the renamed image filename         
        } else {
            $image = $old_img;
            return $image;
        }
    } else {
        $_SESSION['messsage'] = "Error uploading the file.";
        header("Location: $dir");
        die();
    }
}

function no_file_error($old_img)
{
    if ($old_img !== null) {
        return $old_img;
    } else {
        $image = '';
        return $image;
    }
}

function upload_error($fileInputName, $dir)
{
    $_SESSION['messsage'] = "Error uploading the file." . $_FILES[$fileInputName]['error'];
    header("Location: $dir");
    die();
}
