<header id="home">
    <div class="header-area">
        <!-- header-top -->
        <div class="header-top primary-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="header-contact-info d-flex">
                            <div class="header-contact header-contact-phone">
                                {{-- <span class="ti-headphone"></span> --}}
                                {{-- <p class="phone-number">+0123456789</p> --}}
                            </div>
                            <div class="header-contact header-contact-email">
                                <span class="ti-email"></span>
                                <p class="email-name">kodir.petani@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="header-social-icon-list">
                            <ul>
                                <li><a href="#"><span class="ti-facebook"></span></a></li>
                                {{-- <li><a href="#"><span class="ti-twitter-alt"></span></a></li> --}}
                                {{-- <li><a href="#"><span class="ti-dribbble"></span></a></li> --}}
                                <li><a href="#"><span class="ti-google"></span></a></li>
                                {{-- <li><a href="#"><span class="ti-pinterest"></span></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /end header-top -->
        <!-- header-bottom -->
        <div class="header-bottom-area header-sticky" style="transition: .6s;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                        <div class="logo">
                            <a href="{{ route('blog') }}">
                                <img src="{{ asset('public/assets/frontend/sikka/img/logo/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                        <div class="header-bottom-icon f-right">
                            <ul>
                                <li class="toggle-search-icon"><a href="#"><span class="ti-search"></span>
                                        <div class="toggle-search-box">
                                            <form action="{{ route('blog.search') }}" id="searchbox">
                                                <input placeholder="Search" type="text" name="keyword">
                                                <button class="button-search" type="submit" value="filter"><span class="ti-search"></span></button>
                                            </form>
                                        </div>
                                    </a>

                                </li>
                                {{-- <li class="shopping-cart"><a href="#"><span class="ti-shopping-cart"></span>
                                        <span class="shopping-counter">0</span>
                                    </a></li> --}}
                            </ul>
                        </div>
                        <div class="main-menu f-right">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li>
                                        <a href="{{ route('blog') }}">Beranda</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all') }}">Artikel</a>
                                    </li>
                                    {{-- <li>
                                        <a href="#about">Artikel</a>
                                        <ul class="submenu">
                                            @foreach ($categories as $category)
                                            <li>
                                                <a href="about_us.html">{{ $category->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li> --}}
                                    <li>
                                        <a href="#">Tentang</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /end header-bottom -->
    </div>
</header>