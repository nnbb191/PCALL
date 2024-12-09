<?php 
include "connect.php";
include "header.php";
include "modal.php";

$productId = $_GET["pid"];
$sql = "SELECT * FROM Products WHERE product_id='".$productId."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

    <!-- Product Details Section -->
    <div class="container mt-5">
      <div class="row">
    <!-- PHP: Fetch and display product details dynamically -->

        <!-- Product Image -->
        <div class="col-md-6 mt-5">
          <img
            src="<?=$row['image_url']?>"
            class="img-fluid rounded"
            alt="<?=$row['name']?>"/>
        </div>

        <!-- Product Info -->
        <div class="col-md-6 mt-5">
          <h1 class="display-5"><?=$row['name']?></h1>
          <p class="text-muted">Category: Gaming Laptops</p>
          <h3 class="text-success">$<?=$row['price']?></h3>
          <p class="mt-4">
            <?=$row['description']?>
          </p>
          <div class="d-flex align-items-center mt-4">
            <a href="add_cart.php?pid=<?=$row['product_id']?>" class="btn btn-primary"
              >Add to Cart</a>
          </div>
        </div>
      </div>
    </div>

<?php
}

include("footer.php");
?>
