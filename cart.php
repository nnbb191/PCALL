<?php 
include "connect.php";
include "header.php";
include "modal.php";
if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
  exit;
}

?>
    <!-- Cart Section -->
    <div class="container-fluid my-5 mt-5 pt-5">
      <h1 class="text-center mb-4">Your Cart</h1>
      <div class="row">
        <div class="col-12">
          <!-- Cart Items -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="cartItems">
<?php
$total = 0; 
$sql = "SELECT * FROM cart INNER JOIN products ON cart.product_id=products.product_id WHERE user_id='".$_SESSION['user_id']."' ORDER BY cart_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $total += $row['price']*$row['quantity'];
?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="<?=$row['image_url']?>" alt="<?=$row['name']?>" width="60" class="me-3">
                      <p><?=$row['name']?></p>
                    </div>
                  </td>
                  <td>$<?=$row['price']?></td>
                  <td>
                    <input type="number" class="form-control w-50" value="<?=$row['quantity']?>" min="1" onchange="updateQuantity(<?=$row['quantity']?>)">
                  </td>
                  <td>$<?=$row['price']*$row['quantity']?></td>
                  <td>
                  <a href="removeitem.php?cart_id=<?=$row['cart_id']?>" class="btn btn-danger btn-sm">Remove</a>
 
                  </td>
                </tr>
<?php 
    }
}
?>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-between align-items-center mt-4">
            <h4 id="cartTotal">Total: $<?=$total?></h4>
            <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
          </div>
        </div>
      </div>
    </div>
<?php 
include("footer.php");
?>


