@extends('backend.stisla.global')
@section("title") {{ $Pagetitle }} @endsection
@section("sub_title")Post @endsection

@section('styles')
<!-- CSS Libraries -->
<link rel="stylesheet" href="/assets/stisla/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="/assets/stisla/modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/assets/stisla/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $Pagetitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></div>
                <div class="breadcrumb-item active">{{ $Pagetitle }}</div>
            </div>
        </div>
        
        <div class="section-body">
            <form id="post-form" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('posts.update', $post->id )}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Your Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input value="{{old('title') ? old('title') : $post->title}}" class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Post Title" tabindex="1" type="text" name="title" id="title"/>
                                    <div class="invalid-feedback">
                                        {{$errors->first('title')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input value="{{old('slug') ? old('slug') : $post->slug}}" class="form-control {{$errors->first('slug') ? "is-invalid": ""}}" readonly placeholder="Slug" type="text" name="slug" id="slug"/>
                                    <div class="invalid-feedback">
                                        {{$errors->first('slug')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea  class="form-control summernote-simple" tabindex="2" name="excerpt" id="excerpt" class="form-control {{$errors->first('excerpt') ? "is-invalid" : "" }}">{{ $post->excerpt }}</textarea>
                                    <div class="invalid-feedback">
                                        {{$errors->first('excerpt')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="body">Body Content</label>
                                    <textarea  class="form-control" name="body" tabindex="3" id="body" class="form-control {{$errors->first('body') ? "is-invalid" : "" }}">{{ $post->body }}</textarea>
                                    <div class="invalid-feedback">
                                        {{$errors->first('excerpt')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><h6>Tags</h6></label>
                                    <select class="form-control select2 {{$errors->first('tags') ? "is-invalid": ""}}" multiple="" name="tags[]" id="tags">
                                        @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @foreach($post->tags as $value)
                                            @if($tag->id == $value->id)
                                            selected
                                            @endif
                                            @endforeach       	
                                            >{{ $tag->title }}</option> 
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{$errors->first('tags')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Publish</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="published_at">Published Date</label>
                                        {{-- {!! Form::text('published_at', null, ['class' => 'form-control datetimepicker', 'placeholder' => 'Y-m-d H:i:s']) !!} --}}
                                        <input type="text" value="{{old('published_at') ? old('published_at') : $post->published_at}}" class="form-control datetimepicker {{$errors->first('published_at') ? "is-invalid": ""}}" placeholder="Y-m-d H:i:s" name="published_at" id="datetimepicker1">
                                        <div class="invalid-feedback">
                                            {{$errors->first('published_at')}}
                                        </div>                    
                                    </div>
                                    <br>
                                    <a class="btn btn-info text-white" id="draft-btn">Save Draft</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-primary" type="submit" value="save">Publish</button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Category</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <label><h6>Category</h6></label> --}}
                                        <select class="form-control selectric {{$errors->first('category_id') ? "is-invalid": ""}}" name="category_id" id="category_id">
                                            <option value="" holder>Select Category</option>
                                            @foreach($category as $result)
                                            <option value="{{ $result->id }}"
                                                @if($result->id == $post->category_id)
                                                selected
                                                @endif
                                                >{{  $result->title }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{$errors->first('category_id')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Feature Image</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            {{-- <label for="image">Current Image</label> --}}
                                            @if($post->imageThumbUrl)
                                            <img src="{{$post->imageThumbUrl}}" width="150px" />
                                            <br><br>
                                            @else
                                            <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="120px">
                                            <br><br>
                                            @endif  
                                        </div>
                                        <div class="form-group row mb-4 ">
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="image" id="image-upload" class="form-control {{$errors->first('image') ? "is-invalid": ""}}" />
                                                </div>
                                                <div class="invalid-feedback">
                                                    {{$errors->first('image')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        
        
        @section('footer-scripts')
        <!-- JS Libraies -->
        <script src="/assets/stisla/modules/summernote/summernote-bs4.js"></script>
        <script src="/assets/stisla/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="/assets/stisla/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="/assets/stisla/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="/assets/stisla/modules/select2/dist/js/select2.full.min.js"></script>
        <script src="/assets/stisla/modules/jquery-selectric/jquery.selectric.min.js"></script>
        <script src="/assets/stisla/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
        <script src="/assets/stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        
        <!-- Page Specific JS File -->
        {{-- <script src="/assets/stisla/js/page/forms-advanced-forms.js"></script> --}}
        <script src="/assets/stisla/js/page/features-post-create.js"></script>
        
        {{-- Script js --}}
        @include('backend.posts.script')
        @endsection
        @endsection21`  890-