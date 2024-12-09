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
<style>
  .main-content{
    margin-top:60px;

  }
</style>

    <!-- Content Starts Here -->
    <div class="main-content">
        <!-- Add User Button -->
        <div class="text-end mb-3">
          <h1 class="text-center mt-5">Manage Products</h1>

          <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addProductModal"
          >
            Add Product
          </button>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="productList">
          <?php
          $sql = "SELECT Products.*, categories.name AS category_name FROM Products INNER JOIN categories ON Products.category=categories.category_id ORDER BY product_id ASC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['product_id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['category_name']}</td>
                          <td>\${$row['price']}</td>
                          <td>{$row['stock']}</td>
                          <td>
                              <button class='btn btn-warning btn-sm editproduct' data-bs-toggle='modal' data-bs-target='#editProductModal' data-product-id='{$row['product_id']}'>Edit</button>
                              <button class='btn btn-danger btn-sm deleteproduct' data-bs-toggle='modal' data-bs-target='#deleteProductModal' data-product-id='{$row['product_id']}'>Delete</button>
                          </td>
                      </tr>";
              }
          } else {
              echo "<tr><td colspan='6'>No products found</td></tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
      

      <!-- Add Product Modal -->
      <div
        class="modal fade"
        id="addProductModal"
        tabindex="-1"
        aria-labelledby="addProductModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <!-- Add User Form -->
              <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="productName" class="form-label">Product Name</label>
                  <input type="text" name="productName" class="form-control" placeholder="Enter product name" required/>
                </div>
                <div class="mb-3">
                  <label for="productCategory" class="form-label">Category</label>
                  <select name="productCategory" class="form-select">
                    <option value="">Select Category</option>
<?php 
$sqlcategory = "SELECT * FROM categories ORDER BY name ASC";
$resultcategory = $conn->query($sqlcategory);
if ($resultcategory->num_rows > 0) {
    while ($rowcategory = $resultcategory->fetch_assoc()) {
?>
            <option value="<?=$rowcategory['category_id']?>"><?=$rowcategory['name']?></option>
<?php 
    }
}
?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="productPrice" class="form-label">Price</label>
                  <input type="number" name="productPrice" class="form-control" placeholder="Enter product price" required/>
                </div>
                <div class="mb-3">
                  <label for="productStock" class="form-label">Stock</label>
                  <input type="number" name="productStock" class="form-control" placeholder="Enter product stock" required/>
                </div>
                <div class="mb-3">
                  <label for="productImage" class="form-label">Image</label>
                  <input type="file" name="productImage" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="productDescription" class="form-label">Description</label>
                  <textarea name="productDescription" class="form-control"></textarea>
                </div>
                <button type="submit" name="addproduct" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Edit Product Modal -->
      <div
        class="modal fade"
        id="editProductModal"
        tabindex="-1"
        aria-labelledby="editProductModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <!-- Add User Form -->
              <form action="edit_product.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="productId" id="productId">
                <input type="hidden" name="image_url" id="productImage">
                <div class="mb-3">
                  <label for="productName" class="form-label">Product Name</label>
                  <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter product name" required/>
                </div>
                <div class="mb-3">
                  <label for="productCategory" id="productCategory" class="form-label">Category</label>
                  <select name="productCategory" class="form-select">
                    <option value="">Select Category</option>
<?php 
$sqlcategory = "SELECT * FROM categories ORDER BY name ASC";
$resultcategory = $conn->query($sqlcategory);
if ($resultcategory->num_rows > 0) {
    while ($rowcategory = $resultcategory->fetch_assoc()) {
?>
            <option value="<?=$rowcategory['category_id']?>"><?=$rowcategory['name']?></option>
<?php 
    }
}
?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="productPrice" class="form-label">Price</label>
                  <input type="number" name="productPrice" id="productPrice" class="form-control" placeholder="Enter product price" required/>
                </div>
                <div class="mb-3">
                  <label for="productStock" class="form-label">Stock</label>
                  <input type="number" name="productStock" id="productStock" class="form-control" placeholder="Enter product stock" required/>
                </div>
                <div class="mb-3">
                  <label for="productImage" class="form-label">Image</label>
                  <input type="file" name="productImage" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="productDescription" class="form-label">Description</label>
                  <textarea name="productDescription" id="productDescription" class="form-control"></textarea>
                </div>
                <button type="submit" name="updateproduct" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Product Modal -->
      <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <!-- Add Product Form -->
              <form action="delete_product.php" method="POST">
                <div class="mb-3">
                  <label class="form-label">Are you sure?</label>
                </div>
                <input type="hidden" name="deleteproductid" id="deleteproductid">
                <button type="submit" name="deleteproduct" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>

<?php 
include("footer-admin.php");
?>

<script>
  $(document).ready(function(){
    $(".editproduct").click(function(){
      var productId = $(this).data('product-id');
      $.ajax({
          url : "get_product_details.php",
          type: "POST",
          data : { 'productid':productId },
          dataType: "json",
          success: function(data)
          {
              $("#productName").val(data.name);
              $("#productPrice").val(data.price);
              $("#productStock").val(data.stock);
              $("#productCategory").val(data.category);
              $("#productImage").val(data.image_url);
              $("#productDescription").val(data.description);
              $("#productId").val(data.product_id);
          }
      });
    })

    $(".deleteproduct").click(function(){
      var productId = $(this).data('product-id');
      $("#deleteproductid").val(productId);
    });
  })
</script>
