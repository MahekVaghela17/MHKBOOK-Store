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

  
  <!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  
  <!-- End feature Area -->

  <!--================ FeatureProduct Area =================-->


   <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Featured product</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <?php
          include_once('include/config.php');
          $products = [];
          $qry = "SELECT id, productname, productprice, image FROM products ORDER BY id DESC LIMIT 6";
          if ($res = mysqli_query($conn, $qry)) {
            while ($row = mysqli_fetch_assoc($res)) {
              $products[] = $row;
            }
            mysqli_free_result($res);
          }
        ?>
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $p): ?>
            <div class="col-lg-4 col-md-6">
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
          <div class="col-12 text-center">
            <p>No products found.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  
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