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

  <!-- Start feature Area -->
  
  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  

  <!--================ Offer Area =================-->
  
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->

  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>New Products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <?php
        include_once('include/config.php');
        $latest = [];
        $qry = "SELECT id, productname, productprice, image FROM products ORDER BY id DESC LIMIT 5";
        if ($res = mysqli_query($conn, $qry)) {
          while ($row = mysqli_fetch_assoc($res)) {
            $latest[] = $row;
          }
          mysqli_free_result($res);
        }
        $hero = !empty($latest) ? $latest[0] : null;
        $grid = count($latest) > 1 ? array_slice($latest, 1, 4) : [];
      ?>

      <div class="row">
        <div class="col-lg-6">
          <div class="new_product">
            <?php if ($hero): ?>
              <h5 class="text-uppercase">Latest Arrival</h5>
              <h3 class="text-uppercase"><?php echo htmlspecialchars($hero['productname']); ?></h3>
              <div class="product-img">
                <img class="img-fluid" src="img/products/<?php echo htmlspecialchars($hero['image']); ?>" alt="<?php echo htmlspecialchars($hero['productname']); ?>" />
              </div>
              <h4>₹<?php echo number_format((float)$hero['productprice'], 2); ?></h4>
              <a href="update_cart.php?action=inc&id=<?php echo (int)$hero['id']; ?>" class="main_btn">Add to cart</a>
            <?php else: ?>
              <p>No products available.</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            <?php if (!empty($grid)): ?>
              <?php foreach ($grid as $p): ?>
                <div class="col-lg-6 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img class="img-fluid w-100" src="img/products/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['productname']); ?>" />
                      <div class="p_icon">
                        <a href="#" title="View">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#" title="Wishlist">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="update_cart.php?action=inc&id=<?php echo (int)$p['id']; ?>" title="Add to Cart">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4><?php echo htmlspecialchars($p['productname']); ?></h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">₹<?php echo number_format((float)$p['productprice'], 2); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-12"><p>No more products found.</p></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--================ End New Product Area =================-->
  
  <!--================ End Inspired Product Area =================-->

  <!--================ Start Blog Area =================-->

  <!--================Home Banner Area =================-->
    
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
	
	<!--================Blog Area =================-->
  
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