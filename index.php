<?php 
include "connect.php";
include "header.php";
include "modal.php";
?>

<head>
  <link rel="manifest" href="manifest.json">
</head>
<!-- Secondary Navbar -->
<div class="row">
  <div class="col-12">
    <nav class="navbar secondary-navbar navbar-expand-lg d-none d-lg-block navbar-light bg-light shadow-lg bg-white rounded fixed-top">
      <div class="container">
        <div class="navbar-collapse justify-content-center">
          <ul class="navbar-nav">
<?php 
$sql = "SELECT * FROM categories ORDER BY name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
            <li class="nav-item mx-3">
              <a class="nav-link secondary-hover" href="products.php?cid=<?=$row['category_id']?>"><?=$row['name']?></a>
            </li>
<?php 
    }
}
?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div><!-- row end -->

      <!-- Hero Carousel Section -->
      <div class="row mt-5 pt-5">
        <div class="col-12">
          <div class="centered-carousel mt-5">
            <div
              id="carouselExampleDark"
              class="carousel carousel-light slide rounded-3 carousel-landscape carousel-fade mx-auto shadow-lg"
              data-bs-ride="carousel"
            >
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#carouselExampleDark"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleDark"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleDark"
                  data-bs-slide-to="2"
                  aria-label="Slide 3"
                ></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                  <img
                    src="../images/pannel2.png"
                    class="d-block w-100"
                    alt="First Slide"
                  />
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="h3">Strongest Gaming PCs</h5>
                    <p class="lead">
                      "Unleash ultimate power with the strongest gaming PCs,
                      built for unmatched performance."
                    </p>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img
                    src="../images/pannel3.png"
                    class="d-block w-100"
                    alt="Second Slide"
                  />
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="h3">Professional PCs</h5>
                    <p class="lead">
                      "Professional PCs engineered for peak productivity,
                      delivering powerful performance."
                    </p>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <img
                    src="../images/pannel4.png"
                    class="d-block w-100"
                    alt="Third Slide"
                  />
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="h3">Corporate PCs</h5>
                    <p class="lead">
                      "Corporate PCs designed for seamless business operations,
                      ensuring security and efficiency."
                    </p>
                  </div>
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleDark"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleDark"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- End of Carousel Section -->

      <!--Main (()) Hero Section -->

      <!-- End of Hero Section -->

      <!-- Cards Section -->
      <div class="row">
        <div class="col-12 justify-content-center text-center gy-5">
          <p class="h1 section-title fw-normal">
            <span>Best sellers</span>
          </p>
        </div>
      </div>
      <!-- start Cards Section -->
       <!-- PHP: Fetch products from the database -->
      <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative" >
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" >
<?php 
$sql = "SELECT * FROM Products ORDER BY product_id ASC LIMIT 4";
$result = $conn->query($sql);
if ($result->num_rows >= 4) {
    while ($row = $result->fetch_assoc()) {
?>
          <div class="col hp">
            <div class="card h-100 shadow-sm">
              <a target="_blank" href="product_details.php?pid=<?=$row['product_id']?>">
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
                  <a target="_blank" href="product_details.php?pid=<?=$row['product_id']?>"><?=$row['name']?></a>
                </h5>

                <div class="d-grid gap-2 my-4">
                  <a href="add_cart.php?pid=<?=$row['product_id']?>" class="btn btn-warning bold-btn">add to cart</a>
                </div>
                <div class="clearfix mb-1">
                  <span class="float-start">
                    <a href="#"><i class="fas fa-question-circle"></i></a>
                  </span>

                  <span class="float-end">
                    <i class="far fa-heart" style="cursor: pointer"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
<?php
    }
}
?>
        </div>
      </div>

      <!-- End of Cards Section -->

      <!-- start of products Section -->
      <div class="row">
        <div class="col-12 justify-content-center text-center">
          <p class="h1 section-title fw-normal">
            <span>Exclusive Products</span>
          </p>
        </div>
      </div>

