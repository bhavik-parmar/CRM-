<?php 
include 'dbconn.php';

// Get certificate ID from URL
$cert_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Initialize certificate name
$certificate_name = '';
$certificate_image = '';

// Fetch certificate name from the database
if ($cert_id > 0) {
    $query = "SELECT * FROM certificates WHERE id = $cert_id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $certificate_name = $row['cource_name'];
        $certificate_image = $row['certificate_image']; // e.g., 'cert123.jpg'
    }
}
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
         <a class="dropdown-item">
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
      <a class="nav-link"  href="#tables"  >
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Tables</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="#icons"  >
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Icons</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="#auth" >
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="#error"  >
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Error pages</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../../docs/documentation.html">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Documentation</span>
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
        <h4 class="card-title mb-4">Add Cource</h4>
        <form action="add_allocated_certificate.php" method="post" enctype="multipart/form-data">
  <input type="hidden" class="form-control" name="cert_id" value="<?php echo htmlspecialchars($cert_id); ?>" required>

  <div class="form-group mb-3">
    <label for="participant_name">Participant</label>
    <select name="participant_id" id="participant_name" class="form-control" required>
      <option value="">Select Participant</option>
      <?php
      $query = "SELECT id, name FROM contact ORDER BY name ASC";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
      }
      ?>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="cert_no">Certificate Number</label>
    <input type="text" class="form-control" id="cert_no" name="cno" placeholder="Enter Certificate Number" required>
  </div>

  <div class="form-group mb-3">
    <label for="vcode">Verification Code</label>
    <input type="text" class="form-control" id="vcode" name="vcode" placeholder="Enter Verification Code" required>
  </div>

  <div class="form-group mb-3">
    <label for="course_name">Course Name</label>
    <select name="course_id" id="course_name" class="form-control" required>
      <option value="">Select Course</option>
      <?php
      $cquery = "SELECT id, cource_name FROM cource ORDER BY cource_name ASC";
      $cource_result = mysqli_query($conn, $cquery);
      while ($row = mysqli_fetch_assoc($cource_result)) {
        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['cource_name']) . '</option>';
      }
      ?>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="cname">Certificate Name</label>
    <input type="text" class="form-control" id="cname" name="cname" value="<?php echo htmlspecialchars($certificate_name ?? ''); ?>" readonly>
  </div>

  <div class="form-group mb-3">
    <label for="sdate">Starting Date</label>
    <input type="date" class="form-control" id="sdate" name="sdate" required>
  </div>

  <div class="form-group mb-3">
    <label for="edate">Ending Date</label>
    <input type="date" class="form-control" id="edate" name="edate" required>
  </div>

  <div class="form-group mb-3">
    <label for="idate">Certificate Issued Date</label>
    <input type="date" class="form-control" id="idate" name="idate" required>
  </div>

  <div class="form-group mb-3">
    <label for="percentage">Percentage</label>
    <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Enter Percentage" required>
  </div>

  <?php if (!empty($certificate_image)) : ?>
    <div class="form-group mb-3">
      <label>Certificate Image</label><br>
      <img src="certificates/<?php echo htmlspecialchars($certificate_image); ?>" 
           alt="Certificate Image" 
           class="img-fluid rounded border" 
           style="max-width: 500px; height: 200px;">
    </div>
  <?php endif; ?>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

      </div>
    </div>
  </div>
</div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
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


