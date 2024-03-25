<!-- Import Files -->
<?php include('admin_header.php');
include('private_files/system_configure_setting.php'); ?>

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
              <form class="row g-3">
                <div class="col-md-12 border-top">
                  <p class="card-text p-1 pt-4"><i class="bi bi-1-circle"></i> Step</p>
                </div>
                <div class="col-md-8">
                  <div class="form-floating mt-3">
                    <input type="text" class="form-control" id="floatingName" placeholder="Course Name" name='course_name'>
                    <label for="floatingName">Course Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="formFile" class="form-label">Course Poster</label>
                  <input class="form-control" type="file" id="formFile">
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
                    <input type="number" class="form-control py-3" placeholder="Course Price" aria-label="Amount (to the nearest rupess)" name='Course Price'>
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
                    <input type="number" class="form-control py-3" placeholder="Estimated Price" name='estimated_price'>
                    <div class="input-group-append">
                      <span class="input-group-text py-3">.00</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="number" class="form-control py-3" placeholder="Course Discount" name='discount'>
                    <div class="input-group-append">
                      <span class="input-group-text py-3">%</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="category" name='category'>
                      <option selected disabled>DSA / WEB DEV</option>
                      <option value="1">DSA</option>
                      <option value="2">WEB DEV</option>
                    </select>
                    <label for="floatingSelect">Course Category</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="level" name='level'>
                      <option selected disabled>Beinner/ Intermediate / Expert</option>
                      <option value="1">Beinner</option>
                      <option value="2">Intermediate</option>
                      <option value="3">Expert</option>
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
                    <input type="text" class="form-control" id="floatingEmail" placeholder="First Feature" name='ffi'>
                    <label for="floatingEmail">First Feature</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Second Feature" name='fs'>
                    <label for="floatingEmail">Second Feature</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Third Feature" name='ft'>
                    <label for="floatingEmail">Third Feature</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Fourth Feature" name='ff'>
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
                  <button type="submit" class="btn btn-primary">Submit</button>
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