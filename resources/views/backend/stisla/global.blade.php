<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title", 'My Blog')</title>
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/stisla/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/stisla/modules/fontawesome/css/all.min.css">
    
    <!-- CSS Libraries -->
    @yield('styles')
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/stisla/css/style.css">
    <link rel="stylesheet" href="/assets/stisla/css/components.css">
    <!-- Start GA -->
    
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- Navbar -->
            @include('backend.stisla.header')
            <!-- Sidebar -->
            @include('backend.stisla.sidebar')
            <!-- Main Content -->
            @yield('content')
            <!-- Main Content -->
        </div>
        <!-- Footer -->
        {{-- @include('backend.stisla.footer') --}}
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2020 <div class="bullet"></div> Template <strong>  Satisla </strong> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> - Coding with <a href="https://zaelani.id/">Kodir Zaelani</a>
            </div>
            <div class="footer-right">
                
            </div>
        </footer>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/stisla/modules/jquery.min.js"></script>
    <script src="/assets/stisla/modules/popper.js"></script>
    <script src="/assets/stisla/modules/tooltip.js"></script>
    <script src="/assets/stisla/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/stisla/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/stisla/modules/moment.min.js"></script>
    <script src="/assets/stisla/js/stisla.js"></script>
    
    <!-- JS Libraies -->
    @yield('footer-scripts')
    
    <!-- Template JS File -->
    <script src="/assets/stisla/js/scripts.js"></script>
    <script src="/assets/stisla/js/custom.js"></script>
    @include('sweetalert::alert')
</body>
</html>