<?php
include "connect.php";

if (isset($_POST['login'])) {
    $email = $_POST['signInEmail'];
    $password = $_POST['signInPassword'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Store user session data
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 1) {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
        } else {
            $_SESSION['error'] = "Invalid password.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = "No user found with that email.";
        header("Location: login.php");
    }
    $stmt->close();
    $conn->close();
}
?>
