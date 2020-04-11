@extends('layouts.global')
@section("title") Detail Category @endsection
@section("sub_title")Detail @endsection
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{$category->title}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="image">Feature Image</label>
                        @if($category->image)
                        <img class="profile-widget-picture" src="{{asset('storage/'.$category->image)}}" width="120px" />
                        <br><br>
                        @else
                        <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="120px">
                        @endif 
                    </div>
                    <div class="card-footer text-left">
                        <a class="btn btn-info text-white" href="{{ route('categories.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    