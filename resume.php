<?php
session_start(); // Start the session


// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php"); // Redirect to login page
    exit();
}
include 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i class="ti-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="ti-close text-white"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo me-5" href="index.html"><img src="assets/images/logo.svg" class="me-2" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="assets/images/faces/face28.jpg" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
         <a class="dropdown-item" href="logout.php">
            <i class="ti-power-off text-primary"></i> Logout </a>
        </div>
      </li>
      
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="leads.php"  >
        <i class=" icon-bar-graph menu-icon"></i>
        <span class="menu-title">Leads</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="contact_details.php"  >
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Contact Details</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="followup_report.php"  >
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Follow_up Report</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="cource.php"  >
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Cource</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="certificates.php"  >
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Certificate</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="certified_users.php" >
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Certified User</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="resume.php"  >
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Resumes</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="email_manage.php">
      <i class="fa fa-envelope menu-icon"></i>

        <span class="menu-title">Manage Email</span>
      </a>
    </li>
  </ul>
</nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="card-title mb-0">Resume</p>
                        <a href="add_resume.php" class="btn btn-primary btn-sm">+ Add Resume</a>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                      <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Experience</th>
    <th>Resume</th>
    <th>Date</th>
  </tr>
</thead>

<tbody>
  <?php


$query = "select * from resume";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['experience']) . "</td>";
        echo "<td><a href='resume/" . urlencode($row['resume']) . "' target='_blank'>" . htmlspecialchars($row['resume']) . "</a></td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
       
        echo "<td>
                <a href='update_resume.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'><i class='mdi mdi-pencil'></i></a>
                <a href='delete_resume.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\");'><i class='mdi mdi-delete'></i></a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No Resume found.</td></tr>";
}

  mysqli_close($conn);
  ?>
</tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. CRM .</span>
    
  </div>
</footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>