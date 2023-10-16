<?php 
session_start();
include("dbcon.php");
function redirct($url,$mess)
{
    $_SESSION['messsage'] = $mess;
    // Redirect the user to the specified URL.
    header('Location: ' . $url);
    exit();
}

function validateAndRenameImage($fileInputName,$dir, $old_img = null, $destinationDirectory = "../../uploads")
{
    if ($_FILES[$fileInputName]['error'] === 0) {
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
            if ($img != "")
            {
                move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $destinationPath);
                if(file_exists($destinationDirectory. $old_img))
                {
                    @unlink($destinationDirectory . $old_img);
                }
                return $image; // Return the renamed image filename        
            }
            else {
                $image = $old_img;
                return $image;
            }

        } else if ($_FILES[$fileInputName]['error'] === 4) {
            $image = "";
            return $image;
        } else {
            $_SESSION['messsage'] = "Error uploading the file.";
            header("Location: $dir");
            die();
        }
    }
    else if ($_FILES[$fileInputName]['error'] === 4)
    {
        if($old_img !==null)
        {
            return $old_img;
        }
        else{
            $image = '';
            return $image;
        }
        
    } else
    {
        $_SESSION['messsage'] = "Error uploading the file." . $_FILES[$fileInputName]['error'];
        header("Location: $dir");
        die();
    }
}
if(isset($_POST['singoutbtn']))
{
    if(isset($_SESSION['auth']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['messsage'] = "Logged out Successfully";
    }
    header('Location: ../../index.php');
}
else if(isset($_POST['AddCategory']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = validateAndRenameImage('img',"../AddCategory.php");
    if($image == "")
    {
        $image = "category.png";
    }
    
    if(file_exists("../../uploads"))
    {
        //$AddCat = query("INSERT INTO Category (name,slug,description,status,popular,img) VALUES('$name','$slug','$description','$status','$popular','$image')");
        $stmt = conn->prepare("INSERT INTO category(name,description,slug,status,popular,img) VALUES(:name,:description,:slug,:status,:popular,:img)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':slug', $slug);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':popular', $popular);
        $stmt->bindValue(':img', $image);
        $stmt->execute();
        // move_uploaded_file($_FILES['img']['tmp_name'],$path.'/'.$image);    
        redirct("../AddCategory.php","THe Category is added Successfully");
    }
}
else if(isset($_POST['EditCategory']))
{
    $cat_id = $_POST['cat_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $old_img = $_POST['old_img'];
    $update_img = validateAndRenameImage('img',"../EditCategory.php",$old_img);
    // header("Location: ../EditCategory.php?id=$cat_id");
    $stmt = conn->prepare("UPDATE category SET name = :name ,slug = :slug, description = :description,status= :status,popular= :popular,img = :update_img where id = :cat_id ");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':slug', $slug);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':popular', $popular);
    $stmt->bindValue(':update_img', $update_img);
    $stmt->bindValue(':cat_id', $cat_id);
    $stmt->execute();
    redirct("../tables.php","Updated product Successfully");
}
else if(isset($_POST['delete_category']))
{
    $category_id = $_POST['cat_id'];
    
    $fetch = qselect("category","id",$category_id);
    $exist_img = $fetch['img'];
    query("DELETE FROM category WHERE id = '$category_id';");
    if($exist_img != "category.png")
    {
        if(file_exists("../../uploads/".$exist_img))
        {
            @unlink("../../uploads/".$exist_img);
        }
        header("../tables.php");
    }
    echo 200;
}
else if(isset($_POST['AddProductsbtn']))
{
    $pro_name = trim($_POST['pro_name']);
    $catid = trim($_POST['cat_id']);
    $description = trim($_POST['description']);
    $orginal_price = trim($_POST['orginl_price']);
    $selling_price = trim($_POST['selling_price']);
    $qty = trim($_POST['qty']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    if($catid =='Select one of the Category' || $catid== '')
    {
        $_SESSION['messsage'] = "You must select a category";
        header("Location: ../AddProduct.php");
        die();
    }
    $image  = validateAndRenameImage('img',"../AddProduct.php");
    if($image == "")
    {
        $image = "category.png";
    }
    $simage = validateAndRenameImage('simg',"../AddProduct.php");
    $timage = validateAndRenameImage('timg',"../AddProduct.php");
    $fimage = validateAndRenameImage('fimg',"../AddProduct.php");
    if(file_exists("../../uploads"))
    {
        $stmt = conn->prepare("INSERT INTO products(name,cat_id,description,orginal_price,selling_price,qty,status,trending,img,second_img,third_img,forth_img) VALUES(:pro_name,:cat_id,:description,:orginal_price,:selling_price,:qty,:status,:trending,:img,:second_img,:third_img,:forth_img);");
        $stmt->bindValue(':pro_name', $pro_name);
        $stmt->bindValue(':cat_id', $catid);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':orginal_price', $orginal_price);
        $stmt->bindValue(':selling_price', $selling_price);
        $stmt->bindValue(':qty', $qty);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':trending', $trending);
        $stmt->bindValue(':img', $image);
        $stmt->bindValue(':second_img',$simage);
        $stmt->bindValue(':third_img', $timage);
        $stmt->bindValue(':forth_img', $fimage);
        $stmt->execute();    
        redirct("../AddProduct.php","The Product is added Successfully");
    }
}
else if(isset($_POST['EditProductsbtn']))
{
    $product_id = trim($_POST['product_id']);
    $pro_name = trim($_POST['pro_name']);
    $catid = trim($_POST['cat_id']);
    $description = trim($_POST['description']);
    $orginal_price = trim($_POST['orginl_price']);
    $selling_price = trim($_POST['selling_price']);
    $qty = trim($_POST['qty']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    if($catid =='Select one of the Category' || $catid== '')
    {
        $_SESSION['messsage'] = "You must select a category";
        header("Location: ../EditProduct.php");
        die();
    }
    $old_img = $_POST['old_img'];
    $old_simg = $_POST['old_simg'];
    $old_timg = $_POST['old_timg'];
    $old_fimg = $_POST['old_fimg'];
    
    $update_img = validateAndRenameImage('img',"../EditProduct.php?id=$product_id",$old_img);

    $simage = validateAndRenameImage('simg',"../EditProduct.php?id=$product_id",$old_simg);
    $timage = validateAndRenameImage('timg',"../EditProduct.php?id=$product_id",$old_timg);
    $fimage = validateAndRenameImage('fimg',"../EditProduct.php?id=$product_id",$old_fimg);
    if(file_exists("../../uploads"))
    {
        $stmt = conn->prepare("UPDATE products SET name = :pro_name,cat_id = :cat_id,description = :description,orginal_price = :orginal_price,selling_price = :selling_price,qty = :qty,status = :status,trending = :trending,img = :img,second_img = :simg,third_img = :timg,forth_img = :fimg WHERE id = :product_id");
        $stmt->bindValue(':pro_name', $pro_name);
        $stmt->bindValue(':cat_id', $catid);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':orginal_price', $orginal_price);
        $stmt->bindValue(':selling_price', $selling_price);
        $stmt->bindValue(':qty', $qty);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':trending', $trending);
        $stmt->bindValue(':img', $update_img);
        $stmt->bindValue(':simg', $simage);
        $stmt->bindValue(':timg', $timage);
        $stmt->bindValue(':fimg', $fimage);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->execute();
        redirct("../tables.php","The Product is updateed Successfully");
    } 
}
else if(isset($_POST['delete_product']))
{
    $pro_id = $_POST['pro_id'];
    $fetch = qselect("products","id",$pro_id);

    $img = $fetch['img'];
    $simg = $fetch['second_img'];
    $timg = $fetch['third_img'];
    $fimg = $fetch['forth_img'];
    query("DELETE FROM products WHERE id = '$pro_id';");
    if($img != "category.png")
    {
        if(file_exists("../../uploads/".$img))
        {
           try{
            // I used The @ to avoid the warrninig message which happend due to the file(img) not exsit in file and result it to not success the task;
            if (file_exists("../../uploads/".$img)) {
                @unlink("../../uploads/".$img); // Use @ to suppress the warning
            }

            if (file_exists("../../uploads/".$simg)) {
                @unlink("../../uploads/".$simg); // Use @ to suppress the warning
            }

            if (file_exists("../../uploads/".$timg)) {
                @unlink("../../uploads/".$timg); // Use @ to suppress the warning
            }
            if (file_exists("../../uploads/".$fimg)) {
                @unlink("../../uploads/".$fimg); // Use @ to suppress the warning
            }
           }
           catch(Exception){}
        }
        header("../tables.php");
    }
    else{
            if (file_exists("../../uploads/".$simg)) {
                @unlink("../../uploads/".$simg); // Use @ to suppress the warning
            }

            if (file_exists("../../uploads/".$timg)) {
                @unlink("../../uploads/".$timg); // Use @ to suppress the warning
            }
            if (file_exists("../../uploads/".$fimg)) {
                @unlink("../../uploads/".$fimg); // Use @ to suppress the warning
            }
    }
    echo 200;
}
else if(isset($_POST['edituser']))
{
    $id = $_POST['user_id'];
    $active = $_POST['active'];
    $role = $_POST['rolo_id'];
    $stmt = conn->prepare("UPDATE users set active = :active,role_id=:role where id = :id");
    $stmt->bindValue(':active', $active);
    $stmt->bindValue(':role', $role);
    $stmt->bindValue(':id', $id);
    $result = $stmt->execute();
    if($result)
    {
        $_SESSION['messsage'] = "The user is updated";
        echo 200;
    }
    else{
        echo 300;
    }
}
else if(isset($_POST['setcookie']))
{
    $color = $_POST['color'];
    // Set the color into a cookie (you can adjust the expiration time as needed)
    setcookie('selected_color', $color, time() + (365 * 24 * 60 * 60), '/');

    // Send a response back to the JavaScript
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Color not provided']);
}

//


if(isset($_POST['EditOrder']))
{
    $status = $_POST['status'];
    $tracking_mode = $_POST['tracking_mode'];
    $order_id = $_POST['order_id'];
    echo $status;
    echo $tracking_mode;
    echo $order_id;
    $stmt = conn->prepare("UPDATE orders set status = :status,tracking_mode=:tracking_mode where id = :id");
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':tracking_mode', $tracking_mode);
    $stmt->bindValue(':id', $order_id);
    $result = $stmt->execute();
    if($result)
    {
        redirct('../index.php', "The Order has been Saved");
    }
}
?>