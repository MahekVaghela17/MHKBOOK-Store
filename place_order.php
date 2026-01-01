<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php include("include/style.php"); ?>
  <title>Order Confirmation</title>
</head>
<body>
  <?php include("include/header.php"); ?>
  <?php
    include_once __DIR__ . '/include/config.php';

    // Email notifications disabled; configuration removed

    // Email sending helper removed

    // Pull cart from session
    $cart = isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // If cart empty, show message and link back
    if (empty($cart)) {
      echo '<section class="section_gap_top section_gap_bottom_custom"><div class="container text-center"><h3>Your cart is empty</h3><p><a class="main_btn mt-3" href="product.php">Browse Products</a></p></div></section>';
      include("include/footer.php");
      include("include/script.php");
      echo '</body></html>';
      exit;
    }

    // Build items list and compute totals
    $ids = [];
    foreach ($cart as $pid => $qty) {
      $pid = (int)$pid; $q = max(0, (int)$qty);
      if ($pid > 0 && $q > 0) { $ids[$pid] = $q; }
    }

    if (empty($ids)) {
      echo '<section class="section_gap_top section_gap_bottom_custom"><div class="container text-center"><h3>Your cart has no valid items</h3><p><a class="main_btn mt-3" href="product.php">Browse Products</a></p></div></section>';
      include("include/footer.php");
      include("include/script.php");
      echo '</body></html>';
      exit;
    }

    $idList = implode(',', array_keys($ids));

    $items = [];
    $subtotal = 0.0;
    $qry = "SELECT id, productname, productprice FROM products WHERE id IN ($idList) ORDER BY FIELD(id, $idList)";
    if ($res = mysqli_query($conn, $qry)) {
      while ($row = mysqli_fetch_assoc($res)) {
        $pid = (int)$row['id'];
        $qty = isset($ids[$pid]) ? (int)$ids[$pid] : 0;
        $price = (float)$row['productprice'];
        $line = $qty * $price;
        $subtotal += $line;
        $items[] = [
          'id' => $pid,
          'name' => $row['productname'],
          'qty' => $qty,
          'price' => $price,
          'line' => $line,
        ];
      }
      mysqli_free_result($res);
    }

    $shipping = $subtotal > 0 ? 50.00 : 0.00; // Flat rate for now
    $total = $subtotal + $shipping;

    // Prepare to insert order and items
    $user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;
    $order_id = null;
    $error = null;

    mysqli_begin_transaction($conn);
    try {
      // Insert into orders (assumes orders table exists with matching columns)
      $userVal = isset($user_id) ? $user_id : 'NULL';
      $sqlOrder = "INSERT INTO orders (user_id, total_amount, status, created_at) VALUES ($userVal, $total, 'pending', NOW())";
      if (!mysqli_query($conn, $sqlOrder)) {
        throw new Exception('Failed to create order: ' . mysqli_error($conn));
      }
      $order_id = (int)mysqli_insert_id($conn);

      // Insert items
      foreach ($items as $it) {
        if ($it['qty'] <= 0) { continue; }
        $pid = (int)$it['id'];
        $qty = (int)$it['qty'];
        $price = (float)$it['price'];
        $sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES ($order_id, $pid, $qty, $price)";
        if (!mysqli_query($conn, $sqlItem)) {
          throw new Exception('Failed to add order item: ' . mysqli_error($conn));
        }
      }

      mysqli_commit($conn);
      // Clear cart
      $_SESSION['cart'] = [];
    } catch (Exception $ex) {
      mysqli_rollback($conn);
      $error = $ex->getMessage();
    }
  ?>

  <section class="section_gap">
    <div class="container">
      <?php if ($error): ?>
        <div class="alert alert-danger" role="alert">
          There was an error placing your order. Please try again.<br />
          <small><?php echo htmlspecialchars($error); ?></small>
        </div>
        <a href="checkout.php" class="btn btn-outline-primary">Back to Checkout</a>
      <?php else: ?>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card shadow-sm">
              <div class="card-body">
                <h3 class="mb-3">Thank you! Your order has been placed.</h3>
                <p class="mb-1">Order ID: <strong>#<?php echo (int)$order_id; ?></strong></p>
                <p class="text-muted">You will receive an update once your order is processed.</p>
                <?php if ($emailNotices['customer'] && $customerEmail): ?>
                  <div class="alert alert-success" role="alert">
                    A confirmation email has been sent to <strong><?php echo htmlspecialchars($customerEmail, ENT_QUOTES, 'UTF-8'); ?></strong>.
                  </div>
                <?php elseif ($customerEmail && !$emailNotices['customer']): ?>
                  <div class="alert alert-warning" role="alert">
                    We were unable to send an email to <?php echo htmlspecialchars($customerEmail, ENT_QUOTES, 'UTF-8'); ?>. Please contact support if you need a receipt.
                  </div>
                <?php endif; ?>
                <hr />
                <h5 class="mb-3">Order Summary</h5>
                <ul class="list-group mb-3">
                  <?php foreach ($items as $it): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <span><?php echo htmlspecialchars($it['name']); ?> &times; <?php echo (int)$it['qty']; ?></span>
                      <span>₹<?php echo number_format((float)$it['line'], 2); ?></span>
                    </li>
                  <?php endforeach; ?>
                  <li class="list-group-item d-flex justify-content-between">
                    <strong>Subtotal</strong>
                    <span>₹<?php echo number_format((float)$subtotal, 2); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <strong>Shipping</strong>
                    <span><?php echo $shipping > 0 ? '₹' . number_format($shipping, 2) : 'Free'; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>₹<?php echo number_format((float)$total, 2); ?></strong>
                  </li>
                </ul>
                <a href="product.php" class="main_btn">Continue Shopping</a>
                <a href="index.php" class="btn btn-link">Home</a>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php include("include/footer.php"); ?>
  <?php include("include/script.php"); ?>
</body>
</html>
