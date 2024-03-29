@extends('frontend.sikka.layouts.main')
@section("title")Blog - Home @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
{{-- <div class="slider-area pos-relative">
    <div class="slider-active">
        @foreach ($sliders as $slider)
        @if ($slider->imageurl) --}}
        {{-- menggunakan imageUrl --}}
        {{-- <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url({{ $slider->imageurl }});"> 
            @endif
        </div>
        @endforeach
    </div>
</div> --}}
<!-- slider-end -->
<!-- latest_blog start -->
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                @include('frontend.sikka.alert')
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                @if ($post->imageurl)
                                <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ $post->imageThumburl }}" alt="{{ $post->title }}"></a>   
                                @endif
                                {{-- <span class="blog-category"><a href="{{ route('category', $post->category->slug) }}">{{ $post->category->title }}</a></span> --}}
                            </div>
                            <div class="blog-content">
                                <br>
                                <div class="post-meta">
                                    <span>
                                        <i class="fa fa-calendar-alt"></i>
                                        <a href="#"> {{ $post->date }}</a>
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        <i class="fa fa-user"></i>
                                        <a href="{{ route('author', $post->author->slug) }}"> {{ $post->author->name  }}</a>
                                    </span>
                                </div>
                                <h5><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a></h5>
                                {!!  substr(strip_tags($post->excerpt), 0, 150) !!}
                                <div class="post-meta">
                                    <span>
                                        <i class="fa fa-tag"></i>
                                        {!! $post->tags_html !!}
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        <i class="fa fa-folder"></i>
                                        <a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }}</a>
                                    </span>
                                    <span>
                                        <i class="fa fa-comments"></i>
                                        <a href="{{ route('blog.show', $post->slug) }}#post-comments">{{ $post->commentsNumber('Comment') }}</a>
                                    </span>
                                </div>
                                <div class="events-view-btn mt-10">
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
            {{-- Sidebar post --}}
            @include('frontend.sikka.sidebar')
            {{-- Sidebar post end --}}
        </div>
    </div>
</div>
<!-- latest_blog end -->

@endsection
<!-- footer start -->