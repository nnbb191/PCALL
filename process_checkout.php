<?php 
include "connect.php";

if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
  exit;
}

if (isset($_POST['placeorder'])) {
    $userId = $_SESSION['user_id'];
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO orders (user_id, name, email, address, city, phone) 
                    VALUES ('$userId', '$name', '$email', '$address', '$city', '$phone')";
    if ($conn->query($sql) === TRUE) {
        $orderId = $conn->insert_id;
        
        $sql = "SELECT * FROM cart INNER JOIN products ON cart.product_id=products.product_id WHERE user_id='".$_SESSION['user_id']."' ORDER BY cart_id ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productId = $row['product_id'];
                $quantity = $row['quantity'];
                $price = $row['price'];

                $sqlOrderItem = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                    VALUES ('$orderId', '$productId', '$quantity', '$price')";
                $conn->query($sqlOrderItem);

                $sqlDeleteCart = "DELETE FROM cart WHERE user_id='".$userId."'";
                $conn->query($sqlDeleteCart);
            }
        }
        $_SESSION['success'] = "Order created successfully.";
        header("Location: index.php");
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }

}
?>