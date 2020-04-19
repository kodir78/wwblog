@extends('frontend.sikka.layouts.main')
@section("title") {{ $title }} @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
{{-- <div class="slider-area">
    <div class="page-title">
        <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(/assets/frontend/sikka/img/bg/others_bg.jpg);">
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
</div> --}}
<!-- slider-end -->
<!-- courses start -->
<div class="blog-grid-area gray-bg pt-100 pb-70">
    <div class="container">
        @include('frontend.sikka.alert')
        <div class="blog-grid-list">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-wrapper mb-30">
                        <div class="blog-thumb mb-25">
                            <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ $post->imageUrl }}" alt=""></a>
                            {{-- <span class="blog-category">{{ $post->category->title }}</span> --}}
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span>{{ $post->created_at->diffforHumans() }}</span> 
                            </div>
                            <h5><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a></h5>
                            {!!  substr(strip_tags($post->excerpt), 0, 150) !!}
                            <div class="read-more-btn">
                                <a href="{{ route('blog.show', $post->slug) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- courses end -->
@endsection
<!-- footer start -->