<!-- PHP: Fetch products from the database -->
<div class="container-fluid bg-transparent my-4 p-2" style="position: relative">
  <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $sql = "SELECT * FROM Products ORDER BY product_id ASC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $counter = 0;
          while ($row = $result->fetch_assoc()) {
              // Start a new carousel item every 4 products
              if ($counter % 4 == 0) {
                  // Close the previous item if not the first one
                  if ($counter > 0) {
                      echo '</div></div>';
                  }
                  // Add the 'active' class to the first carousel item
                  $activeClass = ($counter == 0) ? 'active' : '';
                  echo '<div class="carousel-item ' . $activeClass . '">
                          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">';
              }
              ?>
              <div class="col">
                <div class="card h-100 shadow-sm">
                  <a target="_blank" href="product_details.php?pid=<?= $row['product_id'] ?>">
                    <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="product.title" />
                  </a>
                  <div class="card-body">
                    <div class="clearfix mb-3">
                      <span class="float-start badge rounded-pill bg-success">
                        $<?= $row['price'] ?>
                      </span>
                      <span class="float-end">
                        <a href="product_details.php?pid=<?= $row['product_id'] ?>" class="small text-muted text-uppercase aff-link">test</a>
                      </span>
                    </div>
                    <h5 class="card-title">
                      <a target="_blank" href="product_details.php?pid=<?= $row['product_id'] ?>"><?= $row['name'] ?></a>
                    </h5>
                    <div class="d-grid gap-2 my-4">
                      <a href="add_cart.php?pid=<?= $row['product_id'] ?>" class="btn btn-warning bold-btn">add to cart</a>
                    </div>
                    <div class="clearfix mb-1">
                      <span class="float-start">
                        <a href="#"><i class="fas fa-question-circle"></i></a>
                      </span>
                      <span class="float-end">
                        <i class="far fa-heart" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              $counter++;
          }
          // Close the last carousel item
          echo '</div></div>';
      }
      ?>
    </div>
    <!-- Carousel Controls -->
   

      
          <!-- Carousel controls -->
          <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      </div>
      
      <div class="container py-5">
        <div class="card horizontal-card shadow-lg overflow-hidden">
          <a href="products.php" target="_blank"> <!-- Add the link here -->
            <img src="../images/ClickHere1.gif"  class="card-img img-fluid" alt="Click Here">
          </a>       
             </div>
        </div>
    </div>
    
    

    <div class="container py-5">
      <div class="row">
        <div class="col-12 justify-content-center text-center">
          <p class="h1 section-title fw-normal">
            <span>We Offer</span>
          </p>
        </div>
      </div>  
      <div class="row">
        <!-- Feature 1 -->
        <div class="col-md-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-headset"></i> <!-- Use Bootstrap icons or replace with an image -->
            </div>
            <h6 class="feature-title">EXPERT SUPPORT</h6>
            <p class="feature-subtitle">You Won't Be Alone</p>
            <p>Our tech experts are here to assist you with any questions about your setup, hardware, or software. Get professional advice anytime.</p>
          </div>
        </div>
        <!-- Feature 2 -->
        <div class="col-md-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-layout-text-sidebar-reverse"></i> <!-- Replace with desired icon -->
            </div>
            <h6 class="feature-title">FULLY CUSTOMIZABLE</h6>
            <p class="feature-subtitle">Personalized Performance</p>
            <p>We offer fully customizable PCs tailored to your specific needs, whether for gaming, design, or business. Create the perfect setup for you.</p>
          </div>
        </div>
        <!-- Feature 3 -->
        <div class="col-md-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-arrow-repeat"></i> <!-- Replace with desired icon -->
            </div>
            <h6 class="feature-title">FAST DELIVERY</h6>
            <p class="feature-subtitle">Get it quickly</p>
            <p>Our streamlined shipping ensures your PC parts or custom-built systems arrive quickly and safely. We prioritize speed and reliability.</p>
          </div>
        </div>
      </div>
    </div>

    <script src="../assets/js/main.js"></script>

    

<?php 
include("footer.php");
?>
