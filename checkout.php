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
  
  <!--================End Home Banner Area =================-->

  <!--================Home Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
              <h2>Checkout</h2>
              <p>Review your details and complete your order</p>
            </div>

            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="checkout.php">Product Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="checkout_area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="billing_details">
            <h3>Billing Details</h3>
            <form action="place_order.php" method="post">
              <div class="row contact_form" novalidate>
                <div class="col-md-12 form-group p_star">
                  <label for="addr">Address</label>
                  <textarea class="form-control" id="addr" name="address" rows="3" placeholder="House no, Street, Area" required></textarea>
                </div>
                <div class="col-md-6 form-group p_star">
                  <label for="country">Country</label>
                  <br>
                  <select id="country" name="country" class="form-control" required>
                    <option value="">Select country</option>
                    <option>India</option>
                    <option>Bangladesh</option>
                    <option>Pakistan</option>
                    <option>Nepal</option>
                    <option>Sri Lanka</option>
                  </select>
                </div>
                <div class="col-md-6 form-group p_star">
                  <label for="state">State</label>
                  <br>
                  <input type="text" class="form-control" id="state" name="state" placeholder="State" required />
                </div>
                <div class="col-md-6 form-group p_star">
                  <label for="city">City</label>
                  <br>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" required />
                </div>
                <div class="col-md-6 form-group p_star">
                  <label for="zip">Pincode (optional)</label>
                  <input type="text" class="form-control" id="zip" name="pincode" placeholder="Pincode" />
                </div>
              </div>
        </div>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
                <h2>Your Order</h2>
                <?php
                  include_once __DIR__ . '/include/config.php';
                  if (session_status() === PHP_SESSION_NONE) { session_start(); }
                  $cart = isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : [];
                  $items = [];
                  $subtotal = 0.0;
                  if (!empty($cart)) {
                    // Build an IN clause safely
                    $ids = [];
                    foreach ($cart as $pid => $qty) {
                      $pid = (int)$pid; $q = max(0, (int)$qty);
                      if ($pid > 0 && $q > 0) { $ids[$pid] = $q; }
                    }
                    if (!empty($ids)) {
                      $idList = implode(',', array_keys($ids));
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
                    }
                  }
                  $shipping = $subtotal > 0 ? 50.00 : 0.00; // flat rate
                  $total = $subtotal + $shipping;
                ?>
                <ul class="list">
                  <li>
                    <a href="#">Product <span>Total</span></a>
                  </li>
                  <?php if (!empty($items)): ?>
                    <?php foreach ($items as $it): ?>
                      <li>
                        <a href="single-product.php?id=<?php echo (int)$it['id']; ?>">
                          <?php echo htmlspecialchars($it['name']); ?>
                          <span class="middle">x <?php echo (int)$it['qty']; ?></span>
                          <span class="last">₹<?php echo number_format((float)$it['line'], 2); ?></span>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <li><a href="product.php">Your cart is empty. <span class="last">Add products</span></a></li>
                  <?php endif; ?>
                </ul>
                <ul class="list list_2">
                  <li>
                    <a href="#">Subtotal <span>₹<?php echo number_format((float)$subtotal, 2); ?></span></a>
                  </li>
                  <li>
                    <a href="#">Shipping <span><?php echo $shipping > 0 ? 'Flat rate: ₹' . number_format($shipping, 2) : 'Free'; ?></span></a>
                  </li>
                  <li>
                    <a href="#">Total <span>₹<?php echo number_format((float)$total, 2); ?></span></a>
                  </li>
                </ul>
                <div class="payment_item">
                  <div class="radion_btn">
                    <input type="radio" id="pay_cod" name="pay_method" checked />
                    <label for="pay_cod">Cash on Delivery</label>
                    <div class="check"></div>
                  </div>
                </div>
                <div class="payment_item">
                  <div class="radion_btn">
                    <input type="radio" id="pay_card" name="pay_method" />
                    <label for="pay_card">Credit/Debit Card</label>
                    <img src="img/product/single-product/card.jpg" alt="Cards" />
                    <div class="check"></div>
                  </div>
                </div>
                <div class="creat_account">
                  <input type="checkbox" id="terms_chk" name="terms" />
                  <label for="terms_chk">I’ve read and accept the </label>
                  <a href="#">terms & conditions*</a>
                </div>
                <a class="main_btn" href="place_order.php">Place Order</a>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </section>

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