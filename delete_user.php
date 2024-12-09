<?php 
include "connect.php";

if (isset($_POST['deleteuserid'])) {
    $userId = $_POST['deleteuserid'];
    $sql = "DELETE FROM Users WHERE user_id=$userId";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "User deleted successfully";
        header("Location: manage_users.php");
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }
}
?>