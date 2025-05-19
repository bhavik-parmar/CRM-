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
    <script src="https://cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>

    <style>
        .editor-box h5 {
  background-color: #f2f2f2;
  padding: 10px;
  border: 1px solid #ccc;
  margin-bottom: 20px;
  font-weight: bold;
}

.btn-group-top {
  margin-bottom: 15px;
}

        </style>
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
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-primary text-white shadow rounded-2 open-modal" data-url="contact_modal.php">
                <div class="card-body text-center">
                <i class="icon-columns display-4 mb-2"></i>
                <h4 class="mb-0">Contact</h4>
                </div>
            </div>
         </div>
         <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-primary text-white shadow rounded-2 open-modal" data-url="leads_modal.php">
                <div class="card-body text-center">
                <i class="icon-bar-graph display-4 mb-2"></i>
                <h4 class="mb-0">Leads</h4>
                </div>
            </div>
         </div>
         <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-primary text-white shadow rounded-2 open-modal" data-url="newsletter_modal.php">
                <div class="card-body text-center">
                <i class="fa fa-envelope display-4 mb-2"></i>

                <h4 class="mb-0">NewsLetter</h4>
                </div>
            </div>
         </div>
</div>
<!-- Modal Placeholder -->
<div id="modalContainer"></div>

<!-- Inside your existing page's <div class="content-wrapper"> -->

<div class="editor-box mt-4 mx-auto" style="max-width:900px; background:#fff; padding:20px; border:1px solid #ccc;">
  <h5>Email Editor</h5>

  

  <form action="mail_send.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="to" class="form-label">To :</label>
      <textarea id="to" name="to" rows="2" class="form-control"></textarea>
    </div>

    <div class="mb-3">
      <label for="subject" class="form-label">Subject :</label>
      <input type="text" id="subject" name="subject" class="form-control">
    </div>

    <div class="mb-3">
      <label for="message" class="form-label">Message :</label>
      <textarea name="message" id="message" rows="8" class="form-control"></textarea>
    </div> 
    
    <div class="mb-3">
    <label for="attachment" class="form-label">Attach Document:</label>
    <input type="file" name="attachment[]" id="attachment" class="form-control" multiple>
  </div>
    <button type="submit" class="btn btn-primary btn-send">Send</button>
  </form>
</div>

<script>
  CKEDITOR.replace('message', {
    height: 300
  });
</script>

           
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
    <script>
  $(document).ready(function() {
    $('.open-modal').on('click', function() {
      var modalUrl = $(this).data('url');
      $('#modalContainer').load(modalUrl, function() {
        $('#sharedModal').modal('show');
      });
    });
  });
</script>
<script>
  $(document).on('click', '#selectAll', function() {
    $('.email-checkbox').prop('checked', this.checked);
  });
  
</script>
<!-- Latest CKEditor 4.25.1+ for security -->

<script>
  CKEDITOR.replace('message', {
    height: 300
  });
</script>



  </body>
</html>