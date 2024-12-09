<?php 
include "connect.php";

$userId = $_POST['userid'];
$sql = "SELECT * FROM Users WHERE user_id = $userId";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

echo json_encode($user);
?>