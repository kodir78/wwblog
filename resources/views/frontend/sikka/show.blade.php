@extends('frontend.sikka.layouts.main')
@section("title")Blog - Detail Post @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
<div class="slider-area">
    <div class="pages-title">
        <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(/assets/frontend/sikka/img/bg/others_bg.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content slider-content-breadcrumb text-center">
                            <h1 class="white-color f-700">News Details</h1>
                            <nav class="text-center" aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">News Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-end -->
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-wrapper blog-list blog-details blue-blog mb-50">
                    <div class="blog-thumb mb-35">
                        @if ($post->imageUrl)
                        <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
                        <span class="blog-text-offer"> {{ $post->category->title }}</span>
                        @else 
                        <img src="/assets/frontend/sikka/img/blog/news_details_thumb_01.jpg" alt="">
                        <span class="blog-text-offer"> {{ $post->category->title }}</span>
                        @endif
                    </div>
                    <div class="blog-content news-content">
                        <div class="blog-meta news-meta">
                            <span>
                                <i class="fa fa-calendar-alt"></i>
                                <a href="#"> {{ $post->date }}</a>
                            </span>
                        </div>
                        <h5>{{ $post->title}}</h5>
                        {!! $post->body !!}
                        <div class="blog-wrapper-footer">
                            <div class="news-wrapper-tags">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-9 col-md-9">
                                        <div class="new-post-tag">
                                            {{-- <span>Tags:</span> --}}
                                            <i class="fa fa-tag"></i>
                                            {!! $post->tags_html !!}
                                            <span>&nbsp;&nbsp;
                                                <i class="fa fa-folder"></i>&nbsp;
                                                <a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }}</a>
                                            </span>&nbsp;&nbsp;
                                            <span>
                                                <i class="fa fa-comments"></i>
                                                <a href="#post-comments">{{ $post->commentsNumber('Comment') }}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="new-post-tag news-share-icon text-left text-md-right">
                                            {{-- <span>Share</span> --}}
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a class="twitter" href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a class="dribble" href="#">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="author-comments-box d-flex">
                                            <div class="author-comments-avatar">
                                                @if($post->author->avatar)
                                                <img src="{{ $post->author->avatar}}" alt="">
                                                @else
                                                <img src="/assets/frontend/sikka/img/comments/author_comments_01.png" alt="">
                                                @endif
                                            </div>
                                            <div class="author-comments-text">
                                                <div class="author-comments-title">
                                                    <h5><a href="{{ route('author', $post->author->slug) }}"> {{ $post->author->name  }}</a></h5>
                                                    {{-- <h5>{{ $post->author->display_name }}</h5> --}}
                                                    {{-- <span>Author</span> --}}
                                                </div>
                                                <p>{!! $post->author->bio !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Comments detail post --}}
                @include('frontend.sikka.comments')
                {{-- Comments detail post --}}
            </div>
            {{-- Sidebar detail post --}}
            @include('frontend.sikka.sidebarpostdetail')
            {{-- Sidebar detail post end --}}
        </div>
    </div>
</div>
<!-- end news-details-->
<!-- subscribe start -->
<!-- subscribe end -->
@endsection
<!-- footer start -->