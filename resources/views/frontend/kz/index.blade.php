@extends('frontend.kz.layouts.main')
@section("title")Blog - Home @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- Hero Area -->
@include('frontend.kz.slider')
<!--/ End Hero Area -->
<!-- Features -->
{{-- <section class="features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
                <!-- Single Feature -->
                <div class="single-feature">
                    <i class="icofont icofont-light-bulb"></i>
                    <h2>Creative Design</h2>
                    <p>Nulla tristique aliquam tortor id imperdiet. Vivamus sollicit.</p>
                </div>
                <!--/ End Single Feature -->
            </div>
            <div class="col-lg-3 col-md-3 col-12 gradient-color">
                <!-- Single Feature -->
                <div class="single-feature">
                    <i class="icofont icofont-responsive"></i>
                    <h2>Fully Responsive</h2>
                    <p>Nulla tristique aliquam tortor id imperdiet. Vivamus sollicit.</p>
                </div>
                <!--/ End Single Feature -->
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <!-- Single Feature -->
                <div class="single-feature">
                    <i class="icofont icofont-gift"></i>
                    <h2>Amazing Feature</h2>
                    <p>Nulla tristique aliquam tortor id imperdiet. Vivamus sollicit.</p>
                </div>
                <!--/ End Single Feature -->
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <!-- Single Feature -->
                <div class="single-feature">
                    <i class="icofont icofont-code-alt"></i>
                    <h2>Quality Coding</h2>
                    <p>Nulla tristique aliquam tortor id imperdiet. Vivamus sollicit.</p>
                </div>
                <!--/ End Single Feature -->
            </div>
        </div>
    </div>
</section> --}}
<!--/ End Features -->
<!-- Blog Archive -->
<section class="blogs archive section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Latest Post</h2>
                </div>
            </div> 
        </div> 
        <div class="row">
            @include('frontend.kz.alert')
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single blog -->
                <div class="single-blog">
                    <div class="blog-head">
                        @if ($post->imageThumburl)
                        <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ $post->imageThumburl }}" alt="{{ $post->title }}"></a>   
                        @else
                        <a href="{{ route('blog.show', $post->slug) }}"><img src="/assets/frontend/kz/images/1000x665.png" alt="{{ $post->title }}"></a>
                        @endif
                    </div>
                    <div class="blog-bottom">
                        <h4>
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title}}</a>
                        </h4>
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i> 
                                <a href="{{ route('author', $post->author->slug) }}"><strong> {{ $post->author->name  }}</strong></a>
                            </li>
                            {{-- <li><a href="{{ route('blog.show', $post->slug) }}#post-comments"><i class="fa fa-comments"></i>30 Comments</a></li> --}}
                        </ul>
                        <br>
                        {!!  substr(strip_tags($post->excerpt), 0, 200) !!} [...]
                        <ul class="blog-meta">
                            <li><i class="fa fa-calendar"></i>{{ $post->date }}</li>
                            <li><a href="#"><i class="fa fa-tag"></i>{!! $post->tags_html !!}</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!--/ End Single blog -->
            </div> 
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <div class="pagination-main text-center">
                    <ul class="pagination" style="padding:30px;">
                        <a class="btn animate" href="{{ route('all') }}">Read All Post </a>
                    </ul>
                </div>
                <!--/ End Pagination -->
            </div>
        </div>	
    </div>
</section>
<!--/ End Blog Archive -->
<!-- Newsletter -->
{{-- @include('frontend.kz.layouts.newsletter') --}}
<!--/ End Newsletter -->
@endsection