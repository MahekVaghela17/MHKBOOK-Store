<?php
session_start();

// Simple demo coupon codes. Extend with DB as needed.
$validCoupons = [
  'FLAT10' => ['type' => 'percent', 'value' => 10],   // 10% off
  'SAVE50' => ['type' => 'flat', 'value' => 50],      // ₹50 off
];

function redirect_back_default_cart() {
  $back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'cart.php';
  header('Location: ' . $back);
  exit;
}

// Handle POST/GET actions
$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_REQUEST['action']) ? strtolower(trim($_REQUEST['action'])) : '';
$code   = isset($_REQUEST['code']) ? strtoupper(trim($_REQUEST['code'])) : '';

if ($method === 'POST' || ($method === 'GET' && $action)) {
  if ($action === 'apply') {
    if ($code !== '' && isset($validCoupons[$code])) {
      $_SESSION['coupon'] = array_merge(['code' => $code], $validCoupons[$code]);
      $_SESSION['coupon_msg'] = 'Coupon applied: ' . htmlspecialchars($code);
    } else {
      $_SESSION['coupon_msg'] = 'Invalid or missing coupon code.';
    }
    redirect_back_default_cart();
  }

  if ($action === 'close' || $action === 'remove' || $action === 'clear') {
    unset($_SESSION['coupon']);
    $_SESSION['coupon_msg'] = 'Coupon removed.';
    redirect_back_default_cart();
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php include("include/style.php"); ?>
  <title>Coupon</title>
</head>
<body>
  <?php include("include/header.php"); ?>

  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Coupon</h2>
            <p>Apply a coupon to your cart</p>
          </div>
          <div class="page_link">
            <a href="index.php">Home</a>
            <a href="coupen.php">Coupon</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <?php if (!empty($_SESSION['coupon_msg'])): ?>
              <div class="alert alert-info" role="alert">
                <?php echo htmlspecialchars($_SESSION['coupon_msg']); unset($_SESSION['coupon_msg']); ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['coupon'])): ?>
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title mb-2">Current Coupon</h5>
                  <p class="mb-1"><strong>Code:</strong> <?php echo htmlspecialchars($_SESSION['coupon']['code']); ?></p>
                  <p class="mb-3">
                    <strong>Benefit:</strong>
                    <?php echo $_SESSION['coupon']['type'] === 'percent'
                      ? (int)$_SESSION['coupon']['value'] . '% off'
                      : '₹' . number_format((float)$_SESSION['coupon']['value'], 2); ?>
                  </p>
                  <form method="post" action="coupen.php" class="d-inline">
                    <input type="hidden" name="action" value="close" />
                    <button type="submit" class="gray_btn">Remove Coupon</button>
                  </form>
                  <a href="cart.php" class="main_btn">Back to Cart</a>
                </div>
              </div>
            <?php endif; ?>

            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-3">Apply Coupon</h5>
                <form method="post" action="coupen.php" class="row g-2">
                  <input type="hidden" name="action" value="apply" />
                  <div class="col-8">
                    <input type="text" name="code" class="form-control" placeholder="Enter coupon code (e.g., FLAT10)" required />
                  </div>
                  <div class="col-4">
                    <button type="submit" class="main_btn w-100">Apply</button>
                  </div>
                </form>
                <p class="mt-3 small text-muted">Demo codes: FLAT10 (10% off), SAVE50 (₹50 off)</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include("include/footer.php"); ?>
  <?php include("include/script.php"); ?>
</body>
</html>
