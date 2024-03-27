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
      <h1>Analysis Center</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Analysis Center</li>
          <li class="breadcrumb-item active">Administrative Data Analysis</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row pt-4">
        <!-- PHP Code for data fetch from database -->
        <?php
        $sql_fetch_teams = "SELECT team.team_id, team.team_name, team_member.enroll_team_id, COUNT(team_member.enroll_team_id) AS num_of_member FROM team
        INNER JOIN team_member ON team.team_id = team_member.enroll_team_id
        WHERE team.active_record = 'Yes' AND team_member.active_record = 'Yes'
        GROUP BY team_member.enroll_team_id";
        $result_sql_fetch_teams = mysqli_query($conn, $sql_fetch_teams) or die("Query Failed!!");
        if (mysqli_num_rows($result_sql_fetch_teams) > 0) {
          $teamFetchResTeamsName = array();
          $teamFetchResTeamsMemberCount = array();
          while ($row_sql_fetch_teams = mysqli_fetch_assoc($result_sql_fetch_teams)) {
            $teamFetchResTeamsName[] = $row_sql_fetch_teams['team_name'];
            $teamFetchResTeamsMemberCount[] = $row_sql_fetch_teams['num_of_member'];
          }
          $total_count_of_team = mysqli_num_rows($result_sql_fetch_teams);
        } ?>
        <!-- PHP Code for data fetch from database -->
        <!-- Bar Chart -->
        <div class="col-lg-6" style='cursor: pointer;'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teams Data</h5>
              <p>Total Teams: <?php echo $total_count_of_team ?></p>
              <div id="barChart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#barChart"), {
                    series: [{
                      data: <?php echo print_r(json_encode($teamFetchResTeamsMemberCount), true) ?>
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        borderRadius: 4,
                        horizontal: true,
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    xaxis: {
                      categories: <?php echo print_r(json_encode($teamFetchResTeamsName), true) ?>,
                    }
                  }).render();
                });
              </script>
            </div>
          </div>
        </div>
        <!-- End Bar Chart -->
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include('admin_footer.php') ?>