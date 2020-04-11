<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title", 'My Blog')</title>
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/fontawesome/css/all.min.css') }}">
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/select2/dist/css/select2.min.css') }}">
    @yield('styles')
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/stisla/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Navbar -->
            @include('backend.stisla.header')
            <!-- Sidebar -->
            @include('backend.stisla.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield("title")</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ route('home')}}">Dashboard</a></div>
                            <div class="breadcrumb-item">@yield("title")</div>
                        </div>
                    </div>
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert" id="swal-2">
                        <div class="alert alert-success" id="swal-2">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div> --}}
                    @yield('content')
                </section>
            </div>
            {{-- @yield('content') --}}
            <!-- Main Content -->
        </div>
        <!-- Footer -->
        @include('backend.stisla.footer')