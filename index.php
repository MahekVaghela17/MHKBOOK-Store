<?php
include("include/config.php");

$ip = $_SERVER['REMOTE_ADDR'];  // Get visitor IP
$conn->query("INSERT INTO visitors (ip_address) VALUES ('$ip')");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php
  include("include/style.php");
  ?>
</head>

<body>
<?php
  include_once('include/config.php');
  $settingqry="select * from sitesettings";
  $settingresult = mysqli_query($conn,$settingqry) or exit("Settings select fail".mysqli_error($conn));  
  $settingrow=mysqli_fetch_array($settingresult);
?>
  <!--================Header Menu Area =================-->
  <?php 
    include("include/header.php");
  ?>
  <!--================Header Menu Area =================-->
  
  <!-- Start feature Area -->
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Money back gurantee</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Free Delivery</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Alway support</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Secure payment</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

  <!--================ Featured Products Area =================-->
  <section class="section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="main_title">
        <h2><span>Featured</span> Products</h2>
        <p>Handpicked selections just for you</p>
      </div>
      <?php
        // Featured products if column exists, else fallback to latest 8
        $featuredItems = [];
        $hasFeaturedCol = false;
        if ($colRes = mysqli_query($conn, "SHOW COLUMNS FROM products LIKE 'is_featured'")) {
          $hasFeaturedCol = mysqli_num_rows($colRes) > 0;
          mysqli_free_result($colRes);
        }

        if ($hasFeaturedCol) {
          $featuredQry = "SELECT id, productname, productprice, image FROM products WHERE is_featured = 1 ORDER BY id DESC LIMIT 8";
        } else {
          // No is_featured column: choose random items to ensure different set than New Arrivals
          $featuredQry = "SELECT id, productname, productprice, image FROM products ORDER BY RAND() LIMIT 8";
        }

        if ($resF = mysqli_query($conn, $featuredQry)) {
          while ($row = mysqli_fetch_assoc($resF)) { $featuredItems[] = $row; }
          mysqli_free_result($resF);
        }
      ?>
      <div class="row">
        <?php if (!empty($featuredItems)): ?>
          <?php foreach ($featuredItems as $p): ?>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
              <div class="single-product card h-100">
                <div class="product-img position-relative d-flex align-items-center justify-content-center" style="width:100%; height:260px; background:#fff; padding:10px;">
                  <img src="img/products/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['productname']); ?>" style="max-width:100%; max-height:100%; width:auto; height:auto; object-fit:contain; display:block;" />
                  <div class="p_icon" style="position:absolute; right:10px; bottom:10px;">
                    <a href="update_cart.php?action=inc&id=<?php echo (int)$p['id']; ?>" title="Add to Cart">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm card-body d-flex flex-column">
                  <a href="#" class="d-block"><h5 class="card-title mb-2 text-truncate"><?php echo htmlspecialchars($p['productname']); ?></h5></a>
                  <div class="mt-1 mb-3"><span class="mr-4">₹<?php echo number_format((float)$p['productprice'], 2); ?></span></div>
                  <a href="update_cart.php?action=inc&id=<?php echo (int)$p['id']; ?>" class="btn btn-sm btn-outline-primary mt-auto">Add to Cart</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center"><p>No featured products available.</p></div>
        <?php endif; ?>
      </div>

      <div class="main_title mt-5">
        <h2><span>New</span> Arrivals</h2>
        <p>Latest additions to our catalog</p>
      </div>
      <?php
        $newItems = [];
        $newQry = "SELECT id, productname, productprice, image FROM products ORDER BY id DESC LIMIT 8";
        if ($resN = mysqli_query($conn, $newQry)) {
          while ($row = mysqli_fetch_assoc($resN)) { $newItems[] = $row; }
          mysqli_free_result($resN);
        }
      ?>
      <div class="row">
        <?php if (!empty($newItems)): ?>
          <?php foreach ($newItems as $p): ?>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
              <div class="single-product card h-100">
                <div class="product-img position-relative d-flex align-items-center justify-content-center" style="width:100%; height:260px; background:#fff; padding:10px;">
                  <img src="img/products/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['productname']); ?>" style="max-width:100%; max-height:100%; width:auto; height:auto; object-fit:contain; display:block;" />
                  <div class="p_icon" style="position:absolute; right:10px; bottom:10px;">
                    <a href="update_cart.php?action=inc&id=<?php echo (int)$p['id']; ?>" title="Add to Cart">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm card-body d-flex flex-column">
                  <a href="#" class="d-block"><h5 class="card-title mb-2 text-truncate"><?php echo htmlspecialchars($p['productname']); ?></h5></a>
                  <div class="mt-1 mb-3"><span class="mr-4">₹<?php echo number_format((float)$p['productprice'], 2); ?></span></div>
                  <a href="update_cart.php?action=inc&id=<?php echo (int)$p['id']; ?>" class="btn btn-sm btn-outline-primary mt-auto">Add to Cart</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center"><p>No new products available.</p></div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!--================ End Featured/New Products Area =================-->

  <!--================ Offer Area =================-->
  <section class="offer_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="offset-lg-4 col-lg-6 text-center">
          <div class="offer_content">
            <h3 class="text-uppercase mb-40">FALL IN LOVE WITH STORIES</h3>
            <h2 class="text-uppercase">50% OFF FICTION TITLE</h2>
            <a href="#" class="main_btn mb-20 mt-5">READ MORE</a>
            <p>Limited Time Offer – Explore your imagination.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
  <br>
  <!--================ End Offer Area =================-->

  <!--================ Inspired Product Area =================-->
  
  <!--================ End Inspired Product Area =================-->

  <!--================ Start Blog Area =================-->
  
  <!--================ End Blog Area =================-->

  <!--================ start footer Area  =================-->
  <?php
  include("include/footer.php");
  ?>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php
  include("include/script.php");
  ?>
</body>

</html>