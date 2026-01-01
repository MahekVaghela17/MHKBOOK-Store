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
    include_once __DIR__ . '/include/config.php';
    // Fetch all subcategories with their parent categories
    // Arrange strictly by database order: category id, then subcategory id
    $qry = "SELECT s.id, s.subcatname, s.subcatdescription, s.image, c.id AS catid, c.catname
            FROM subcategories s
            LEFT JOIN categories c ON s.catid = c.id
            ORDER BY c.id ASC, s.id ASC";
    $res = mysqli_query($conn, $qry) or exit("Subcategories select fail" . mysqli_error($conn));
    $byCat = [];
    if ($res) {
      while ($row = mysqli_fetch_assoc($res)) {
        $key = (string)(isset($row['catid']) ? $row['catid'] : 0) . '|' . (isset($row['catname']) ? $row['catname'] : 'Uncategorized');
        $byCat[$key][] = $row;
      }
    }
  ?>

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>All Subcategories</h2>
            <p>Browse all subcategories</p>
          </div>
          <div class="page_link">
            <a href="index.php">Home</a>
            <a href="subcategories.php">All Subcategories</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section_gap">
    <div class="container">
      <?php if (!empty($byCat)): ?>
        <?php foreach ($byCat as $catKey => $subs): ?>
          <?php list($catId, $catName) = array_pad(explode('|', $catKey, 2), 2, 'Uncategorized'); ?>
          <div class="mb-4">
            <h4 class="mb-3"><?php echo htmlspecialchars($catName ?: 'Uncategorized'); ?></h4>
            <div class="row">
              <?php foreach ($subs as $s): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="single-product">
                    <div class="product-img">
                      <a href="category.php?catid=<?php echo (int)$s['catid']; ?>&subcatid=<?php echo (int)$s['id']; ?>">
                        <img class="card-img" src="img/subcategories/<?php echo htmlspecialchars($s['image']); ?>" alt="<?php echo htmlspecialchars($s['subcatname']); ?>" />
                      </a>
                    </div>
                    <div class="product-btm text-center">
                      <a href="category.php?catid=<?php echo (int)$s['catid']; ?>&subcatid=<?php echo (int)$s['id']; ?>" class="d-block">
                        <h4><?php echo htmlspecialchars($s['subcatname']); ?></h4>
                      </a>
                      <?php if (!empty($s['subcatdescription'])): ?>
                        <p class="text-muted" style="font-size:0.9rem;">
                          <?php echo htmlspecialchars($s['subcatdescription']); ?>
                        </p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No subcategories found.</p>
      <?php endif; ?>
    </div>
  </section>

  <?php include("include/footer.php"); ?>
  <?php include("include/script.php"); ?>
</body>
</html>
