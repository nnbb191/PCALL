<?php
include "connect.php";
if (isset($_POST['addproduct'])) {
    $name = $_POST['productName'];
    $description = $_POST['productDescription'];
    $price = $_POST['productPrice'];
    $stock = $_POST['productStock'];
    $category = $_POST['productCategory'];
    $image = $_FILES['productImage'];

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

    // Check if $uploadOk is set to 0
    if ($uploadOk == 0) {
        $_SESSION['error'] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Save product data with image path
            $sql = "INSERT INTO Products (name, description, price, stock, category, image_url) 
                    VALUES ('$name', '$description', '$price', '$stock', '$category', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = "Product added successfully.";
                header("Location: manage_product.php");
            } else {
                $_SESSION['error'] = "Error: " . $conn->error;
            }
        } else {
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        }
    }
}
?>