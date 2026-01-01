<?php session_start(); ?>
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

  <!-- Start feature Area -->
  
  <!-- End feature Area -->

  <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Cart</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="cart.php">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include_once('include/config.php');
                  $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                  $ids = array_filter(array_map('intval', array_keys($cart)));
                  $subtotal = 0.0;
                  if (!empty($ids)) {
                    $idList = implode(',', $ids);
                    $qry = "SELECT id, productname, productprice, image FROM products WHERE id IN ($idList) ORDER BY id ASC";
                    $res = mysqli_query($conn, $qry);
                    if ($res && mysqli_num_rows($res) > 0) {
                      while($prow = mysqli_fetch_assoc($res)) {
                        $pid = (int)$prow['id'];
                        $qty = max(1, (int)$cart[$pid]);
                        $line = ((float)$prow['productprice']) * $qty;
                        $subtotal += $line;
                ?>
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img src="img/products/<?php echo htmlspecialchars($prow['image']); ?>" alt="<?php echo htmlspecialchars($prow['productname']); ?>" style="width:80px;height:auto;object-fit:cover;" />
                      </div>
                      <div class="media-body">
                        <p><?php echo htmlspecialchars($prow['productname']); ?></p>
                        <a href="update_cart.php?action=remove&id=<?php echo (int)$pid; ?>" class="small">Remove</a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>₹<?php echo number_format((float)$prow['productprice'], 2); ?></h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <a href="update_cart.php?action=dec&id=<?php echo (int)$pid; ?>" class="reduced items-count" aria-label="Decrease quantity">
                        <i class="lnr lnr-chevron-down"></i>
                      </a>
                      <input type="text" name="qty" id="sst" maxlength="12" value="<?php echo (int)$qty; ?>" title="Quantity:" class="input-text qty" readonly />
                      <a href="update_cart.php?action=inc&id=<?php echo (int)$pid; ?>" class="increase items-count" aria-label="Increase quantity">
                        <i class="lnr lnr-chevron-up"></i>
                      </a>
                    </div>
                  </td>
                  <td>
                    <h5>₹<?php echo number_format($line, 2); ?></h5>
                  </td>
                </tr>
                <?php } } } else { ?>
                <tr>
                  <td colspan="4" class="text-center">
                    <h4>Your cart is empty.</h4>
                  </td>
                </tr>
                <?php } ?>
                <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" href="update_cart.php">Update Cart</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <?php $shipping = ($subtotal >= 500) ? 0.0 : 50.0; $grandTotal = $subtotal + $shipping; ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>₹<?php echo number_format($subtotal, 2); ?></h5>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td>
                    <h5>₹<?php echo number_format($shipping, 2); ?></h5>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Grand Total</h5>
                  </td>
                  <td>
                    <h5>₹<?php echo number_format($grandTotal, 2); ?></h5>
                  </td>
                </tr>
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="index.php">Continue Shopping</a>
                      <a class="main_btn" href="checkout.php">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->


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