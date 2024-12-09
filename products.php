<?php 
include "connect.php";
include "header.php";
include "modal.php";
?>

<div class="container-fluid">
    <style>
        .container-fluid {
            padding-top: 80px; 
        }
        .sidebar {
            background-color: #f8f9fa;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 100px; 
        }
        .sidebar h1, .sidebar h5 {
            margin-bottom: 20px;
        }
        .btn-group-vertical .btn {
            text-align: left;
            text-transform: capitalize;
        }
        .price-range-container {
            margin-top: 20px;
        }
        .card {
            margin-top: 90px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-title a {
            text-decoration: none;
            color: #000;
            transition: color 0.3s;
        }
        .card-title a:hover {
            color: #007bff;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                margin-bottom: 20px;
            }
        }
    </style>

    <div class="row mb-5">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2 mb-3">
            <form action="products.php" method="post">
                <div class="sidebar">
                    <h3>Filter</h3>
                    <h5>Category:</h5>
                    <ul class="list-unstyled">
                        <div class="btn-group-vertical w-100" role="group" aria-label="Vertical radio toggle button group">
                            <li>
                                <input type="radio" class="btn-check" name="category" id="vbtn-radio-all" autocomplete="off" value="all" checked />
                                <label class="btn btn-outline-dark border-0 w-100" for="vbtn-radio-all">All</label>
                            </li>
                            <?php 
                            $sqlcategory = "SELECT * FROM categories ORDER BY name ASC";
                            $resultcategory = $conn->query($sqlcategory);
                            if ($resultcategory->num_rows > 0) {
                                while ($rowcategory = $resultcategory->fetch_assoc()) {
                                    $check = isset($_POST["category"]) && $_POST["category"] == $rowcategory['category_id'] ? "checked" : "";
                            ?>
                                <li>
                                    <input type="radio" class="btn-check" name="category" id="vbtn-radio-<?=$rowcategory['category_id']?>" autocomplete="off" value="<?=$rowcategory['category_id']?>" <?=$check?> />
                                    <label class="btn btn-outline-dark border-0 w-100" for="vbtn-radio-<?=$rowcategory['category_id']?>"><?=$rowcategory['name']?></label>
                                </li>
                            <?php 
                                }
                            }
                            $rangevalue = isset($_POST["range"]) ? $_POST["range"] : "";
                            ?>   
                        </div>
                    </ul>
                    <div class="price-range-container">
                        <h5>Price Range</h5>
                        <input type="range" class="form-range" id="range" name="range" min="0" max="10000" step="10" value="<?=$rangevalue?>" />
                        <div class="d-flex justify-content-between">
                            <span>$0</span>
                            <span id="curr">$10000</span>
                        </div>
                    </div>
                    <button type="submit" name="applyFilters" id="applyFilters" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <!-- Product Cards -->
        <div class="col-12 col-md-9 col-lg-10 mb-5">
            <div class="row">
                <?php
                // Pagination logic
                $productsPerPage = 8;
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                $page = max($page, 1);
                $offset = ($page - 1) * $productsPerPage;

                $filter = " WHERE stock > 0";
                if (isset($_POST["applyFilters"])) {
                    $range = $_POST['range'];
                    $category = $_POST['category'];
                    $filter .= $category === 'all' ? " AND price BETWEEN 0 AND $range" : " AND category = '$category' AND price BETWEEN 0 AND $range";
                }
                if (isset($_GET['cid']) && !isset($_POST["applyFilters"])) {
                    $filter .= " AND category = '".$_GET['cid']."'";
                }
                if (isset($_POST['search']) && !isset($_POST["applyFilters"])) {
                    $filter .= " AND name LIKE '%".$_POST['search']."%'";
                }

                // Count total products
                $totalProductsSql = "SELECT COUNT(*) as total FROM Products $filter";
                $totalResult = $conn->query($totalProductsSql);
                $totalProducts = $totalResult->fetch_assoc()['total'];

                // Fetch paginated products
                $sql = "SELECT * FROM Products $filter ORDER BY rand() LIMIT $productsPerPage OFFSET $offset";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                            <div class="card h-70 shadow-sm">
                                <a href="product_details.php?pid=<?=$row['product_id']?>" target="_blank">
                                    <img src="<?=$row['image_url']?>" class="card-img-top" alt="product.title" />
                                </a>
                                <div class="card-body">
                                    <div class="clearfix mb-3">
                                        <span class="float-start badge rounded-pill bg-success">$<?=$row['price']?></span>
                                        <span class="float-end">
                                            <a href="product_details.php?pid=<?=$row['product_id']?>" class="small text-muted text-uppercase aff-link">Quality</a>
                                        </span>
                                    </div>
                                    <h5 class="card-title">
                                        <a target="_blank" href="#"><?=$row['name']?></a>
                                    </h5>
                                    <div class="d-grid gap-2 my-4">
                                        <a href="add_cart.php?pid=<?=$row['product_id']?>" class="btn btn-warning bold-btn">add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No products found.</p>";
                }
                ?>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                <nav>
                    <ul class="pagination">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?=($page - 1)?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= ceil($totalProducts / $productsPerPage); $i++): ?>
                            <li class="page-item <?=($i == $page) ? 'active' : ''?>">
                                <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($page < ceil($totalProducts / $productsPerPage)): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?=($page + 1)?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/main.js"></script>

<?php 
include("footer.php");
?>

<script> 
    var el = document.getElementById('curr'); 
    var r = document.getElementById('range'); 
    el.innerText = "$" + r.valueAsNumber; 
    r.addEventListener('change', () => { 
        el.innerText = "$" + r.valueAsNumber; 
    });
</script>
