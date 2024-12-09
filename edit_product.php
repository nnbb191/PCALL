<?php
include "connect.php";
if (isset($_POST['updateproduct'])) {
    $id = $_POST['productId'];
    $name = $_POST['productName'];
    $description = $_POST['productDescription'];
    $price = $_POST['productPrice'];
    $stock = $_POST['productStock'];
    $category = $_POST['productCategory'];
    $image = $_FILES['productImage'];

        // Handle file upload if a new image is provided
        $image_url = $_POST['image_url'];
        if (!empty($image['name'])) {
            // File upload logic
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image["name"]);
            $uploadOk = 1;

            // Check if file is an actual image
            $check = getimagesize($image["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($image["size"] > 500000) {
                $_SESSION['error'] = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow specific file formats
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $_SESSION['error'] = "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                    $image_url = $target_file;
                }
            }
        }

        $sql = "UPDATE Products SET 
                name='$name', description='$description', price='$price', 
                stock='$stock', category='$category', image_url='$image_url' 
                WHERE product_id=$id";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Product updated successfully.";
            header("Location: manage_product.php");
        } else {
            $_SESSION['error'] = "Error: " . $conn->error;
        }
}
?>