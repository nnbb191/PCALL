<?php
include "connect.php";

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['signUpEmail'];
    $password = $_POST['signUpPassword'];
    $confirm_password = $_POST['confirmPassword'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: index.php");
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email already exists.";
        header("Location: index.php");
        exit;
    }

    // Insert new user
    $sql = "INSERT INTO users (name, email, password, phone, address, city) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $hashed_password, $phone, $address, $city);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Signup successful! Please login.";
        header("Location: index.php");
    } else {
        $_SESSION['error'] = "Error signing up. Please try again.";
        header("Location: index.php");
    }

    $stmt->close();
    $conn->close();
}
?>
