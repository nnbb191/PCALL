<?php 
include "connect.php";

if (isset($_POST['adduser'])) {
  $name = $_POST['username'];
  $email = $_POST['useremail'];
  $password = password_hash($_POST['userpassword'], PASSWORD_BCRYPT);
  $phone = $_POST['userphone'];
  $address = $_POST['useraddress'];
  $city = $_POST['usercity'];
  $role = $_POST['userrole'];

  $sql = "INSERT INTO Users (name, email, password, phone, address, city, role) 
          VALUES ('$name', '$email', '$password', '$phone', '$address', '$city', '$role')";

  if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = "User added successfully";
      header("Location: manage_users.php");
  } else {
      $_SESSION['error'] = "Error: " . $conn->error;
  }
}
?>