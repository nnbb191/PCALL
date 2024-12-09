<?php 
include "connect.php";
include "header.php";
include "header-admin.php";

if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
  exit;
} else {
  if ($_SESSION['role'] == 2) {
    header('location:index.php');
    exit;
  }
}
?> 
  <div class="main-content">
    <div class="welcome-card">
      <h1>Welcome to Admin Dashboard</h1>
      <p>Use the sidebar to navigate through admin functionalities.</p>
    </div>
  </div>

<?php 




?>


 