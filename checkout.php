<?php 
include "connect.php";
include "header.php";
include "modal.php";
if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
  exit;
}

$sql = "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
    $city = $row['city'];
    $phone = $row['phone'];
}
?>

    <!-- Checkout Section -->
    <div class="container-fluid my-5">

      <div class="row">
        <h1 class="text-center mb-4 mt-5 ">Checkout</h1>
        <!-- Billing Details -->
        <div class="col-md-6">
          <h3>Billing Details</h3>
          <form action="process_checkout.php" method="POST">
            <!-- PHP: Ensure proper validation for the submitted form data -->
            <div class="mb-3">
              <label for="fullName" class="form-label">Full Name</label>
              <input
                type="text"
                class="form-control"
                id="fullName"
                name="fullName"
                placeholder="Enter your full name"
                required
                value="<?=$name?>"
              />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email"
                required
                value="<?=$email?>"
              />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input
                type="text"
                class="form-control"
                id="address"
                name="address"
                placeholder="Enter your address"
                required
                value="<?=$address?>"
              />
            </div>
            <div class="mb-3">
              <label for="city" class="form-label">City</label>
              <input
                type="text"
                class="form-control"
                id="city"
                name="city"
                placeholder="Enter your city"
                required
                value="<?=$city?>"
              />
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input
                type="text"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="Enter your phone number"
                required
                value="<?=$phone?>"
              />
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-6 ">
          <h3>Order Summary</h3>
          <ul class="list-group mb-4">
            <!-- PHP: Loop through cart items from session or database -->
<?php
$total = 0; 
$sql = "SELECT * FROM cart INNER JOIN products ON cart.product_id=products.product_id WHERE user_id='".$_SESSION['user_id']."' ORDER BY cart_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $total += $row['price']*$row['quantity'];
?>   
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <img src="<?=$row['image_url']?>" alt="<?=$row['name']?>" width="60" class="me-3">
              <p><?=$row['name']?></p>
              <span>$<?=$row['price']*$row['quantity']?></span>
            </li>
<?php 
    }
}
?>        
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Total</strong>
              <span><strong>$<?=$total?></strong></span>
            </li>
          </ul>
          <button  type="submit" name="placeorder" class="btn btn-primary w-100">Place Order</button>
        </div>
        </form>
      </div>
    </div>

<?php 
include("footer.php");
?>
