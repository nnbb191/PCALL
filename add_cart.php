<?php 
include "connect.php";
if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
  exit;
}
if (isset($_GET['pid'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['pid'];
    $quantity = 1;

    // Check if product already exists in the cart
    $sql = "SELECT * FROM Cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update quantity
        $sql = "UPDATE Cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
    } else {
        // Insert new record
        $sql = "INSERT INTO Cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    }

    if ($stmt->execute()) {
        header("Location: cart.php");
    } else {
        $_SESSION['error'] = "Error adding to cart.";
        header('location:index.php');
        exit;
    }
}
?>