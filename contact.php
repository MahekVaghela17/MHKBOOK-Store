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

  <!--================ Feature Product Area =================-->
  
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
  
  <!--================ End Offer Area =================-->

      <!--================Home Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
              <h2>Contact Us</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="contact.php">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!-- ================ contact section start ================= -->
  <section class="section_gap">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <?php
          $rawAddress = isset($settingrow['address']) && trim($settingrow['address']) !== ''
            ? trim($settingrow['address'])
            : 'MHKBook Store';
          $mapQuery = urlencode($rawAddress);
          $mapSrc = 'https://www.google.com/maps?q=' . $mapQuery . '&z=14&output=embed';
        ?>
        <div class="map-responsive" style="position:relative;overflow:hidden;padding-bottom:56.25%;height:0;border-radius:18px;box-shadow:0 20px 35px rgba(15, 87, 34, 0.18);">
          <iframe
            title="Store location map"
            src="<?php echo htmlspecialchars($mapSrc, ENT_QUOTES, 'UTF-8'); ?>"
            style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
          <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'success'): ?>
              <div class="alert alert-success" role="alert">Your message has been sent. We'll get back to you soon.</div>
            <?php elseif ($_GET['status'] === 'error'): ?>
              <div class="alert alert-danger" role="alert"><?php echo isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'Something went wrong. Please try again.'; ?></div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="col-lg-8 mb-4 mb-lg-0">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
            </div>
            <div class="form-group mt-lg-3">
              <button type="submit" class="main_btn">Send Message</button>
            </div>
          </form>

          <?php
          // Show recent messages submitted via the contact form
          // Use existing DB connection if available, otherwise include it.
          if (!isset($conn)) {
            @require_once __DIR__ . '/include/config.php';
          }
          if (isset($conn) && $conn) {
            $res = @mysqli_query($conn, "SELECT name, email, subject, message, created_at FROM contact_messages ORDER BY id DESC LIMIT 5");
          }
          ?>
          <?php if (isset($res) && $res): ?>
            <div class="mt-5">
              <h4>Recent Messages</h4>
              <?php if (mysqli_num_rows($res) === 0): ?>
                <p class="text-muted">No messages yet.</p>
              <?php else: ?>
                <div class="list-group">
                  <?php while ($row = mysqli_fetch_assoc($res)): ?>
                    <div class="list-group-item">
                      <div class="d-flex justify-content-between">
                        <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                        <small class="text-muted"><?php echo htmlspecialchars($row['created_at']); ?></small>
                      </div>
                      <div><em><?php echo htmlspecialchars($row['subject']); ?></em></div>
                      <div><?php echo nl2br(htmlspecialchars($row['message'])); ?></div>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>


        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3><?php echo $settingrow['sitename']; ?></h3>
              <p><?php echo $settingrow['address']; ?></p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><?php echo $settingrow['phoneno']; ?></h3>
              <p>24/7</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><?php echo $settingrow['email']; ?></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->

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