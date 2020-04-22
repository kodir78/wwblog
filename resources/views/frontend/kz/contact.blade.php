@extends('frontend.kz.layouts.main')
@section("title")All Post @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- Breadcrumbs -->
<section class="breadcrumbs overlay bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Bread Title -->
                <div class="bread-title">
                    <h2><span>our contact information</span>Contact with Us</h2>
                </div>
                <!-- Bread List -->
                <ul class="bread-list">
                    <li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
                    <li class="active"><a href="contact.html"><i class="fa fa-clone"></i>Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--/ End Breadcrumbs -->

<!-- Contact Us -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 col-12">
                <div class="form-main">
                    <p>Feel free to consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <!-- Form -->
                    <form class="form" method="post" action="mail/mail.php">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Full Name<span>*</span></label>
                                    <input type="text" name="name" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Your Email<span>*</span></label>
                                    <input type="email" name="email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Subject<span>*</span></label>
                                    <input type="text" name="subject" required="required">
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label>Messages<span>*</span></label>
                                    <textarea name="message" rows="6" ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group button">	
                                    <button type="submit" class="btn primary animate">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
            <!--/ End Contact Form -->	
            <!-- Contact Address -->
            <div class="col-lg-6 col-12">
                <div class="contact-address">
                    <div class="contact">
                        <h4>Get In Touch</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <!-- Single Address -->
                        <div class="single-address">
                            <span><i class="icofont icofont-phone"></i>Phone</span>
                            <p>+(123) 45678910, +(346) 45678910</p>
                        </div>
                        <!--/ End Single Address -->
                        <!-- Single Address -->
                        <div class="single-address">
                            <span><i class="icofont icofont-envelope-open"></i>Email</span>
                            <p><a href="mailto:info@youremail.com">info@youremail.com</a>, <a href="mailto:success@youremail.com">success@youremail.com</a></p>
                        </div>
                        <!--/ End Single Address -->
                        <!-- Single Address -->
                        <div class="single-address">
                            <span><i class="icofont icofont-pin"></i>Corporate Office:</span>
                            <p>022, Tropical Tour, 5th Floor, United Kingdom.</p>
                        </div>
                        <!--/ End Single Address -->
                        <!-- Single Address -->
                        <div class="single-address">
                            <span><i class="icofont icofont-map-pins"></i>Business Office:</span>
                            <p>123, Thomas alpa, 1st Floor, South Korea</p>
                        </div>
                        <!--/ End Single Address -->
                    </div>
                    <div class="social-info">
                        <!-- Social -->
                        <ul class="social">
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-dribbble"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-youtube"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-envato"></i></a></li>
                        </ul>
                        <!--/ End Social -->
                    </div>
                    
                </div>
            </div>
            <!--/ End Contact Address -->
        </div>
    </div>		
</section>
<!--/ End Contact Us -->
@endsection