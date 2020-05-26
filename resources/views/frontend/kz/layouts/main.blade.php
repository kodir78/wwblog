<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="zaelani.id" />
    <meta name="description" content="">
    <meta name='copyright' content='zaelani.id'>
    
    <!-- Title Tag -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('/uploads/images/logo/favicon.png') }}">	
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/bootstrap-4.5.0/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/animate.min.css') }}">
    <!-- Animate Text CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/animate-text.css') }}">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/icofont.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/font-awesome.min.css') }}">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/jquery-ui.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/flex-slider.min.css') }}">
    <!-- Dzs Parallaxer CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/dzsparallaxer.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/owl.carousel.min.css') }}">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/slicknav.min.css') }}">
    <!-- Youtube Player CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/ytplayer.min.css') }}">
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/fancybox.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/niceselect.css') }}">
    <!-- Cube Portfolio CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/cubeportfolio.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/css/magnific-popup.css') }}">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/bootstrap-4.5.0/css/custom/style-orange.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/bootstrap-4.5.0/css/responsive-orange.css') }}">
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/bootstrap-4.5.0/css/custom/style-blue.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/bootstrap-4.5.0/css/responsive-blue.css"> --}}
    
    <!-- SKin Color -->
    {{-- Blue --}}
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/bootstrap-4.5.0/css/skin/skin-blue.css"> --}}
    {{-- Orange --}}
    <link rel="stylesheet" href="{{ asset('/assets/frontend/kz/bootstrap-4.5.0/css/skin/skin-orange.css') }}">
    
    </head>
    <body class="box-bg">
        <div class="boxed-layout">
            <!-- Header -->
            @include('frontend.kz.layouts.header')
            <!--/ End Header -->
            
            @yield('content')
            <!-- Footer -->
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- About Widget -->
                                <div class="single-widget about">
                                     {{-- <a href="index.html"><img src="/uploads/images/logo/logo.png" alt="logo"></a> --}}
                                    <p>Terus belajar untuk memberikan yang terbaik buat Keluarga<a href="#">#<i class="icofont icofont-caret-right"></i></a></p>	
                                    <ul class="social">
                                        <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-youtube"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!--/ End About Widget -->
                            </div>	
                            <div class="col-lg-2 col-md-6 col-12">
                                <!-- Links Widget -->
                                <div class="single-widget links">
                                    <h2>Category Link</h2>
                                    <ul class="list">
                                        @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('category', $category->slug) }}"><i class="fa fa-caret-right"></i> {{ $category->title }}</a>
                                            <span>{{ $category->posts->count() }}</span>
                                        </li>
                                        @endforeach	
                                    </ul>
                                </div>
                                <!--/ End Links Widget -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <!-- Posts Widget -->
                                <div class="single-widget posts">
                                    <h2>Popular Posts</h2>
                                    <ul>
                                        @foreach ($popularPostsf as $post)
                                        <li>
                                            @if ($post->imageThumbUrl)
                                                <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ $post->imageThumburl }}" alt="{{ $post->title }}"></a>   
                                            @else
                                            <div class="post-img">
                                                <a href="{{ route('blog.show', $post->slug) }}"><img src="/assets/frontend/kz/images/65x60.png" alt="{{ $post->title }}"></a>
                                            </div>
                                            @endif
                                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--/ End Posts Widget -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <!-- Address Widget -->
                                <div class="single-widget address">
                                    <h2>Contact</h2>
                                    <p>Kodir Zaelani</p>
                                    <ul class="list">
                                        {{-- <li><i class="icofont icofont-phone"></i>+990123-456-789</li> --}}
                                        <li><i class="icofont icofont-ui-email"></i><a href="mailto:kodir.zaelani78@gmail.com">kodir.zaelani78@gmail.com</a></li>
                                        <li><i class="icofont icofont-location-arrow"></i>Samarinda, Kalimantan Timur, Indonesia</li>
                                    </ul>	
                                </div>
                                <!--/ End Address Widget -->
                            </div>	
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!-- Copyright -->
                                <div class="copyright text-left">
                                    <p>&copy; 2019 - 2020 All Right Reserved <a href="/" style="box-decoration: none">zaelani.id</a> - Created by: <a href="#">Kodir Zaelani</a></p>
                                </div>
                                <!--/ End Copyright -->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--/ End footer -->
            
            <!-- Jquery JS -->
            <script src="{{ asset('/assets/frontend/kz/js/jquery.min.js') }}"></script>
            <script src="{{ asset('/assets/frontend/kz/js/jquery-migrate.min.js') }}"></script>
            <script src="{{ asset('/assets/frontend/kz/js/jquery-ui.min.js') }}"></script>
            <!-- Bootstrap JS -->
            <script src="{{ asset('/assets/frontend/kz/js/popper.min.js') }}"></script>
            <script src="{{ asset('/assets/frontend/kz/bootstrap-4.5.0/js/bootstrap.min.js') }}"></script>
            <!-- Modernizer JS -->
            <script src="{{ asset('/assets/frontend/kz/js/modernizr.min.js') }}"></script>
            <!-- Particles JS -->
            {{-- <script src="{{ asset('/assets/frontend/kz/js/particles.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('/assets/frontend/kz/js/particle-active.js') }}"></script> --}}
            <!-- Theme Plugins JS -->
            <script src="{{ asset('/assets/frontend/kz/js/theme-plugins.js') }}"></script>
            <!-- Main JS -->
            <script src="{{ asset('/assets/frontend/kz/js/main.js') }}"></script>
        </div>
    </body>
    </html>