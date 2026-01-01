<?php
  include_once('include/config.php');
  if (session_status() === PHP_SESSION_NONE) { session_start(); }
  // Lightweight visitor logging (IP, path, user agent)
  // Safe to include multiple times; uses prepared statement internally
  @include_once('include/visitors_log.php');
  $settingqry="select * from sitesettings";
  $settingresult = mysqli_query($conn,$settingqry) or exit("Settings select fail".mysqli_error($conn));  
  $settingrow=mysqli_fetch_array($settingresult);
  // Cart items count (sum of quantities)
  $cart = isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : [];
  $cart_item_count = 0;
  if (!empty($cart)) {
    foreach ($cart as $qty) {
      $cart_item_count += max(0, (int)$qty);
    }
  }
  // Wishlist items count (unique items)
  $wishlist = isset($_SESSION['wishlist']) && is_array($_SESSION['wishlist']) ? $_SESSION['wishlist'] : [];
  $wishlist_item_count = !empty($wishlist) ? count($wishlist) : 0;
?> 
<?php
  // Active menu highlighting
  $current = basename($_SERVER['PHP_SELF']);
  $active_home = ($current === 'index.php');
  $active_shop = in_array($current, ['categories.php','category.php','subcategories.php','cart.php','checkout.php']);
  $active_product = in_array($current, ['product.php','single-product.php','featured-product.php','new-product.php','inspired-product.php']);
  $active_tracking = ($current === 'tracking.php');
  $active_contact = ($current === 'contact.php');
?>
<header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +91 <?php echo $settingrow['phoneno']; ?> </p>
              <p>email: <?php echo $settingrow['email']; ?></p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.php">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.php">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.php">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.php">
            <?php
              if(isset($settingrow['image']) && $settingrow['image']!=null)
              {
            ?>
            <img src="img/logo/<?php echo $settingrow['image'] ?>" class="logo" alt="" />
            <?php
              }
              else
              {
            ?>
            <h1><?php echo $settingrow['sitename']; ?></h1>
            <?php
              }
            ?>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item<?php echo $active_home ? ' active' : ''; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item submenu dropdown<?php echo $active_shop ? ' active' : ''; ?>">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="categories.php">All Categories</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="category.php">Shop Category</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="subcategories.php">All Subcategories</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="cart.php">Shopping Cart</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="checkout.php">Checkout</a>
                      </li>
                    </ul>
                    </li>
                  <li class="nav-item submenu dropdown<?php echo $active_product ? ' active' : ''; ?>">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Product</a>
                    <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">All Product</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="single-product.php">Product Details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="featured-product.php">Featured Product</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="new-product.php">New Products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="inspired-product.php">Inspired Products</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item<?php echo $active_tracking ? ' active' : ''; ?>">
                    <a class="nav-link" href="tracking.php">Tracking</a>
                  </li>
                  </li>
                  <li class="nav-item<?php echo $active_contact ? ' active' : ''; ?>">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="search.php" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="cart.php" class="icons" <?php if (isset($_SESSION['user_id'])) { ?> title="Cart" <?php } else { ?> title="Login" <?php } ?> >
                      <i class="ti-shopping-cart"></i>
                      <?php if ($cart_item_count > 0) { ?>
                        <sup class="icon-count"><?php echo (int)$cart_item_count; ?></sup>
                      <?php } ?>
                    </a>
                  </li>

                  <?php if (isset($_SESSION['user_id'])) { ?>
                    <!-- Profile icon (visible after login) -->
                    <li class="nav-item">
                      <a href="profile.php" class="icons" title="Profile">
                        <i class="ti-user" aria-hidden="true"></i>
                      </a>
                    </li>
                    <!-- Username text link -->
                    <li class="nav-item">
                      <a href="profile.php" class="nav-link" title="Profile">
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                      </a>
                    </li>
                    <!-- Logout icon -->
                    <li class="nav-item">
                      <a href="logout.php" class="icons" title="Logout">
                        <i class="ti-power-off" aria-hidden="true"></i>
                      </a>
                    </li>
                  <?php } else { ?>
                    <li class="nav-item">
                      <a href="login.php" class="icons" title="Login">
                        <i class="ti-user" aria-hidden="true"></i>
                      </a>
                    </li>
                  <?php } ?>

                  <li class="nav-item">
                    <a href="wishlist.php" class="icons" <?php if (isset($_SESSION['user_id'])) { ?> title="Wishlist" <?php } else { ?> title="Login" <?php } ?> >
                      <i class="ti-heart" aria-hidden="true"></i>
                      <?php if ($wishlist_item_count > 0) { ?>
                        <sup class="icon-count"><?php echo (int)$wishlist_item_count; ?></sup>
                      <?php } ?>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            <div class="banner_text_box">
              <p class="sub text-uppercase">Books Collection</p>
              <h3><span>Find</span> Books That <br/> Matches <span>Your</span> Vibe</h3>
              <h4>Explore our curated picks for every mood, passion, and personality.</h4>
              <a class="main_btn mt-40" href="product.php">View Collection</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>