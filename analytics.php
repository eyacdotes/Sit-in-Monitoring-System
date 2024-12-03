<?php include('connector_db.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - Generate Port</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <style>
    @media print {
      body * {
        visibility: hidden;
      }
      .print-container, .print-container * {
        visibility: visible;
      }

      .print-container {
        position: static;
      }

      .print-container table {
        margin-top: 0; 
        width: 100%; 
      }

      .print-container .btn {
        display: none;
      }

      .print-container #printDate {
        margin-top: 0; 
      }
    }
    .print-container .card-body table {
        width: 100% !important;
        margin-top: 0 !important;
      }
  </style>
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="adminreport.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">UC Sit-in System</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="btn-group" style="left: 76%;">
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/adminlogo.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Admin</h6>
                            <span>UC Lab Room Administrator</span>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="index.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div> 
  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-trello"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Other</li>
      
      <li class="nav-item">
        <a class="nav-link " href="adminsearch.php">
          <i class="bi bi-search"></i>
          <span>Search</span>
        </a>
      </li>

      <li class="nav-item">
      <a class="nav-link collapsed" href="admindelete.php">
          <i class="bi bi-x-square"></i>
          <span>Delete</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="resetsession.php">
          <i class="bi bi-arrow-repeat"></i>
          <span>Reset Session</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="resetpass.php">
          <i class="bi bi-asterisk"></i>
          <span>Security</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminsession.php">
          <i class="bi bi-question-circle"></i>
          <span>View Sit-in Session</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminsitin.php">
          <i class="bi bi-envelope"></i>
          <span>View Sit-in Records</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminreport.php">
          <i class="bi bi-archive"></i>
          <span>Generate Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="postannounce.php">
          <i class="bi bi-blockquote-right"></i>
          <span>Post Announcement</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="adminfeedback.php">
          <i class="bi bi-calendar2"></i>
          <span>View Feedbacks and Reports</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="analytics.php">
          <i class="bi bi-pie-chart"></i>
          <span>Daily Analytics and Reports</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="reserveadmin.php">
          <i class="bi bi-terminal-split"></i>
          <span>Reservation Approval</span>
        </a>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Reports</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Reports</li>
        </ol>
      </nav>
    </div>
  <!--THIS SHOULD BE PRINTED AS PDF-->
  <div class="print-container">
    <div class="card">
      <div class="card-body" style='font-family: "Poppins", sans-serif;'>
        <h5 class="card-title">Daily Reports</h5>
        <div id="printDate">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Student ID</th>
                <th scope="col">Course</th>
                <th scope="col">Year Level</th>
                <th scope="col">Room</th>
                <th scope="col">Purpose</th>
                <th scope="col">Time in</th>
                <th scope="col">Time out</th>
              </tr>
            </thead>
                      <tbody>
                      <?php
                        $dayOfMonth = '05-24'; // change this manually to display data (TABLE)

                        $rowsPerPage = 10; 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1; 
                        $offset = ($page - 1) * $rowsPerPage;

                        $sqlCount = "SELECT COUNT(*) AS count FROM endedsessions WHERE DATE_FORMAT(sit_in_time, '%m-%d') = '$dayOfMonth'";
                        $resultCount = mysqli_query($db, $sqlCount);
                        $rowCount = mysqli_fetch_assoc($resultCount)['count'];

                        $sql = "SELECT * FROM endedsessions WHERE DATE_FORMAT(sit_in_time, '%m-%d') = '$dayOfMonth'";

                        $sql .= " ORDER BY sit_out_time DESC LIMIT $offset, $rowsPerPage";
                        $result = mysqli_query($db, $sql);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['id_number'] . "</td>";
                                    echo "<td>" . $row['course'] . "</td>";
                                    echo "<td>" . $row['year'] . "</td>";
                                    echo "<td>" . $row['lab_room'] . "</td>";
                                    echo "<td>" . $row['purpose'] . "</td>";
                                    $time_in = date("M d, h:i:s A", strtotime($row['sit_in_time']));
                                    echo "<td>" . $time_in . "</td>";
                                    $time_out = date("h:i:s A", strtotime($row['sit_out_time']));
                                    echo "<td>" . $time_out . "</td>";  
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='10'>No sessions found for May 24th.</td></tr>";
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($db);
                        }

                        mysqli_close($db);
                        ?>
                      </tbody>
                  </table>
              </div>
            <button class="btn btn-primary" style="margin-left: 95%;" onclick="window.print()">Print</button>
        </div>
    </div>
          <!-- body for pie-chjart -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ANALYTICS AND REPORTS</h5>
              <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
            </div>
          </div>
          <!--PAGINATION PART-->
          <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php
                    $totalPages = ceil($rowCount / $rowsPerPage);
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $currentPage = ($page == $i) ? 'active' : '';
                        $pageLink = ($currentPage == 'active') ? '#' : "?page=$i"; 
                        echo "<li class='page-item $currentPage'><a class='page-link' href='$pageLink'>$i</a></li>";
                    }
                ?>
              </ul>
            </nav>
          </div>
        </div>
        </div>
  </main>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!--script for chart-->
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      $.ajax({
        url: 'analyticfetch.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          var dataArray = [['Task', 'Count']];
          for (var key in data) {
            dataArray.push([key, data[key]]);
          }

          var dataTable = google.visualization.arrayToDataTable(dataArray);

          var options = {
            title: 'Daily Room and Purpose Distribution',
            is3D: true,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(dataTable, options);
        }
      });
    }
</script>
<script>
  // printing pdf
      function printReportAsPDF() {
        $('body').addClass('printing');
        const element = document.querySelector('.print-container');
        const options = {
          filename: 'report.pdf', 
          jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'landscape' 
          },
          html2canvas: { scale: 2 }
        };
        html2pdf().from(element).set(options).save();
        $('body').removeClass('printing');
      }


</script>
</body>

</html>
