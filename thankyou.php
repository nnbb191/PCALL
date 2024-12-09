<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container text-center my-5">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been successfully placed.</p>
        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>
</body>
</html>
