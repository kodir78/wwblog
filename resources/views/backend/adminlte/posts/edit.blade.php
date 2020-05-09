@extends('backend.adminlte.layouts.main')
@section("title") Edit Post @endsection
@section('styles')
<!-- Start styles Libraies -->
<!-- daterange picker -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<!-- summernote -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/summernote/summernote-bs4.css">
<!-- tag editor -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/tag-editor/jquery.tag-editor.css">
<!-- End styles Libraies -->
@endsection
<!-- Start Content -->
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Posts
                        <small>Edit Posts</small>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></li>
                        <li class="breadcrumb-item active">Edit Posts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="post-form" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('posts.update', $post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Write Your Post</h3>
                            </div>
                            <div class="card-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" value="{{old('title') ? old('title') : $post->title}}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input id="slug" value="{{old('slug') ? old('slug') : $post->slug}}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" readonly >
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="4" placeholder="Excerpt">{{ $post->excerpt }}</textarea>
                                    @error('excerpt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="body">Content</label>
                                    <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" placeholder="Content">{{ $post->body }}</textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (left) -->
                    <div class="col-md-3">
                        <!-- Catergory -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control select2bs4 {{$errors->first('category_id') ? "is-invalid": ""}}" name="category_id" id="category_id">
                                        <option value="" holder>Select Category</option>
                                        @foreach($category as $result)
                                        <option value="{{ $result->id }}"
                                            @if($result->id == $post->category_id)
                                            selected
                                            @endif
                                            >{{  $result->title }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                    <!-- /.card-body -->
                            </div>
                                <div class="card-footer">
                                    <a href="#" style="decortion:none">Create Category</a>
                                </div>
                        </div>
                        <!-- /.card -->
                        <!-- Tags -->
                        <div class="card card-secondary">
                            <div class="card-header">
                            <h3 class="card-title">Tags</h3>
                            </div>
                            <div class="card-body">
                            <!-- Minimal style -->
                            <div class="form-group">
                                {{-- <label for="title">Title</label> --}}
                                {!! Form::text('post_tags', null,['class' => 'form-control']) !!}
                                {{-- <input id="post_tags" name="post_tags" type="text" class="form-control @error('post_tags') is-invalid @enderror" placeholder="Title"> --}}
                                @error('post_tags')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- Feature Image -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Feature Image</h3>
                            </div>
                            <div class="card-body">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : '/assets/backend/adminlte/dist/img/download.svg' }}"  alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" class="@error('image') is-invalid @enderror" name="image"></span>
                                        <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- Publish -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Publish</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Publish Date</label>
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input type="text" value="{{old('published_at') ? old('published_at') : $post->published_at}}" class="form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#datetimepicker" name="published_at" id="published_at"/>
                                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('published_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="card-footer">
                                <button id="draft-btn" type="submit" class="btn btn-default">Save Draft</button>
                                <button type="submit" class="btn btn-primary float-right">Publish</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div> 
                    <!-- /.col (right) -->
                </div>
                <!-- /.row -->
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<!-- End Content -->
        
@section('footer-scripts')
<!-- Library Specific JS File -->
<!-- Select2 -->
<script src="/assets/backend/adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/assets/backend/adminlte/plugins/moment/moment.min.js"></script>
<script src="/assets/backend/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="/assets/backend/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/backend/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Jasny Bootstrap 4 -->
<script src="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
<!-- Page Specific JS File -->
@include('backend.adminlte.posts.script')
@endsection