<?php
// Include database connection
include "connect.php";

// Start session
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location:index.php');
    exit;
}

// Check if the cart_id is passed and remove the item
if (isset($_GET['cart_id'])) {
    $cart_id = $_GET['cart_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $cart_id, $_SESSION['user_id']);
    
    if ($stmt->execute()) {
        // Redirect back to the cart page after removing the item
        $_SESSION['message'] = "Item removed successfully!";
    } else {
        $_SESSION['error'] = "Failed to remove the item.";
    }
    
    $stmt->close();
} else {
    $_SESSION['error'] = "No item selected for removal.";
}

// Redirect to the cart page
header('Location: cart.php');
exit;
?>
