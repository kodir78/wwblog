<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="SITE KEYWORDS HERE" />
    <meta name="description" content="">
    <meta name='copyright' content='Trendbiz'>
    
    <!-- Title Tag -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/uploads/images/logo/favicon.png">	
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/animate.min.css">
    <!-- Animate Text CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/animate-text.css">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/icofont.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/font-awesome.min.css">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/jquery-ui.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/flex-slider.min.css">
    <!-- Dzs Parallaxer CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/dzsparallaxer.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/owl.carousel.min.css">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/slicknav.min.css">
    <!-- Youtube Player CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/ytplayer.min.css">
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/fancybox.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/niceselect.css">
    <!-- Cube Portfolio CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/cubeportfolio.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/magnific-popup.css">
    
    <!-- Trendbiz CSS -->
    <link rel="stylesheet" href="/assets/frontend/kz/css/custom/style-orange.css">
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/custom/style-blue.css"> --}}
    <link rel="stylesheet" href="/assets/frontend/kz/css/responsive-orange.css">
    
    <!-- Trendbiz Color -->
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin1.css"> --}}
    {{-- Green --}}
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin2.css"> --}}
    <!--<link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin3.css">-->
    <!--<link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin4.css">-->
    <!--<link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin5.css">-->
    
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin7.css"> --}}
    <!--<link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin8.css">-->
    <!--<link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin9.css">-->
    <!--<link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin10.css">-->
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin11.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin12.css"> --}}
    {{-- Blue --}}
    {{-- <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin-blue.css"> --}}
    {{-- Orange --}}
    <link rel="stylesheet" href="/assets/frontend/kz/css/skin/skin-orange.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                                    <p>Terus belajar untuk memberikan yang terbaik buat Keluarga, Masyarakat serta sahabat-sahabat<a href="#">#<i class="icofont icofont-caret-right"></i></a></p>	
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
                                        <li><i class="icofont icofont-ui-email"></i><a href="mailto:kodir.petani@gmail.com">kodir.petani@gmail.com</a></li>
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
                                <div class="copyright">
                                    <p>&copy; All Right Reserved. <a href="#">zaelani.id</a></p>
                                </div>
                                <!--/ End Copyright -->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--/ End footer -->
            
            <!-- Jquery JS -->
            <script src="/assets/frontend/kz/js/jquery.min.js"></script>
            <script src="/assets/frontend/kz/js/jquery-migrate.min.js"></script>
            <script src="/assets/frontend/kz/js/jquery-ui.min.js"></script>
            <!-- Bootstrap JS -->
            <script src="/assets/frontend/kz/js/popper.min.js"></script>
            <script src="/assets/frontend/kz/js/bootstrap.min.js"></script>
            <!-- Modernizer JS -->
            <script src="/assets/frontend/kz/js/modernizr.min.js"></script>
            <!-- Particles JS -->
            {{-- <script src="/assets/frontend/kz/js/particles.min.js"></script> --}}
            {{-- <script src="/assets/frontend/kz/js/particle-active.js"></script> --}}
            <!-- Theme Plugins JS -->
            <script src="/assets/frontend/kz/js/theme-plugins.js"></script>
            <!-- Main JS -->
            <script src="/assets/frontend/kz/js/main.js"></script>
        </div>
    </body>
    </html>