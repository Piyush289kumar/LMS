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
      <h1>Discussion lobby</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Discussion Lobby</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4 overflow-y-auto" style='height:75vh;'>
          <?php
          for ($i = 0; $i <= 10; $i++) {
          ?>
            <!-- Card Element -->
            <div class="card-body profile-card border pt-4 mb-2 d-flex align-items-center gap-3 rounded-2 bg-white shadow-sm" style='cursor: pointer;'>
              <img src=" upload_media/users_profiles_picture/default_user_profile.png" alt="Profile" style="width: 45px; height:45px" class="rounded-circle">
              <div class='d-flex justify-content-between align-items-center w-100'>
                <h5 class='fw-semibold h6'>@Piyushkumar</h5>
                <p style='font-size: 12px;' class='pt-2'><em>14:26 PM</em></p>
              </div>
            </div>
            <!-- Card Element -->
          <?php
          }
          ?>
        </div>



        <!-- Conversation Screen -->
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3" style='height:75vh; cursor:pointer;'>

              <!-- Header of Chat -->
              <!-- Card Element -->
              <div class="profile-card border p-2 mb-2 d-flex align-items-center gap-3 rounded-2 bg-white shadow-sm" style='cursor: pointer;'>
                <img src=" upload_media/users_profiles_picture/default_user_profile.png" alt="Profile" style="width: 30px; height:30px" class="rounded-circle">
                <h5 class='fw-semibold h6 pt-2'>@Piyushkumar</h5>

              </div>
              <!-- Card Element -->
              <!-- Header of Chat -->

              <div style="height: 80%; background-color: #EAEAEA;" class='rounded-2 overflow-y-scroll p-4'>

                <p class='text-dark '>Message Message Message Message Message Message Message Message Message Message Message Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>
                <p class='text-dark '>Message</p>

              </div>

              <form action="">
                <div class='d-flex justify-content-between align-items-center gap-2 mt-2'>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-left-text"></i></span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                  </div>
                  <div>
                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-send-fill"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Conversation Screen -->




        <!-- Default Screen -->
        <!-- <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3 d-flex flex-column justify-content-center align-items-center" style='height:75vh; cursor:pointer;'>
              <i class="bi bi-chat-left-text display-1 "></i>
              <p class="h6 fw-semibold">Start a new team conversation</p>
            </div>
          </div>
        </div> -->
        <!-- Default Screen -->

      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include('admin_footer.php') ?>