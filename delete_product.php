<?php 
include "connect.php";

if (isset($_POST['deleteproduct'])) {
    $productId = $_POST['deleteproductid'];
    $sql = "DELETE FROM products WHERE product_id=$productId";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Product deleted successfully";
        header("Location: manage_product.php");
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }
}
?>