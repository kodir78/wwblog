@extends('frontend.sikka.layouts.main')
@section("title") {{ $title }} @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
<div class="slider-area">
    <div class="page-title">
        <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(/assets/frontend/sikka/img/bg/others_bg.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content slider-content-breadcrumb text-center">
                            <h1 class="white-color f-700">@yield('title') {{ $categoryName }}</h1>
                            <nav class="text-center" aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $categoryName }}</li>
                                </ol>
                            </nav>
                            <h4></h4>
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
                                <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ $post->imageUrl }}" alt=""></a>
                                {{-- <span class="blog-category"><a href="{{ route('category',$post->category->slug) }}">{{ $post->category->title }}</a></span> --}}
                            </div>
                            <div class="blog-content">
                                <br>
                                <div class="time-area time-area-2">
                                    <span class="ti-timer"> </span>
                                    <span class="published-time"> {{ $post->date }}</span>
                                </div>
                                <div class="time-area time-area-2">
                                    <span class="ti-user"> </span>
                                    <span class="seat"> {{ $post->author->name  }}</span>
                                </div>
                                <br>
                                <h5><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a></h5>
                                {!!  substr(strip_tags($post->excerpt), 0, 150) !!}
                                <br>
                                <div class="events-view-btn mt-10">
                                    <a href=""{{ route('blog.show', $post->slug) }}">Detail</a>
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