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
      <h1>Chart.js</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Charts</li>
          <li class="breadcrumb-item active">Chart.js</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <p>Chart.JS Examples. You can check the <a href="https://www.chartjs.org/docs/latest/samples/" target="_blank">official website</a> for more examples.</p>
    <section class="section">
      <div class="row">
        <!-- Polar Area Chart -->
        <!-- PHP Code for data fetch from database -->
        <?php
        $sql_fetch_user_status = "SELECT * FROM user_data";
        $result_sql_fetch_user_status = mysqli_query($conn, $sql_fetch_user_status) or die("Query Failed!!");
        if (mysqli_num_rows($result_sql_fetch_user_status) > 0) {
          $userFetchDataRes = array();
          while ($row_sql_fetch_user_status = mysqli_fetch_assoc($result_sql_fetch_user_status)) {
            $userFetchDataRes[] = $row_sql_fetch_user_status['active_record'];
          }
          $total_count_of_users = mysqli_num_rows($result_sql_fetch_user_status);
          $active_user_count = count(array_filter($userFetchDataRes, function ($var) {
            return ($var == 'No');
          }));
          echo "<br>";
          $deactive_user_count = count(array_filter($userFetchDataRes, function ($var) {
            return ($var == 'Yes');
          }));
        } ?>
        <!-- PHP Code for data fetch from database -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Polar Area Chart</h5>
              <p>Total Users : <?php echo $total_count_of_users ?></p>
              <!-- Polar Area Chart -->
              <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#polarAreaChart'), {
                    type: 'polarArea',
                    data: {
                      labels: [
                        'Active Users',
                        'Deactive Users',
                      ],
                      datasets: [{
                        label: 'Users Count',
                        data: [<?php echo $active_user_count ?>, <?php echo $deactive_user_count ?>],
                        backgroundColor: [
                          'rgb(75, 192, 192)',
                          'rgb(255, 99, 132)',
                        ]
                      }]
                    }
                  });
                });
              </script>
              <!-- End Polar Area Chart -->
            </div>
          </div>
        </div>
        <!-- Polar Area Chart -->
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <!-- ======= Footer ======= -->
  <?php include('admin_footer.php') ?>