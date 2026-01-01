<?php session_start(); ?>
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
  <!--================Header Menu Area =================-->
  <?php 
    include("include/header.php");
  ?>
  <!--================Header Menu Area =================-->

  <!--================Home Banner Area =================-->
  
  <!--================End Home Banner Area =================-->

  <div class="container mt-5">
  <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>My Wishlist</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="wishlist.php">Wishlist</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      include_once('include/config.php');
      $ids = isset($_SESSION['wishlist']) ? array_keys($_SESSION['wishlist']) : [];
      $ids = array_filter(array_map('intval', $ids));
      if (!empty($ids)) {
        $idList = implode(',', $ids);
        $qry = "SELECT id, productname, productprice, image FROM products WHERE id IN ($idList) ORDER BY id ASC";
        $res = mysqli_query($conn, $qry);
      }
    ?>
    <?php if (!empty($ids) && $res && mysqli_num_rows($res) > 0) { ?>
      <div class="row">
        <?php while($p = mysqli_fetch_assoc($res)) { ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="single-product">
              <div class="product-img">
                <img class="card-img" src="img/products/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['productname']); ?>" />
              </div>
              <div class="product-btm">
                <a href="single-product.php?id=<?php echo (int)$p['id']; ?>" class="d-block">
                  <h4><?php echo htmlspecialchars($p['productname']); ?></h4>
                </a>
                <div class="mt-2 d-flex align-items-center">
                  <span class="mr-3">₹<?php echo number_format((float)$p['productprice'], 2); ?></span>
                  <a href="add_to_cart.php?id=<?php echo (int)$p['id']; ?>" class="btn btn-sm btn-primary">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } else { ?>
      <p>Your wishlist is currently empty.</p>
    <?php } ?>
  </div>
  <br>

  <!-- Start feature Area -->
  
  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
  
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  
  <!--================ End New Product Area =================-->

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
