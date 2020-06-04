<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="{{asset('')}}">
  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="admin_asset/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin_asset/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin_asset/admin/css/users.css">
  <link rel="stylesheet" href="admin_asset/admin/css/dashboard.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        {{-- <h1 class="text-center">Chào mừng bạn đến với trang quản trị</h1> --}}
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Model-->
  @include('admin.layouts.logoutModel')

  <!-- Bootstrap core JavaScript-->
  <script src="admin_asset/admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin_asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin_asset/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin_asset/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="admin_asset/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="admin_asset/admin/js/demo/chart-area-demo.js"></script>
  <script src="admin_asset/admin/js/demo/chart-pie-demo.js"></script>
  <script src="admin_asset/admin/js/display_image.js"></script>
  @yield('script')
</body>

</html>
