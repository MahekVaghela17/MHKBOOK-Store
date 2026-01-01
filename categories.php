<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php include("include/style.php"); ?>
</head>
<body>
  <?php include("include/header.php"); ?>

  <?php
    include_once('include/config.php');
    $cat_q = "SELECT * FROM categories ORDER BY id ASC";
    $cat_res = mysqli_query($conn, $cat_q) or exit("Categories select fail" . mysqli_error($conn));
  ?>

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>All Categories</h2>
            <p>Browse all categories available in the shop</p>
          </div>
          <div class="page_link">
            <a href="index.php">Home</a>
            <a href="categories.php">All Categories</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section_gap">
    <div class="container">
      <div class="row">
        <?php if ($cat_res && mysqli_num_rows($cat_res) > 0) { ?>
          <?php while($cat = mysqli_fetch_assoc($cat_res)) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
              <div class="card h-100 single-product">
                <div class="product-img">
                  <a href="category.php?catid=<?php echo (int)$cat['id']; ?>">
                    <img class="card-img-top img-fluid" src="img/categories/<?php echo htmlspecialchars($cat['image']); ?>" alt="<?php echo htmlspecialchars($cat['catname']); ?>" />
                  </a>
                </div>
                <div class="card-body product-btm text-center">
                  <a href="category.php?catid=<?php echo (int)$cat['id']; ?>" class="d-block">
                    <h4><?php echo htmlspecialchars($cat['catname']); ?></h4>
                  </a>
                  <?php if (!empty($cat['catdescription'])) { ?>
                    <p class="text-muted" style="font-size: 0.9rem;"><?php echo htmlspecialchars($cat['catdescription']); ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="col-12">
            <p>No categories found.</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <?php include("include/footer.php"); ?>
  <?php include("include/script.php"); ?>
</body>
</html>
