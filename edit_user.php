<?php 
include "connect.php";

if (isset($_POST['updateuser'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $phone = $_POST['userphone'];
    $address = $_POST['useraddress'];
    $city = $_POST['usercity'];
    $role = $_POST['userrole'];
    $userId = $_POST['userid'];

    $sql = "UPDATE Users SET 
            name='$name', email='$email', phone='$phone', 
            address='$address', city='$city', role='$role' 
            WHERE user_id=$userId";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "User updated successfully";
        header("Location: manage_users.php");
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }
}
?>