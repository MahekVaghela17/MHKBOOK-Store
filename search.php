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
  <!--================End Home Banner Area =================-->

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
              <h2>Search Products</h2>
              <p></p>
            </div>
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="search.php">Search</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  <div class="container mt-5">
    <h2>Search</h2>
    <form action="search.php" method="get">
        <div class="form-group">
            <label for="query">Search for products:</label>
            <input type="text" class="form-control" id="query" name="query" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php
      // When a query is provided, search products
      include_once('include/config.php');
      $q = isset($_GET['query']) ? trim($_GET['query']) : '';
      $results = [];
      if ($q !== '') {
        $like = "%" . $q . "%";
        if ($stmt = mysqli_prepare($conn, "SELECT id, productname, productprice, image FROM products WHERE productname LIKE ? ORDER BY productname ASC LIMIT 50")) {
          mysqli_stmt_bind_param($stmt, 's', $like);
          if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($res)) {
              $results[] = $row;
            }
            mysqli_free_result($res);
          }
          mysqli_stmt_close($stmt);
        }
    ?>
    <div class="mt-4">
      <h5 class="mb-3">Results for: <?php echo htmlspecialchars($q); ?></h5>
      <div class="row">
        <?php if (!empty($results)): ?>
          <?php foreach ($results as $p): ?>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="card h-100">
                <div class="position-relative" style="width:100%; height:500px; overflow:hidden;">
                  <img src="img/products/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['productname']); ?>" style="width:100%; height:100%; object-fit:cover;" />
                </div>
                <div class="card-body d-flex flex-column">
                  <h6 class="card-title mb-2 text-truncate" title="<?php echo htmlspecialchars($p['productname']); ?>"><?php echo htmlspecialchars($p['productname']); ?></h6>
                  <div class="mb-3">₹<?php echo number_format((float)$p['productprice'], 2); ?></div>
                  <a href="update_cart.php?action=inc&id=<?php echo (int)$p['id']; ?>" class="btn btn-sm btn-outline-primary mt-auto">Add to Cart</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-warning">No products found matching "<?php echo htmlspecialchars($q); ?>".</div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php } ?>
  </div>
  </section>

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