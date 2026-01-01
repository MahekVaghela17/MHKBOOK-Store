<?php
session_start();
include_once('include/config.php');

// Require login
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$uid = (int)$_SESSION['user_id'];
$q = "SELECT id, username FROM users WHERE id = $uid LIMIT 1";
$res = mysqli_query($conn, $q);
$user = $res && mysqli_num_rows($res) === 1 ? mysqli_fetch_assoc($res) : ['id' => $uid, 'username' => $_SESSION['username']];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php include('include/style.php'); ?>
</head>

<body>
  <!--================Header Menu Area =================-->
  <?php include('include/header.php'); ?>
  <!--================Header Menu Area =================-->

  <!--================ Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>My Profile</h2>
            <p>Account overview</p>
          </div>
          <div class="page_link">
            <a href="index.php">Home</a>
            <a href="profile.php">Profile</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Banner Area =================-->

  <section class="section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h4 class="mb-4">Account Details</h4>
              <div class="form-group">
                <label>User ID</label>
                <input type="text" class="form-control" value="<?php echo (int)$user['id']; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
              </div>
              <div class="d-flex justify-content-between mt-4">
                <a href="category.php" class="btn btn-outline-primary">Continue Shopping</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('include/footer.php'); ?>
  <?php include('include/script.php'); ?>
</body>

</html>
