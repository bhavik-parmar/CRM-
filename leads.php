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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Bootstrap 5 CSS -->


<!-- Bootstrap 5 JS (Place before closing body tag) -->


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
      <form class="d-none d-lg-block" method="GET" action="leads.php">
  <div class="input-group">
    <div class="input-group-prepend hover-cursor">
      <span class="input-group-text" id="search">
        <i class="icon-search"></i>
      </span>
    </div>
    <input type="text" class="form-control" name="search" id="navbar-search-input" placeholder="Search now" aria-label="search">
  </div>
</form>

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
                        <p class="card-title mb-0">Leads</p>
                     
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="add_leads.php" class="btn btn-primary btn-sm">+ Add Lead</a>
<!-- Button -->
<a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadExcelModal">
    <i class="bi bi-upload"></i> Upload Excel
</a>

                    </div>
                    <form method="GET" class="mb-3 d-flex align-items-center">
  <label for="sourceFilter" class="me-2"> Source:</label>
  <select name="source" id="sourceFilter" class="form-select form-select-sm me-2" style="width: 100%;" onchange="this.form.submit()">
    <option value="">All Sources</option>
    <?php
    // Fetch distinct sources for dropdown
    $sourceResult = mysqli_query($conn, "SELECT DISTINCT source FROM leads WHERE source != '' ORDER BY source ASC");
    while ($sourceRow = mysqli_fetch_assoc($sourceResult)) {
      $selected = (isset($_GET['source']) && $_GET['source'] == $sourceRow['source']) ? 'selected' : '';
      echo '<option value="'.htmlspecialchars($sourceRow['source']).'" '.$selected.'>'.htmlspecialchars($sourceRow['source']).'</option>';
    }
    ?>
  </select>
  <noscript><button type="submit" class="btn btn-primary btn-sm">Filter</button></noscript>
</form>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                      <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Company</th>
    <th>Source</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php
$sourceFilter = '';
$searchQuery = '';
$whereConditions = [];

if (isset($_GET['source']) && $_GET['source'] !== '') {
    $sourceFilter = mysqli_real_escape_string($conn, $_GET['source']);
    $whereConditions[] = "source = '$sourceFilter'";
}

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['search']);
    $whereConditions[] = "(name LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%' OR phone LIKE '%$searchQuery%' OR company LIKE '%$searchQuery%' OR source LIKE '%$searchQuery%')";
}

$whereClause = count($whereConditions) ? "WHERE " . implode(' AND ', $whereConditions) : '';

$query = "SELECT * FROM leads $whereClause ORDER BY id DESC";


if (isset($_GET['source']) && $_GET['source'] !== '') {
    $sourceFilter = $_GET['source'];
    $whereClause = " WHERE source = '" . mysqli_real_escape_string($conn, $sourceFilter) . "'";
}

$query = "SELECT * FROM leads $whereClause ORDER BY id DESC";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['name']) . "</td>";
          echo "<td>" . htmlspecialchars($row['email']) . "</td>";
          echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
          echo "<td>" . htmlspecialchars($row['company']) . "</td>";
          echo "<td>" . htmlspecialchars($row['source']) . "</td>";
          echo "<td><a href='follow_up.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Follow Up</a></td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='6'>No leads found.</td></tr>";
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
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.CRM. All rights reserved.</span>
    <spn class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></spn>
  </div>
</footer>
<!-- Upload Excel Modal -->
<div class="modal fade" id="uploadExcelModal" tabindex="-1" aria-labelledby="uploadExcelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="uplode_excel.php" method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadExcelModalLabel">Upload Excel File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="excelFile" class="form-label">Select Excel File</label>
          <input type="file" class="form-control" name="excel_file" id="excelFile" accept=".xls,.xlsx,.csv" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Upload</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

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