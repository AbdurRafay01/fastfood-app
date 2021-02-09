<?php
include_once "../database.php";
// include "../../product_images/demo.php"; for using with images path
session_start();
$product_id = $_POST['product_id'];
$itemname = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$category = $_POST['category'];
// $image_path = $_POST['product_img'];
// echo $product_id;
// echo $itemname;
// echo $quantity;
// echo $price;
// echo $category;


if (isset($_POST['loginsubmit'])) {
    # code...
if (($_FILES['product_img']['name']!="")){
    $image_path = $_FILES['product_img']['name'];
        
        $target_dir = "../../product_images/";
        
        $file = $_FILES['product_img']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['product_img']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        
    if (file_exists($path_filename_ext)) {
        ?>
            <!-- <div class="alert alert-danger" role="alert">
                File already uploaded!!
            </div> -->
            <script>alert("Error: File Already Uploaded!!");</script>
        <?php
        }else{

        
        move_uploaded_file($temp_name,$path_filename_ext);


        $sql = "
        INSERT INTO `products`(`ProductId`, `Name`, `Quantity`, `Price`, `Category`, `img_path`) 
        VALUES ('$product_id', '$itemname', '$quantity', '$price', '$category', '$image_path')
    ";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        # code...
        // echo "qurery" . mysqli_affected_rows($conn);
        $_SESSION["affected_row"] = mysqli_affected_rows($conn);
        header("Location: ../fastfood.php");
    }
    else {
        # code...    
        echo "qurery failed due to error" . mysqli_error($conn);
    
    }



        }
    }
}


?>