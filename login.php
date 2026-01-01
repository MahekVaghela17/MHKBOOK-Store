<?php
  session_start();
  include_once('include/config.php');
  $login_error = '';
  $register_error = '';
  $register_success = '';
  // Ensure users.name column exists (only ALTER if missing)
  $__colRes = mysqli_query($conn, "SHOW COLUMNS FROM users LIKE 'name'");
  if ($__colRes && mysqli_num_rows($__colRes) === 0) {
    mysqli_query($conn, "ALTER TABLE users ADD COLUMN name VARCHAR(100) NOT NULL DEFAULT ''");
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : 'login';

    if ($action === 'register') {
      // Handle registration
      $reg_name     = isset($_POST['reg_name']) ? trim($_POST['reg_name']) : '';
      $reg_username = isset($_POST['reg_username']) ? trim($_POST['reg_username']) : '';
      $reg_password = isset($_POST['reg_password']) ? $_POST['reg_password'] : '';
      $reg_confirm  = isset($_POST['reg_confirm']) ? $_POST['reg_confirm'] : '';

      if ($reg_name === '' || $reg_username === '' || $reg_password === '' || $reg_confirm === '') {
        $register_error = 'Please fill in all fields.';
      } elseif (!filter_var($reg_username, FILTER_VALIDATE_EMAIL)) {
        $register_error = 'Please enter a valid email address.';
      } elseif (strlen($reg_password) < 6) {
        $register_error = 'Password must be at least 6 characters.';
      } elseif ($reg_password !== $reg_confirm) {
        $register_error = 'Passwords do not match.';
      } else {
        $uname = mysqli_real_escape_string($conn, $reg_username);
        $rname = mysqli_real_escape_string($conn, $reg_name);
        // Check if user already exists
        $chk = mysqli_query($conn, "SELECT id FROM users WHERE username='$uname' LIMIT 1");
        if ($chk && mysqli_num_rows($chk) > 0) {
          $register_error = 'An account with this email already exists.';
        } else {
          $pwdhash = md5($reg_password); // matches current login scheme
          $ins = mysqli_query($conn, "INSERT INTO users (name, username, password) VALUES ('$rname', '$uname', '$pwdhash')");
          if ($ins) {
            $register_success = 'Registration successful. You can now log in.';
          } else {
            $register_error = 'Registration failed. Please try again later.';
          }
        }
      }
    } else {
      // Handle login
      $username = isset($_POST['username']) ? trim($_POST['username']) : '';
      $password = isset($_POST['password']) ? $_POST['password'] : '';
      $remember = isset($_POST['remember']);

      if ($username !== '' && $password !== '') {
        // Sanitize and verify credentials (passwords stored as MD5 in seed data)
        $uname = mysqli_real_escape_string($conn, $username);
        $pwdhash = md5($password);
        $qry = "SELECT id, username FROM users WHERE username = '$uname' AND password = '$pwdhash' LIMIT 1";
        $res = mysqli_query($conn, $qry);
        if ($res && mysqli_num_rows($res) === 1) {
          $row = mysqli_fetch_assoc($res);
          $_SESSION['user_id'] = (int)$row['id'];
          $_SESSION['username'] = $row['username'];
          if ($remember) {
            // Simple remember-me: store username for convenience (not for auth)
            setcookie('remember_username', $row['username'], time() + (86400 * 30), '/');
          } else {
            if (isset($_COOKIE['remember_username'])) {
              setcookie('remember_username', '', time() - 3600, '/');
            }
          }
          header('Location: index.php');
          exit;
        } else {
          $login_error = 'Invalid email or password.';
        }
      } else {
        $login_error = 'Please enter both email and password.';
      }
    }
  }
