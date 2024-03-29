<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'MyBlog | Dashboard')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/backend/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
    @yield('styles')
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/backend/adminlte/dist/css/adminlte.min.css">
    {{-- <link rel="stylesheet" href="/assets/backend/adminlte/dist/css/custom.css"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend.adminlte.layouts.header')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('backend.adminlte.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.2
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
        
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="/assets/backend/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/backend/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    @yield('footer-scripts')
    <!-- AdminLTE App -->
    <script src="/assets/backend/adminlte/dist/js/adminlte.min.js"></script>
    
    <!-- page script -->
    @yield('script-js')
</body>
</html>
