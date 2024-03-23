<!-- Import Files -->
<?php include('admin_header.php');
include('private_files/system_configure_setting.php') ?>
<!-- Login Back-End Code -->
<!-- Form Start -->
<?php
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $sql_user_pass_cheack = "SELECT user_id, username, password, role, designation, profile_picture FROM user_data WHERE username = '{$username}' AND password = '{$pass}'" or die("Query Failed!! --> sql_user_pass_cheack");
  $result_sql_user_pass_cheack = mysqli_query($conn, $sql_user_pass_cheack);
  if (mysqli_num_rows($result_sql_user_pass_cheack) > 0) {
    while ($row = mysqli_fetch_assoc($result_sql_user_pass_cheack)) {
      session_start();
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['user_role'] = $row['role'];
      $_SESSION['user_designation'] = $row['designation'];
      $_SESSION['user_profile_picture'] = $row['profile_picture'];
      echo "<script>window.location.href='$hostname/admin'</script>";
?>
      <script>
        alert('Login successfully !!')
      </script>
    <?php
    }
  } else { ?>
<?php
    echo ("<div class='d-flex justify-content-center' style='margin-bottom:-120px; padding-top:60px;'><p class='btn btn-danger'>Invalid username and password!!</p></div>");
  }
}
?>
<!-- Login Back-End Code -->
<?php ?>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt=<?php echo $website_display_default_name; ?>>
                  <span class="d-none d-lg-block"><?php echo $website_display_default_name; ?></span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name='login'>Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Import Copyright File -->
              <?php include('copyright/copyright.php') ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Import Vendor JS links -->
  <?php include('admin_footer_vendor_links.php') ?>