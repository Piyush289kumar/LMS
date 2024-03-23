<!-- Import Files -->
<?php include('admin_header.php');
include('private_files/system_configure_setting.php') ?>

<body>
  <!-- Nav Bar -->
  <?php include("navbar.php") ?>
  <!-- Nav Bar -->
  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>
  <!-- ======= Sidebar ======= -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <?php $user_id = $_SESSION['user_id'];
          $sql_show_user_overview = "SELECT * FROM user_data WHERE user_id = '{$user_id}' ";
          $result_sql_show_user_overview = mysqli_query($conn, $sql_show_user_overview) or die("Query Failed!!");
          if (mysqli_num_rows($result_sql_show_user_overview) > 0) {
            while ($row_user_overview = mysqli_fetch_assoc($result_sql_show_user_overview)) {
          ?>
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                  <img src="upload_media/users_profiles_picture/<?php echo $row_user_overview['profile_picture'] ?>" alt="Profile" class="rounded-circle">
                  <h2><?php echo $row_user_overview['full_name'] ?></h2>
                  <h3><?php echo $row_user_overview['designation'] ?></h3>
                  <div class="social-links mt-2">
                    <a href="<?php echo $row_user_overview['github'] ?>" class="linkedin"><i class="bi bi-github"></i></a>
                    <a href="<?php echo $row_user_overview['linkedin'] ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    <a href="<?php echo $row_user_overview['twitter'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="<?php echo $row_user_overview['fb'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $row_user_overview['insta'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo $row_user_overview['youtube'] ?>" class="instagram"><i class="bi bi-youtube"></i></a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link"><a style='color:#2c384e' href="users-profile-overview.php">Overview</a></button>
                </li>
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit"><a style='color:#2c384e' href="users-profile-edit.php">Edit Profile</a></button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <!-- Profile Edit Form -->
                <form>
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="upload_media/users_profiles_picture/<?php echo $row_user_overview['profile_picture'] ?>" alt="Profile" style='width:100px;'>
                      <div class="pt-2 px-3">
                        <input type="file" name="uploadfile" id="img" style="display:none;" />
                        <label for="img" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i>&#20;Upload new profile image</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $row_user_overview['full_name'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo $row_user_overview['about_text'] ?></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Designation</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="<?php echo $row_user_overview['designation'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $row_user_overview['phone'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?php echo $row_user_overview['email'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="github" class="col-md-4 col-lg-3 col-form-label">Github Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="github" type="text" class="form-control" id="github" value="<?php echo $row_user_overview['github'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="linkedin" value="<?php echo $row_user_overview['linkedin'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="Twitter" value="<?php echo $row_user_overview['twitter'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="text" class="form-control" id="Facebook" value="<?php echo $row_user_overview['fb'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="Instagram" value="<?php echo $row_user_overview['insta'] ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="youtube" class="col-md-4 col-lg-3 col-form-label">Youtube Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="youtube" type="text" class="form-control" id="youtube" value="<?php echo $row_user_overview['youtube'] ?>">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->
            <?php }
          } ?>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include('admin_footer.php') ?>