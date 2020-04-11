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
<!-- detail_blog start -->
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-wrapper blog-list blog-details blue-blog mb-50">
                    {{-- @foreach ($posts as $post)  --}}
                    @if ($post->imageUrl)
                    <div class="blog-thumb mb-35">
                        <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
                        {{-- <span class="blog-text-offer">{{ $post->category->title}}</span> --}}
                    </div>
                    @endif
                    <div class="blog-content news-content">
                        <div class="time-area time-area-2">
                            <span class="ti-timer"> </span>
                            <span class="published-time"><strong> {{ $post->date }}</strong></span>
                        </div>
                        <div class="time-area time-area-2">
                            <span class="ti-user"> </span>
                            <span class="seat"><strong> {{ $post->author->name  }}</strong></span>
                        </div>
                        <br><br>
                        <h5>{{ $post->title}}</h5>
                        {!! $post->body !!}
                        <div class="blog-wrapper-footer">
                            <div class="news-wrapper-tags">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="widget-tags clearfix">
                                            <span>Tags:</span>
                                            <ul class="sidebar-tad clearfix">
                                                @foreach ($post->tags as $tag)
                                                <li>
                                                    <a href="#">{{$tag->title}} </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="new-post-tag news-share-icon text-left text-md-right">
                                            <span>Share</span>
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
                                <div class="col-xl-12">
                                    <div class="author-comments-box d-flex">
                                        <div class="author-comments-avatar">
                                            @if($post->author->avatar)
                                            <img src="{{ $post->author->avatar}}" alt="">
                                            @else
                                            <img src="{{ asset('public/assets/frontend/sikka/img/comments/author_comments_01.png')}}" alt="">
                                            @endif
                                        </div>
                                        <div class="author-comments-text">
                                            <div class="author-comments-title">
                                                <h5>{{ $post->author->display_name }}</h5>
                                                {{-- <span>Author</span> --}}
                                            </div>
                                            <p>{!! $post->author->user_bio !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
                <div class="post-comments post-comments-padding white-bg mt-70 mb-30">
                    <div class="section-title mb-20">
                        <h2>Comments (3)</h2>
                    </div>
                    <div class="latest-comments">
                        <ul>
                            <li>
                                <div class="comments-box main-comments d-flex">
                                    <div class="comments-avatar">
                                        <img src="{{ asset('public/assets/frontend/sikka/img/comments/comments_01.png')}}" alt="">
                                    </div>
                                    <div class="comments-text">
                                        <div class="avatar-name">
                                            <h5>Kemerun</h5>
                                        </div>
                                        <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                <ul class="comments-reply">
                                    <li>
                                        <div class="comments-box d-flex">
                                            <div class="comments-avatar">
                                                <img src="{{ asset('public/assets/frontend/sikka/img/comments/comments_02.png')}}" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>Angelina</h5>
                                                </div>
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comments-box main-comments d-flex">
                                    <div class="comments-avatar">
                                        <img src="{{ asset('public/assets/frontend/sikka/img/comments/comments_03.png')}}" alt="">
                                    </div>
                                    <div class="comments-text">
                                        <div class="avatar-name">
                                            <h5>Naymer JR</h5>
                                        </div>
                                        <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="post-comments-form">
                        <div class="section-title mb-30">
                            <h2>Leave a Reply</h2>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <input type="text" placeholder="Your Name">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <input type="text" placeholder="Your Email">
                                </div>
                                <div class="col-xl-4 col-lg-4  col-md-4">
                                    <input type="text" placeholder="Your Email">
                                </div>
                                <div class="col-xl-12">
                                    <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments"></textarea>
                                    <button class="btn blue-bg" type="submit">send reply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Sidebar detail post --}}
            @include('frontend.sikka.sidebarpostdetail')
            {{-- Sidebar detail post end --}}
        </div>
    </div>
</div>
<!-- end news-details-->
<!-- detail_blog end -->
<!-- subscribe start -->
<div class="subscribe-area">
    <div class="container">
        <div class="subscribe-box">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="subscribe-text">
                                <h1>Subscribe</h1>
                                <span>Enter your email and get latest updates and offers subscribe us</span>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-4 justify-content-end">
                            <div class="email-submit-form">
                                <div class="subscribe-form">
                                    <form action="#">
                                        <input placeholder="Enter your email" type="email">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- subscribe end -->
@endsection
<!-- footer start -->