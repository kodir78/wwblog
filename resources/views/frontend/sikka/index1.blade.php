@extends('frontend.sikka.layouts.main')
@section("title")Blog - Home @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
<div class="slider-area pos-relative">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url({{ asset('public/assets/frontend/sikka/img/slider/slider_bg_1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-md-12">
                        <div class="slider-content slider-content-2">
                            <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span>Admition Going On</span><br>Eduara University</h1>
                            <p data-animation="fadeInUp" data-delay=".4s">Sorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua enim ad minime.</p>
                            <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s"><span class="btn-text">admit now</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url({{ asset('public/assets/frontend/sikka/img/slider/2.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-md-12 offset-xl-2">
                        <div class="slider-content slider-content-2 text-center">
                            <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span>Admition Going On</span><br>Eduara University</h1>
                            <p data-animation="fadeInUp" data-delay=".4s">Sorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua enim ad minime.</p>
                            <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s"><span class="btn-text">admit now</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url({{ asset('public/assets/frontend/sikka/img/slider/3.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-md-12">
                        <div class="slider-content slider-content-2">
                            <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span>Admition Going On</span><br>Eduara University</h1>
                            <p data-animation="fadeInUp" data-delay=".4s">Sorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua enim ad minime.</p>
                            <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s"><span class="btn-text">admit now</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-end -->
<!-- latest_blog start -->
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ asset($post->image) }}" alt=""></a>
                                {{-- <span class="blog-category">{{ $post->category->title }}</span> --}}
                            </div>
                            <div class="blog-content">
                                <br>
                                <div class="blog-meta">
                                    <span>{{ $post->created_at->diffforHumans() }}</span> 
                                </div>
                                <h5><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a></h5>
                                {!!  substr(strip_tags($post->excerpt), 0, 150) !!}
                                <br>
                                <div class="read-more-btn">
                                    <a href="{{ route('blog.show', $post->slug) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="course-pagination mb-30" aria-label="Page navigation example">
                            <ul class="pagination justify-content-start text-center">
                                {{$posts->appends(Request::all())->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- Sidebar detail post --}}
            @include('frontend.sikka.sidebarpostdetail')
            {{-- Sidebar detail post end --}}
        </div>
    </div>
</div>
        <!-- latest_blog end -->
       
        @endsection
        <!-- footer start -->