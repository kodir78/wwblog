<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield("title")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/frontend/sikka/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/sikka/css/responsive.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header-start -->
@include('frontend.sikka.layouts.header')

    @yield('content')
@include('frontend.sikka.layouts.footer')