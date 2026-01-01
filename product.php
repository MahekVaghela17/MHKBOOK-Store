<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php include("include/style.php"); ?>
  <title>Products</title>
</head>
<body>
  <?php include("include/header.php"); ?>

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Products</h2>
            <p>Browse our latest products</p>
          </div>
          <div class="page_link">
            <a href="index.php">Home</a>
            <a href="product.php">Products</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section_gap_top section_gap_bottom_custom">
    <div class="container">
      <?php
        include_once('include/config.php');

        // Pagination params
        $perPage = 9;
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $offset = ($page - 1) * $perPage;

        // Count total products
        $total = 0;
        if ($resC = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM products")) {
          if ($rowC = mysqli_fetch_assoc($resC)) { $total = (int)$rowC['cnt']; }
          mysqli_free_result($resC);
        }

        // Fetch products
        $items = [];
        $qry = "SELECT id, productname, productprice, image FROM products ORDER BY id ASC LIMIT $perPage OFFSET $offset";
        if ($res = mysqli_query($conn, $qry)) {
          while ($row = mysqli_fetch_assoc($res)) { $items[] = $row; }
          mysqli_free_result($res);
        }

        $totalPages = $perPage > 0 ? (int)ceil($total / $perPage) : 1;
      ?>

      <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
          <h4 class="mb-0">All Products</h4>
          <form action="search.php" method="get" class="d-flex" role="search">
            <input type="text" name="query" class="form-control form-control-sm me-2" placeholder="Search products" required />
            <button class="btn btn-sm btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
      </div>

      <div class="row">
        <?php if (!empty($items)): ?>
          <?php foreach ($items as $p): ?>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="single-product card h-100">
                <div class="product-img position-relative" style="width:100%; height:500px; overflow:hidden;">
                  <img class="img-fluid w-100" src="img/products/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['productname']); ?>" style="width:100%; height:100%; object-fit:cover;" />
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
          <div class="col-12 text-center"><p>No products available.</p></div>
        <?php endif; ?>
      </div>

      <?php if ($totalPages > 1): ?>
      <nav aria-label="Product pagination">
        <ul class="pagination justify-content-center mt-4">
          <?php $prev = max(1, $page - 1); $next = min($totalPages, $page + 1); ?>
          <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
            <a class="page-link" href="product.php?page=<?php echo $prev; ?>" aria-label="Previous">&laquo;</a>
          </li>
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
              <a class="page-link" href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>
          <li class="page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
            <a class="page-link" href="product.php?page=<?php echo $next; ?>" aria-label="Next">&raquo;</a>
          </li>
        </ul>
      </nav>
      <?php endif; ?>

    </div>
  </section>

  <?php include("include/footer.php"); ?>
  <?php include("include/script.php"); ?>
</body>
</html>
