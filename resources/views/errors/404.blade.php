@extends('frontend.kz.layouts.main')
@section("title")wow Page @endsection
{{-- @section("sub_title")Category @endsection --}}
@section('content')
<!-- slider-start -->
<!-- Breadcrumbs -->
<section class="breadcrumbs overlay bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Bread Title -->
                <div class="bread-title">
                    <h2>W O W Page</h2>
                </div>
                <!-- Bread List -->
                <ul class="bread-list">
                    <li><a href="{{ route('blog') }}"><i class="fa fa-home"></i>Home</a></li>
                    <li class="active"><a href="{{ route('all') }}"><i class="fa fa-clone"></i>All Post</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--/ End Breadcrumbs -->

<!-- Error Page -->
<section class="error-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="error-inner">
                    <h1>4<span>0</span>4</h1>
                    <!-- Search Form -->
                    <form class="search-form" action="{{ route('all') }}">
                        <input type="text" id="term" value="{{ request('term') }}"  name="term" placeholder="Search something...">
                        <button class="btn" type="submit">Search</button>
                    </form>
                    <!--/ End Search Form -->
                </div>
            </div>
        </div>
    </div>
</section>	
<!--/ End Error Page -->

     
        @endsection
        <!-- footer start -->