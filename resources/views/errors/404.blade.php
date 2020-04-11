@extends('frontend.sikka.layouts.main')
@section("title")404 Page Not Found @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
<div class="slider-area">
    <div class="page-title">
        <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url({{ asset('public/assets/frontend/sikka/img/bg/others_bg.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content slider-content-breadcrumb text-center">
                            <h1 class="white-color f-700">@yield('title')</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-end -->
<!-- courses start -->
<div class="faq-area-bottom pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="faq-area-form">
                    <form>
                        <div class="row">
                           <div class="col-xl-12">
                               <div class="faq-form-title text-center">
                                   <h2>Do You Have Any Questions</h2>
                               </div>
                           </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <input type="text" placeholder="Name :">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <input type="text" placeholder="Email :">
                            </div>
                            <div class="col-xl-12">
                                <textarea cols="30" rows="10" placeholder="Coments :"></textarea>
                            </div>
                            <div class="col-xl-12">
                                <div class="faq-form-btn text-center">
                                    <button class="btn">Send message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- courses end -->

     
        @endsection
        <!-- footer start -->