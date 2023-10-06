<?php

// $key = bin2hex(random_bytes(32));
$key = "91da54310d2cb91d96ed9412123daa74e8901b93df2300e160307273c7b7b147";


function re_direct($url, $icon, $msg)
{
    if ($msg != "") {
        $_SESSION['message'] = $msg;
    }
    if ($icon != "") {
        $_SESSION['icon'] = $icon;
    }

    header("Location:" . $url);
}


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

function getIntValue($s)
{
    if (!is_numeric($s))
        return false;
    return (int)$s;
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

function check_decryption($enteredPassword, $hashedPassword)
{
    return password_verify($enteredPassword, $hashedPassword);
}

function concat_str(...$args)
{
    return implode("", $args);
}
