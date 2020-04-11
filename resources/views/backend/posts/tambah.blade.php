@extends('backend.adminlte.main')
@section("title") Create Post @endsection
@section("sub_title")Post @endsection
@section('styles')
<!-- CSS Libraries -->
<!-- summernote -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/summernote/summernote-bs4.css">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create New Pos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.card -->
            <form id="post-form" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="row">
                    
                    <div class="col-md-9">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Write Your Post</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group {{$errors->first('title') ? "is-invalid" : "" }}">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea id="excerpt" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="bodycontent">Body Content</label>
                                    <textarea id="bodycontent" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="form-control select2 {{$errors->first('tags') ? "is-invalid": ""}}" multiple="" name="tags[]" id="tags">
                                        @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">
                                          {{ $tag->title }}
                                        </option>
                                        @endforeach
                                      </select>
                                </div>
                                <input type="file" class="form-control {{$errors->first('image') ? "is-invalid": ""}}" name="image" id="image" />
                                    <div class="invalid-feedback">
                                        {{$errors->first('image')}}
                                    </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (left) -->
                    <div class="col-md-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Publish</h3>
                            </div>
                            <div class="card-body">
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Published Date</label>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="published_at" id="published_at"/>
                                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="draft-btn" type="submit" class="btn btn-default">Save Draft</button>
                                <button type="submit" class="btn btn-primary float-right">Publish</button>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                        
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Category</h3>
                            </div>
                            <div class="card-body">
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control selectric {{$errors->first('category_id') ? "is-invalid": ""}}" name="category_id" id="category_id">
                                        <option value="" holder>Select Category</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id}}">{{ $item->title }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <!-- /.form group -->
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Feature Image</h3>
                            </div>
                            <div class="card-body">
                                <!-- Image -->
                                <div class="form-group">
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        
                    </div>
                    <!-- /.col (right) -->
                </div>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('footer-scripts')


{{-- Script js --}}
@include('backend.posts.script')
@endsection
