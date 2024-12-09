<?php 
include "connect.php";

$productId = $_POST['productid'];
$sql = "SELECT * FROM products WHERE product_id = $productId";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

echo json_encode($product);
?>