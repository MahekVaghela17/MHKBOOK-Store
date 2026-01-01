<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <?php
 include("include/style.php");
 // Prepare tracking lookup
 include_once(__DIR__ . '/include/config.php');
 $track_error = '';
 $track_order = null;
 $track_items = [];
 $sub_total = 0.0;
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $oid = isset($_POST['order']) ? (int)trim($_POST['order']) : 0;
   $email = isset($_POST['email']) ? trim($_POST['email']) : '';
   if ($oid <= 0) {
     $track_error = 'Please enter a valid Order ID.';
   } else {
     $emailSql = '';
     if ($email !== '') {
       $emailEsc = mysqli_real_escape_string($conn, $email);
       // Validate by user email (username), if order is linked to a registered user
       $emailSql = " AND (LOWER(u.username) = LOWER('{$emailEsc}'))";
     }
     $q = "SELECT o.* FROM orders o LEFT JOIN users u ON u.id = o.user_id WHERE o.id = " . $oid . $emailSql . " LIMIT 1";
     if ($res = mysqli_query($conn, $q)) {
       if ($res && mysqli_num_rows($res) === 1) {
         $track_order = mysqli_fetch_assoc($res);
       }
       mysqli_free_result($res);
     }
     if (!$track_order && $email !== '') {
       // Fallback: allow tracking by Order ID only (guest checkout), if email didn't match
       if ($res = mysqli_query($conn, "SELECT * FROM orders WHERE id = " . $oid . " LIMIT 1")) {
         if ($res && mysqli_num_rows($res) === 1) { $track_order = mysqli_fetch_assoc($res); }
         mysqli_free_result($res);
       }
     }
     if ($track_order) {
       // Load items
       $iq = "SELECT oi.product_id, oi.quantity, oi.unit_price, p.productname, p.image FROM order_items oi LEFT JOIN products p ON p.id = oi.product_id WHERE oi.order_id = " . (int)$track_order['id'] . " ORDER BY oi.id ASC";
       if ($ir = mysqli_query($conn, $iq)) {
         while ($row = mysqli_fetch_assoc($ir)) { $track_items[] = $row; }
         mysqli_free_result($ir);
       }
       foreach ($track_items as $it) { $sub_total += ((float)$it['unit_price']) * ((int)$it['quantity']); }
     } else if ($track_error === '') {
       $track_error = 'We could not find an order matching the provided details.';
     }
   }
 }
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

  <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given
                    to you on your receipt and in the confirmation email you should have received.</p>
                <form class="row tracking_form" action="tracking.php" method="post" novalidate="novalidate">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="order" name="order" placeholder="Order ID" value="<?php echo isset($_POST['order']) ? htmlspecialchars($_POST['order']) : ''; ?>">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Billing Email Address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="btn submit_btn">Track Order</button>
                    </div>
                </form>
                <?php if (!empty($track_error)): ?>
                  <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($track_error); ?></div>
                <?php endif; ?>
                <?php if ($track_order): ?>
                  <div class="card mt-4">
                    <div class="card-header">
                      <h4 class="mb-0">Order #<?php echo (int)$track_order['id']; ?> Status</h4>
                    </div>
                    <div class="card-body">
                      <p class="mb-2"><strong>Status:</strong> <?php echo htmlspecialchars($track_order['status']); ?></p>
                      <p class="mb-2"><strong>Placed on:</strong> <?php echo htmlspecialchars($track_order['created_at']); ?></p>
                      <hr />
                      <?php if (!empty($track_items)): ?>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Unit Price (₹)</th>
                                <th>Line Total (₹)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($track_items as $it): $line = ((float)$it['unit_price']) * ((int)$it['quantity']); ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td>
                                    <div class="d-flex align-items-center">
                                      <?php if (!empty($it['image'])): ?>
                                        <img src="img/products/<?php echo htmlspecialchars($it['image']); ?>" alt="" style="width:50px;height:50px;object-fit:contain;background:#fff;padding:4px;margin-right:8px;" />
                                      <?php endif; ?>
                                      <span><?php echo htmlspecialchars($it['productname']); ?></span>
                                    </div>
                                  </td>
                                  <td><?php echo (int)$it['quantity']; ?></td>
                                  <td><?php echo number_format((float)$it['unit_price'], 2); ?></td>
                                  <td><?php echo number_format((float)$line, 2); ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                        <?php $shipping = max(0.0, (float)$track_order['total_amount'] - $sub_total); ?>
                        <p class="mb-1 d-flex justify-content-between"><span>Subtotal</span> <span>₹<?php echo number_format((float)$sub_total, 2); ?></span></p>
                        <p class="mb-1 d-flex justify-content-between"><span>Shipping</span> <span><?php echo $shipping > 0 ? '₹'.number_format($shipping, 2) : 'Free'; ?></span></p>
                        <p class="mb-1 d-flex justify-content-between"><strong>Total</strong> <strong>₹<?php echo number_format((float)$track_order['total_amount'], 2); ?></strong></p>
                      <?php else: ?>
                        <p class="text-muted mb-0">No items found for this order.</p>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->
  
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