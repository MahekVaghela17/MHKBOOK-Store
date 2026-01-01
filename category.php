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
  
  <?php
    // Prepare category data for sidebar filters
    $catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
    $subcatid = isset($_GET['subcatid']) ? intval($_GET['subcatid']) : 0;
    $view = isset($_GET['view']) && $_GET['view'] === 'list' ? 'list' : 'grid';
    // Sorting param (whitelist)
    $allowed_sorts = [
      'default',       // fallback
      'price_asc',
      'price_desc',
      'name_asc',
      'name_desc',
      'newest',        // id DESC
      'oldest'         // id ASC
    ];
    $sort = isset($_GET['sort']) ? strtolower(trim($_GET['sort'])) : 'default';
    if (!in_array($sort, $allowed_sorts, true)) { $sort = 'default'; }
    // Price filter params
    $min_price = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? max(0, intval($_GET['min_price'])) : null;
    $max_price = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? max(0, intval($_GET['max_price'])) : null;
    // Show (items per page) param
    $allowed_show = ['All',8, 12, 14, 16, 20];
    $show = isset($_GET['show']) ? intval($_GET['show']) : 'All';
    if (!in_array($show, $allowed_show, true)) { $show = 'All'; }
    // Build base query string for view toggle preserving filters
    $qs = [];
    if ($catid > 0) { $qs['catid'] = $catid; }
    if ($subcatid > 0) { $qs['subcatid'] = $subcatid; }
    if ($min_price !== null) { $qs['min_price'] = $min_price; }
    if ($max_price !== null) { $qs['max_price'] = $max_price; }
    if (!empty($sort) && $sort !== 'default') { $qs['sort'] = $sort; }
    if (!empty($show)) { $qs['show'] = $show; }
    $base_query = http_build_query($qs);
    // header.php already includes include/config.php; include_once for safety
    include_once('include/config.php');
    $categories_qry = "SELECT * FROM categories ORDER BY id ASC";
    $categories_result = mysqli_query($conn, $categories_qry) or exit("Categories select fail" . mysqli_error($conn));
    // Global price bounds (for placeholders/UI)
    $bounds_qry = "SELECT MIN(productprice) AS minp, MAX(productprice) AS maxp FROM products";
    $bounds_res = mysqli_query($conn, $bounds_qry);
    $bounds = $bounds_res ? mysqli_fetch_assoc($bounds_res) : null;
    $global_min_price = $bounds && isset($bounds['minp']) ? (int)$bounds['minp'] : 0;
    $global_max_price = $bounds && isset($bounds['maxp']) ? (int)$bounds['maxp'] : 0;
    // Build products query (filtered by selected category/subcategory if provided)
    $products_qry = "SELECT p.*, c.catname, s.subcatname\n"
                  . "FROM products p\n"
                  . "LEFT JOIN categories c ON p.catid = c.id\n"
                  . "LEFT JOIN subcategories s ON p.subcatid = s.id";
    $where = [];
    if ($catid > 0) { $where[] = "p.catid = " . $catid; }
    if ($subcatid > 0) { $where[] = "p.subcatid = " . $subcatid; }
    if ($min_price !== null) { $where[] = "p.productprice >= " . $min_price; }
    if ($max_price !== null) { $where[] = "p.productprice <= " . $max_price; }
    if (!empty($where)) {
      $products_qry .= " WHERE " . implode(" AND ", $where);
    }
    // Order by mapping
    switch ($sort) {
      case 'price_asc':
        $order_by = 'p.productprice ASC, p.id ASC';
        break;
      case 'price_desc':
        $order_by = 'p.productprice DESC, p.id DESC';
        break;
      case 'name_asc':
        $order_by = 'p.productname ASC, p.id ASC';
        break;
      case 'name_desc':
        $order_by = 'p.productname DESC, p.id DESC';
        break;
      case 'newest':
        $order_by = 'p.id DESC';
        break;
      case 'oldest':
        $order_by = 'p.id ASC';
        break;
      default:
        $order_by = 'p.id ASC';
    }
    $products_qry .= " ORDER BY " . $order_by;
    // Apply limit based on 'show' dropdown
    $limit = (int)$show;
    if ($limit > 0) {
      $products_qry .= " LIMIT " . $limit;
    }
    $products_result = mysqli_query($conn, $products_qry) or exit("Products select fail" . mysqli_error($conn));
  ?>
  
  <!--================End Home Banner Area =================-->
  <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Book Category</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="category.php">Shop</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar d-flex justify-content-between align-items-center">
              <div class="left_dorp">
                <form method="get" action="category.php" class="d-inline">
                  <?php if ($catid > 0) { ?>
                    <input type="hidden" name="catid" value="<?php echo (int)$catid; ?>" />
                  <?php } ?>
                  <?php if ($subcatid > 0) { ?>
                    <input type="hidden" name="subcatid" value="<?php echo (int)$subcatid; ?>" />
                  <?php } ?>
                  <?php if ($min_price !== null) { ?>
                    <input type="hidden" name="min_price" value="<?php echo (int)$min_price; ?>" />
                  <?php } ?>
                  <?php if ($max_price !== null) { ?>
                    <input type="hidden" name="max_price" value="<?php echo (int)$max_price; ?>" />
                  <?php } ?>
                  <input type="hidden" name="view" value="<?php echo htmlspecialchars($view); ?>" />
                  <select class="sorting" id="sort" name="sort" onchange="this.form.submit()">
                    <option value="default" <?php echo $sort==='default'?'selected':''; ?>>Default sorting</option>
                    <option value="newest" <?php echo $sort==='newest'?'selected':''; ?>>Newest</option>
                    <option value="oldest" <?php echo $sort==='oldest'?'selected':''; ?>>Oldest</option>
                    <option value="price_asc" <?php echo $sort==='price_asc'?'selected':''; ?>>Price: Low to High</option>
                    <option value="price_desc" <?php echo $sort==='price_desc'?'selected':''; ?>>Price: High to Low</option>
                    <option value="name_asc" <?php echo $sort==='name_asc'?'selected':''; ?>>Name: A to Z</option>
                    <option value="name_desc" <?php echo $sort==='name_desc'?'selected':''; ?>>Name: Z to A</option>
                    <option value="random" <?php echo $sort==='random'?'selected':''; ?>>Random</option>
                    <option value="rating" <?php echo $sort==='rating'?'selected':''; ?>>Rating</option>
                    <option value="featured" <?php echo $sort==='featured'?'selected':''; ?>>Featured</option>
                    <option value="bestseller" <?php echo $sort==='bestseller'?'selected':''; ?>>Bestseller</option>
                  </select>
                </form>
                <form method="get" action="category.php" class="d-inline">
                  <?php if ($catid > 0) { ?>
                    <input type="hidden" name="catid" value="<?php echo (int)$catid; ?>" />
                  <?php } ?>
                  <?php if ($subcatid > 0) { ?>
                    <input type="hidden" name="subcatid" value="<?php echo (int)$subcatid; ?>" />
                  <?php } ?>
                  <?php if ($min_price !== null) { ?>
                    <input type="hidden" name="min_price" value="<?php echo (int)$min_price; ?>" />
                  <?php } ?>
                  <?php if ($max_price !== null) { ?>
                    <input type="hidden" name="max_price" value="<?php echo (int)$max_price; ?>" />
                  <?php } ?>
                  <?php if (!empty($sort) && $sort !== 'default') { ?>
                    <input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>" />
                  <?php } ?>
                  <input type="hidden" name="view" value="<?php echo htmlspecialchars($view); ?>" />
                  <select class="show" id="show" name="show" onchange="this.form.submit()">
                    <option value="all" <?php echo $show==='all'?'selected':''; ?>>Show All</option>
                    <option value="8" <?php echo (int)$show===8?'selected':''; ?>>Show 8</option>
                    <option value="12" <?php echo (int)$show===12?'selected':''; ?>>Show 12</option>
                    <option value="14" <?php echo (int)$show===14?'selected':''; ?>>Show 14</option>
                    <option value="16" <?php echo (int)$show===16?'selected':''; ?>>Show 16</option>
                    <option value="20" <?php echo (int)$show===20?'selected':''; ?>>Show 20</option>
                  </select>
                </form>
              </div>
              
              <!-- Quick Search -->
              <div class="d-flex align-items-center mb-6">
              <input type="text" id="quickSearch" class="form-control form-control-sm" style="max-width:280px;" placeholder="Search products..." aria-label="Quick search products" />
              <button type="button" id="clearQuickSearch" class="btn btn-sm btn-outline-secondary ml-2">Clear</button>
              </div>
              <?php
                $grid_url = 'category.php' . ($base_query ? ('?' . $base_query . '&view=grid') : '?view=grid');
                $list_url = 'category.php' . ($base_query ? ('?' . $base_query . '&view=list') : '?view=list');
              ?>
              <div class="right_tools">
                <a href="<?php echo htmlspecialchars($grid_url); ?>" class="btn btn-sm <?php echo $view==='grid' ? 'btn-primary' : 'btn-outline-primary'; ?>">Grid</a>
                <a href="<?php echo htmlspecialchars($list_url); ?>" class="btn btn-sm <?php echo $view==='list' ? 'btn-primary' : 'btn-outline-primary'; ?>">List</a>
              </div>
            </div>
            <br>
            
            <div class="latest_product_inner">
              <div class="row">
                <?php if ($products_result && mysqli_num_rows($products_result) > 0) { ?>
                  <?php if ($view === 'list') { ?>
                    <?php while($prow = mysqli_fetch_assoc($products_result)) { ?>
                      <div class="col-12">
                        <div class="single-product media p-3 border mb-4">
                          <img class="mr-3" src="img/products/<?php echo htmlspecialchars($prow['image']); ?>" alt="<?php echo htmlspecialchars($prow['productname']); ?>" style="width:120px;height:120px;object-fit:contain;background:#fff;padding:6px;display:block;" />
                          <div class="media-body">
                            <a href="single-product.php?id=<?php echo (int)$prow['id']; ?>" class="d-block">
                              <h4><?php echo htmlspecialchars($prow['productname']); ?></h4>
                            </a>
                            <div class="mt-2">
                              <span class="mr-4">₹<?php echo number_format((float)$prow['productprice'], 2); ?></span>
                            </div>
                            <?php if (!empty($prow['catname'])) { ?>
                              <div class="text-muted small mt-1">Category: <?php echo htmlspecialchars($prow['catname']); ?><?php if (!empty($prow['subcatname'])) { echo ' / ' . htmlspecialchars($prow['subcatname']); } ?></div>
                            <?php } ?>
                            <div class="mt-2">
                              <a href="single-product.php?id=<?php echo (int)$prow['id']; ?>" class="btn btn-sm btn-outline-primary">View</a>
                              <a href="add_to_wishlist.php?id=<?php echo (int)$prow['id']; ?>" class="btn btn-sm btn-outline-secondary">Wishlist</a>
                              <a href="add_to_cart.php?id=<?php echo (int)$prow['id']; ?>" class="btn btn-sm btn-primary">Add to Cart</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  <?php } else { ?>
                    <?php while($prow = mysqli_fetch_assoc($products_result)) { ?>
                      <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                          <div class="product-img position-relative d-flex align-items-center justify-content-center" style="width:100%; height:260px; background:#fff; padding:10px;">
                            <img src="img/products/<?php echo htmlspecialchars($prow['image']); ?>" alt="<?php echo htmlspecialchars($prow['productname']); ?>" style="max-width:100%; max-height:100%; width:auto; height:auto; object-fit:contain; display:block;" />
                            <div class="p_icon" style="position:absolute; right:10px; bottom:10px;">
                              <a href="single-product.php?id=<?php echo (int)$prow['id']; ?>">
                                <i class="ti-eye"></i>
                              </a>
                              <a href="add_to_wishlist.php?id=<?php echo (int)$prow['id']; ?>" title="Add to wishlist">
                                <i class="ti-heart"></i>
                              </a>
                              <a href="add_to_cart.php?id=<?php echo (int)$prow['id']; ?>" title="Add to cart">
                                <i class="ti-shopping-cart"></i>
                              </a>
                            </div>
                          </div>
                          <div class="product-btm">
                            <a href="single-product.php?id=<?php echo (int)$prow['id']; ?>" class="d-block">
                              <h4><?php echo htmlspecialchars($prow['productname']); ?></h4>
                            </a>
                            <div class="mt-3">
                              <span class="mr-4">₹<?php echo number_format((float)$prow['productprice'], 2); ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  <?php } ?>
                <?php } else { ?>
                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i1.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i2.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i3.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i4.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i5.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i6.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i7.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i8.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="img/product/inspired-product/i2.jpg"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <?php if ($categories_result && mysqli_num_rows($categories_result) > 0) { ?>
                      <?php while($cat = mysqli_fetch_assoc($categories_result)) { ?>
                        <li>
                          <a href="category.php?catid=<?php echo (int)$cat['id']; ?>" <?php echo ($catid==(int)$cat['id'])?'class="active"':''; ?>>
                            <?php echo htmlspecialchars($cat['catname']); ?>
                          </a>
                          <?php
                            // Only show subcategories when this category is currently selected
                            if ($catid === (int)$cat['id']) {
                              $sub_qry = "SELECT id, subcatname FROM subcategories WHERE catid = " . (int)$cat['id'] . " ORDER BY id ASC";
                              $sub_res = mysqli_query($conn, $sub_qry);
                              if ($sub_res && mysqli_num_rows($sub_res) > 0) { ?>
                                <ul class="list" style="margin-left:12px;">
                                  <?php while($sub = mysqli_fetch_assoc($sub_res)) { ?>
                                    <li>
                                      <a href="category.php?catid=<?php echo (int)$cat['id']; ?>&amp;subcatid=<?php echo (int)$sub['id']; ?>" 
                                      <?php echo ($subcatid==(int)$sub['id'])?'class="active"':''; ?>>
                                        <?php echo htmlspecialchars($sub['subcatname']); ?>
                                      </a>
                                    </li>
                                  <?php } ?>
                                </ul>
                              <?php } ?>
                              <?php } ?>
                        </li>
                      <?php } ?>
                    <?php } else { ?>
                      <li><span>No categories available.</span></li>
                    <?php } ?>
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Price Filter</h3>
                </div>
                <div class="widgets_inner">
                  <form method="get" action="category.php">
                    <?php if ($catid > 0) { ?>
                      <input type="hidden" name="catid" value="<?php echo (int)$catid; ?>">
                    <?php } ?>
                    <?php if ($subcatid > 0) { ?>
                      <input type="hidden" name="subcatid" value="<?php echo (int)$subcatid; ?>">
                    <?php } ?>
                    <input type="hidden" name="view" value="<?php echo htmlspecialchars($view); ?>">
                    <div class="form-group">
                      <label for="min_price">Min (₹)</label>
                      <input type="number" class="form-control" id="min_price" name="min_price" min="0" step="1"
                             placeholder="<?php echo (int)$global_min_price; ?>"
                             value="<?php echo $min_price !== null ? (int)$min_price : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label for="max_price">Max (₹)</label>
                      <input type="number" class="form-control" id="max_price" name="max_price" min="0" step="1"
                             placeholder="<?php echo (int)$global_max_price; ?>"
                             value="<?php echo $max_price !== null ? (int)$max_price : ''; ?>">
                    </div>
                    <div class="d-flex align-items-center">
                      <button type="submit" class="btn btn-primary btn-sm mr-2">Apply</button>
                      <a class="btn btn-outline-secondary btn-sm" href="<?php echo 'category.php' . ($base_query ? ('?' . http_build_query(array_diff_key($qs, ['min_price'=>1,'max_price'=>1]))) : ''); ?>">Clear</a>
                    </div>
                  </form>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Category Product Area =================-->

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