<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
  <?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
?>


    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PcAll</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/dist/css/Style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
      integrity="sha384-+6po9g+eAXQkzD6cs6xEZ6gzYgWbA7O9B4lA87J1eMTM1Dvs0fFZ/60Pbmj9WlbV"
      crossorigin="anonymous"
    />
    <link rel="manifest" href="manifest.json">
    <script>
  if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('sw.js')
    .then((registration) => {
      console.log('Service Worker registered with scope:', registration.scope);
    })
    .catch((error) => {
      console.log('Service Worker registration failed:', error);
    });
}
</script>
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  </head>

  <body>  
<!-- Primary Container -->
<div class="container-fluid">
<!-- Navbar -->
<nav class="navbar primary-navbar border navbar-expand-lg fixed-top rounded-bottom bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img
        src="../images/logoco2.png"
        alt="Logo"
        width="200"
        height="60"
        class="d-inline-block align-text-top"
      />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav mx-5">
        <li class="nav-item mx-3">
          <a class="nav-link primary-hover" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link primary-hover" href="products.php">Products</a>
        </li>
      
        <li class="nav-item mx-1">
          <a class="nav-link primary-hover" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <form class="d-flex" action="products.php" method="post" role="search">
            <input class="form-control me-1 mx-5" type="search" name="search" placeholder="Search" aria-label="Search"/>
            <button class="btn btn-outline-dark border-1" type="submit">Search</button>
          </form>
        </li>
      </ul>
      <!-- Profile and Cart Icons -->
<?php
$totalCartProducts = 0; 
if (isset($_SESSION['user_id'])) {
  $sql = "SELECT COUNT(*) AS cart_products FROM cart WHERE user_id='".$_SESSION['user_id']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $totalCartProducts = $row['cart_products'];
  }
}
?>
      <div class="d-flex align-items-center border-0">
      <!-- Backend: Generate cart count dynamically -->
      <button
  type="button"
  class="btn btn-outline-dark me-2 fs-3 border-0"
  id="cart-button"
>
  <i class="bi bi-cart"></i>
  <span class="badge bg-light text-dark"><?=$totalCartProducts?></span>
</button>
<script>
  document.getElementById('cart-button').addEventListener('click', function () {
    <?php if (isset($_SESSION['user_id'])): ?>
      // User is logged in, redirect to the cart page
      window.location.href = 'cart.php';
    <?php else: ?>
      // User is not logged in, trigger the modal
      const modal = new bootstrap.Modal(document.getElementById('profileModal'));
      modal.show();
    <?php endif; ?>
  });
</script>
        <!-- Profile Icon triggers modal -->
<?php 
if (isset($_SESSION['user_id'])) {
?>
        <a href="logout.php" class="btn btn-outline-dark">Logout</a>
<?php
} else {
?>
        <button type="button" class="btn btn-outline-dark fs-3 border-0" data-bs-toggle="modal" data-bs-target="#profileModal">
          <i class="bi bi-person"></i>
        </button>
<?php
}
?> 
      </div>
    </div>
  </div>
</nav>