?>
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

  <!--================ Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Login</h2>
            <p>Access your account to continue</p>
          </div>
          <div class="page_link">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Banner Area =================-->

  <section class="section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <ul class="nav nav-tabs mb-4" id="authTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login-pane" role="tab" aria-controls="login-pane" aria-selected="true">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-pane" role="tab" aria-controls="register-pane" aria-selected="false">Register</a>
                </li>
              </ul>

              <div class="tab-content" id="authTabContent">
                <div class="tab-pane fade show active" id="login-pane" role="tabpanel" aria-labelledby="login-tab">
                  <h4 class="mb-3">Welcome back</h4>
                  <?php if (!empty($login_error)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo htmlspecialchars($login_error); ?>
                    </div>
                  <?php } ?>
                  <?php if (!empty($register_success)) { ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo htmlspecialchars($register_success); ?>
                    </div>
                  <?php } ?>
                  <form id="loginForm" action="login.php" method="post" novalidate>
                    <input type="hidden" name="action" value="login" />
                    <div class="form-group">
                      <label for="username">Email</label>
                      <input type="email" class="form-control" id="username" name="username" placeholder="you@example.com" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : (isset($_COOKIE['remember_username']) ? htmlspecialchars($_COOKIE['remember_username']) : ''); ?>" required>
                      <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" minlength="6" required>
                      <small class="form-text text-muted">Must be at least 6 characters.</small>
                      <div class="invalid-feedback">Please enter your password (min 6 characters).</div>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                      </div>
                      <a href="contact.php" class="small">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </form>
                </div>

                <div class="tab-pane fade" id="register-pane" role="tabpanel" aria-labelledby="register-tab">
                  <h4 class="mb-3">Create an account</h4>
                  <?php if (!empty($register_error)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo htmlspecialchars($register_error); ?>
                    </div>
                  <?php } ?>
                  <form id="registerForm" action="login.php" method="post" novalidate>
                    <input type="hidden" name="action" value="register" />
                    <div class="form-group">
                      <label for="reg_name">Name</label>
                      <input type="text" class="form-control" id="reg_name" name="reg_name" placeholder="Your name" required>
                      <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="form-group">
                      <label for="reg_username">Email</label>
                      <input type="email" class="form-control" id="reg_username" name="reg_username" placeholder="you@example.com" required>
                      <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="form-group">
                      <label for="reg_password">Password</label>
                      <input type="password" class="form-control" id="reg_password" name="reg_password" minlength="6" placeholder="At least 6 characters" required>
                      <div class="invalid-feedback">Password must be at least 6 characters.</div>
                    </div>
                    <div class="form-group">
                      <label for="reg_confirm">Confirm Password</label>
                      <input type="password" class="form-control" id="reg_confirm" name="reg_confirm" minlength="6" placeholder="Re-enter password" required>
                      <div class="invalid-feedback">Passwords must match.</div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Register</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--================Home Banner Area =================-->
  
  <!--================End Home Banner Area =================-->

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
  <script>
    // Client-side validation for login and register
    (function($){
      $(function(){
        $('#loginForm').on('submit', function(e){
          var email = $('#username');
          var pwd = $('#password');
          var valid = true;

          if (!email.val() || email[0].validity.typeMismatch) {
            email.addClass('is-invalid');
            valid = false;
          } else {
            email.removeClass('is-invalid');
          }

          if (!pwd.val() || pwd.val().length < 6) {
            pwd.addClass('is-invalid');
            valid = false;
          } else {
            pwd.removeClass('is-invalid');
          }

          if (!valid) {
            e.preventDefault();
            e.stopPropagation();
          }
        });

        $('#registerForm').on('submit', function(e){
          var name = $('#reg_name');
          var email = $('#reg_username');
          var pwd = $('#reg_password');
          var cf  = $('#reg_confirm');
          var valid = true;

          if (!name.val()) {
            name.addClass('is-invalid');
            valid = false;
          } else {
            name.removeClass('is-invalid');
          }

          if (!email.val() || email[0].validity.typeMismatch) {
            email.addClass('is-invalid');
            valid = false;
          } else {
            email.removeClass('is-invalid');
          }

          if (!pwd.val() || pwd.val().length < 6) {
            pwd.addClass('is-invalid');
            valid = false;
          } else {
            pwd.removeClass('is-invalid');
          }

          if (!cf.val() || cf.val() !== pwd.val()) {
            cf.addClass('is-invalid');
            valid = false;
          } else {
            cf.removeClass('is-invalid');
          }

          if (!valid) {
            e.preventDefault();
            e.stopPropagation();
          }
        });

        // Clear validation state on input
        $('#loginForm input, #registerForm input').on('input', function(){
          $(this).removeClass('is-invalid');
        });
      });
    })(jQuery);
  </script>
</body>

</html>
