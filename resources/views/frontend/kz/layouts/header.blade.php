<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <!-- Top Contact -->
                    {{-- <div class="top-contact">
                        <div class="single-contact">
                            <p><i class="icofont icofont-clock-time"></i> Date</p>
                        </div>
                        <div class="single-contact">
                            <p><i class="icofont icofont-phone"></i>+990123-456-789</p>
                        </div>
                        <div class="single-contact">
                            <p><a href="mailto:info@yourwebsite.com"><i class="icofont icofont-ui-email"></i>info@yourwebsite.com</a></p>
                        </div>
                    </div> --}}
                    <!--/ End Top contact -->
                </div>
                <div class="col-lg-5 col-12">
                    <div class="top-right">
                        <!-- Social -->
                        <ul class="social">
                            <li class="connect">Stay Connected:</li>
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i><span class="title">Like us on facebook</span></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i><span class="title">Follow us on twitter</span></a></li>
                            <li><a href="#"><i class="icofont icofont-social-linkedin"></i><span class="title">Our linkedin profile</span></a></li>
                            <li><a href="#"><i class="icofont icofont-social-dribbble"></i><span class="title">Project on dribble</span></a></li>
                            <li><a href="#"><i class="icofont icofont-social-youtube"></i><span class="title">Our youtube channel</span></a></li>
                            <li><a href="#"><i class="icofont icofont-social-envato"></i><span class="title">Our envato profile</span></a></li>
                        </ul>
                        <!--/ End Social -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        {{-- <a href="index.html"><img src="/uploads/images/logo/logo.png" alt="logo"></a> --}}
                    </div>
                    <!--/ End Logo -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-9 col-md-10 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">	
                                <div class="nav-inner">	
                                    <ul class="nav main-menu navbar-nav">
                                        <li><a href="{{ route('blog') }}">Home</a>
                                        </li>	
                                        <li><a href="{{ route('all') }}">Blog</a>
                                        </li>
                                        <li><a href="#">Links<i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a target="_blank" href="https:/kemdikbud.go.id/">Kemdikbud</a></li>
                                                <li><a target="_blank" href="https://belajar.kemdikbud.go.id/">Rumah Belajar</a></li>
                                                <li><a target="_blank" href="http://disdik.kaltimprov.go.id">Disdikbud Kaltim</a></li>
                                                <li><a target="_blank" href="https://disdik.samarindakota.go.id/">Disdik Kota Samarinda</a></li>
                                            </ul>
                                        </li>	
                                        <li><a href="{{ route('contact') }}">Contact</a>
                                        </li>												
                                    </ul>	
                                    <!-- Right Bar -->
                                    <div class="right-bar">
                                        <!-- Search -->
                                        <div class="single-bar search">
                                            <a class="icon"><i class="fa fa-search"></i></a>
                                            <div class="search-form overlay">
                                                <!-- Search Form -->
                                                <form class="form" action="{{ route('all') }}">
                                                    <input type="text" id="term" value="{{ request('term') }}"  name="term" placeholder="Search something...">
                                                    <button type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                                <!--/ End Search Form -->
                                            </div>
                                        </div>
                                        <!--/ End Search -->
                                        <!-- Nav Icon -->
                                        <div class="single-bar nav-icon">
                                            <a class="bar"><i class="fa fa-bars"></i></a>
                                        </div>
                                        <!--/ End Nav Icon -->
                                    </div>
                                    <!--/ End Right Bar -->
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->							
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
    <!-- Sidebar Area -->
    <div class="side-area">
        <div class="cross">
            <a class="btn"><i class="fa fa-remove"></i></a>
        </div>
        <!-- Logo -->
        <div class="logo">
            {{-- <a href="{{ route('blog') }}"><img src="/uploads/images/logo/logo.png" alt="logo"></a>  --}}
        </div>
        <!--/ End Logo -->
        <!-- Menu -->
        <ul class="nav navbar-nav">			
            <li><a href="{{ route('all') }}">Latest Post</a></li>				
            <li><a href="contact.html">Contact</a></li>		
        </ul>	
        <!--/ End Menu -->
        <!-- Side Bottom -->
        <div class="side-bottom">
            <ul class="social">
                <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                <li><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                <li><a href="#"><i class="icofont icofont-social-youtube"></i></a></li>
                <li><a href="#"><i class="icofont icofont-social-dribbble"></i></a></li>
            </ul>
            <p class="copyright">©2020 <a href="#">zaelani.id</a></p>
        </div>
        <!-- End Side Bottom -->
    </div>
    <!--/ End Sidebar Area -->	
</header>