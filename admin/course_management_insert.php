<!-- Import Files -->
<?php include('admin_header.php');
include('private_files/system_configure_setting.php');
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>

<!-- PHP Code for Insert Course Record -->

<!-- User Update Back-End Code -->
<?php
if (isset($_POST['save'])) {

  if (isset($_FILES['fileToUpload'])) {
    if ($_FILES['fileToUpload']["size"] > 10485760) {
      echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
    }
    $info = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if (isset($info['mime'])) {
      if ($info['mime'] == "image/jpeg") {
        $img = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
      } elseif ($info['mime'] == "image/png") {
        $img = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
      } elseif ($info['mime'] == "image/webp") {
        $img = imagecreatefromwebp($_FILES['fileToUpload']['tmp_name']);
      } else {
        echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
      }
      if (isset($img)) {
        $output_img = date("d_m_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload']["name"]) . ".webp";
        imagewebp($img, "upload_media/courses_poster/" . $output_img, 100);

        $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);

        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $course_price = mysqli_real_escape_string($conn, $_POST['course_price']);
        $estimated_price = mysqli_real_escape_string($conn, $_POST['estimated_price']);
        $discount = mysqli_real_escape_string($conn, $_POST['discount']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $level = mysqli_real_escape_string($conn, $_POST['level']);
        $course_tags = mysqli_real_escape_string($conn, $_POST['course_tags']);
        $flo = mysqli_real_escape_string($conn, $_POST['flo']);
        $slo = mysqli_real_escape_string($conn, $_POST['slo']);
        $tlo = mysqli_real_escape_string($conn, $_POST['tlo']);
        $fpr = mysqli_real_escape_string($conn, $_POST['fpr']);
        $spr = mysqli_real_escape_string($conn, $_POST['spr']);
        $tpr = mysqli_real_escape_string($conn, $_POST['tpr']);
        $first_feature = mysqli_real_escape_string($conn, $_POST['first_feature']);
        $second_feature = mysqli_real_escape_string($conn, $_POST['second_feature']);
        $third_feature = mysqli_real_escape_string($conn, $_POST['third_feature']);
        $fourth_feature = mysqli_real_escape_string($conn, $_POST['fourth_feature']);
        $resource = mysqli_real_escape_string($conn, $_POST['resource']);
        $date = Date('d-m-Y');

        echo $sql_insert_course = "INSERT INTO course (title, main_price, sell_price, discount, learning_skill_1, learning_skill_2, learning_skill_3, feature_1, feature_2, feature_3, feature_4, skill_tags, category, level, prerequisties_1, prerequisties_2, prerequisties_3, resource_link, entry_date, user_id, user_email, poster) VALUES ('{$course_name}','{$estimated_price}', '{$course_price}', '{$discount}', '{$flo}', '{$slo}', '{$tlo}','{$first_feature}', '{$second_feature}','{$third_feature}', '{$fourth_feature}','{$course_tags}', '{$category}', '{$level}', '{$fpr}', '{$spr}', '{$tpr}', '{$resource}', '{$date}', '{$user_id}','{$email}','{$output_img}')";

        if (mysqli_query($conn, $sql_insert_course)) {
?>
          <script>
            alert('Course is Inserted successfully !!')
          </script>
        <?php
          // echo "<script>window.location.href='$hostname/admin/users-profile-edit.php'</script>";
        } else {
        ?>
          <script>
            alert('Course is not Insert !!')
          </script>
<?php
        }
      }
    }
  }
}
?>
<!-- PHP Code for Insert Course Record -->

<body>
  <!-- ======= Header ======= -->
  <!-- Nav Bar -->
  <?php include("navbar.php") ?>
  <!-- Nav Bar -->
  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>
  <!-- ======= Sidebar ======= -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Course Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Course Management</li>
          <li class="breadcrumb-item active">Create a New Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create a New Course</h5>
              <!-- Floating Labels Form -->
              <form class="row g-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="on">
                <div class="col-md-12 border-top">
                  <p class="card-text p-1 pt-4"><i class="bi bi-1-circle"></i> Step</p>
                </div>
                <div class="col-md-8">
                  <div class="form-floating mt-3">
                    <input type="text" class="form-control" id="floatingName" placeholder="Course Name" name='course_name' required>
                    <label for="floatingName">Course Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="formFile" class="form-label">Course Poster</label>
                  <input class="form-control" type="file" name="fileToUpload" id="formFile" required>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <!-- Start Quill Editor Full -->
                    <div class="quill-editor-full" name='description' style='min-height: 200px;'>
                      <h3>Course Description</h3>
                    </div>
                  </div>
                  <!-- End Quill Editor Full -->
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text py-3">₹</span>
                    </div>
                    <input type="number" class="form-control py-3" placeholder="Course Price" aria-label="Amount (to the nearest rupess)" name='course_price' required>
                    <div class="input-group-append">
                      <span class="input-group-text py-3">.00</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text py-3">₹</span>
                    </div>
                    <input type="number" class="form-control py-3" placeholder="Estimated Price" name='estimated_price' required>
                    <div class="input-group-append">
                      <span class="input-group-text py-3">.00</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="number" class="form-control py-3" placeholder="Course Discount" name='discount' required>
                    <div class="input-group-append">
                      <span class="input-group-text py-3">%</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="category" name='category'>
                      <option selected disabled>DSA / WEB DEV</option>
                      <option value="DSA">DSA</option>
                      <option value="WEB_DEV">WEB DEV</option>
                    </select>
                    <label for="floatingSelect">Course Category</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="level" name='level'>
                      <option selected disabled>Beginner/ Intermediate / Expert</option>
                      <option value="Beginner">Beginner</option>
                      <option value="Intermediate">Intermediate</option>
                      <option value="Expert">Expert</option>
                    </select>
                    <label for="floatingSelect">Course Level</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Course Tags" name='course_tags'>
                    <label for="floatingEmail">Course Tags</label>
                  </div>
                </div>
                <div class="col-md-12 border-top">
                  <p class="card-text p-1 pt-4"><i class="bi bi-2-circle"></i> Step</p>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="First Learning objective" name='flo'>
                    <label for="floatingEmail">First Learning objective</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Second Learning objective" name='slo'>
                    <label for="floatingEmail">Second Learning objective</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Third Learning objective" name='tlo'>
                    <label for="floatingEmail">Third Learning objective</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="First Learning objective" name='fpr'>
                    <label for="floatingEmail">First Pre-requisites</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Second Pre-requisites" name='spr'>
                    <label for="floatingEmail">Second Pre-requisites</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Third Pre-requisites" name='tpr'>
                    <label for="floatingEmail">Third Pre-requisites</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="First Feature" name='first_feature'>
                    <label for="floatingEmail">First Feature</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Second Feature" name='second_feature'>
                    <label for="floatingEmail">Second Feature</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Third Feature" name='third_feature'>
                    <label for="floatingEmail">Third Feature</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Fourth Feature" name='fourth_feature'>
                    <label for="floatingEmail">Fourth Feature</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Resource" name='resource'>
                    <label for="floatingEmail">Resource</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="save" required>Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include('admin_footer.php') ?>