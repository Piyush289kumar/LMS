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
  <!-- INSERT CHAT CODE -->
  <?php
  echo date('d-m-y h:m:s');
  if (isset($_POST['save'])) {
    try {
      date_default_timezone_set("Asia/Kolkata");
      $dateObject = new DateTime(date("h:m", time()));
      $time = $dateObject->format('h:i A');
      $date = Date('d-m-Y');
      $chat_text = mysqli_real_escape_string($conn, $_POST['chat_text']);
      $sender_id = $_SESSION['user_id'];
      $receiver_id = 17;
      $sql_insert_chat = "INSERT INTO chat (chat_text, sender_id, receiver_id, chat_time, chat_date)
                            VALUES ('{$chat_text}','{$sender_id}', '{$receiver_id}','{$time}','{$date}')";
      if (mysqli_query($conn, $sql_insert_chat)) {
        echo "<script>window.location.href='$hostname/admin/discussion_lobby.php'</script>";
      } else {
        throw new Exception("Message not send.");
      }
    } catch (\Throwable $th) {
      echo ("<div class='d-flex justify-content-center position-fixed' style='top:200px; right:35px;'><p class='btn btn-danger'>Error: " . $th->getMessage() . "</p></div>");
    }
  }
  ?>
  <!-- INSERT CHAT CODE -->
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
              <div class='rounded-2 p-3 chartBox card mb-3' style="height: 80%; overflow-y: scroll;">
                <?php
                for ($i = 0; $i < 10; $i++) {
                ?>
                  <div class='d-flex flex-wrap justify-content-between align-items-center w-75 btn btn-primary pt-3 pb-0 mb-2'>
                    <p>Message Message Message</p>
                    <em style='font-size: 13px;'>14:26 PM</em>
                  </div>
                <?php
                }
                ?>
              </div>
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class='d-flex justify-content-between align-items-center gap-2'>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-left-text"></i></span>
                    <input type="text" class="form-control" placeholder='Type a message' name="chat_text">
                  </div>
                  <div>
                    <button type="submit" name="save" class="btn btn-outline-primary"><i class="bi bi-send-fill"></i></button>
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