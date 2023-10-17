<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['image'];
    echo "<pre>";
    print_r($file);
    echo "</pre>";

    $image_name = $file['name'];
    $image_type = $file['type'];
    $image_tmp = $file['tmp_name'];
    $image_size = $file['size'];
    $image_error = $file['error'];
    echo "Image Name : " . $image_name . "<br>";
    echo "Image Type : " . $image_type . "<br>";
    echo "Image Tmp : " . $image_tmp . "<br>";
    echo "Image Size : " . $image_size . "<br>";
    echo "Image Error : " . $image_error . "<br>";

    $extensions = array('jpg', 'gif', 'png');
    $file4 = explode('.', $image_name);
    $file_extension = strtolower(end($file4));
    echo $file_extension . "<br>";
    $errors = array();
    if ($image_error == 4) {
        echo "<div style='color:red'> Not Upload file  </div>";
    } else {
        if ($image_size > 100000) {
            $errors[] = "<div style='color:red'>size is larger than x </div>";
        }
        if (!in_array($file_extension, $extensions)) {
            $errors[] = "<div style='color:red'>file extensions is Not Vaild</div>";
        }

        if (empty($errors)) {
            if (move_uploaded_file($image_tmp, "uploads/" . $image_name))
                echo "<h1>file uploaded</h1>";
            else
                echo "<h1>file NOT uploaded</h1>";
        } else {
            foreach ($errors as $error) {
                echo $error;
            }
        }
    }
}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image"> <br><br>
    <input type="submit" name="submit">
</form>