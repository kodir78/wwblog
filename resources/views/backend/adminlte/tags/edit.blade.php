@extends('backend.adminlte.layouts.main')
@section("title") Edit Tags @endsection
@section('styles')
<!-- Start styles Libraies -->

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
            Tags
            <small>Edit Tags</small>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Post</a></li>
            <li class="breadcrumb-item active">Edit Tags</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form id="post-form" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('tags.update', $tag->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Your Tags</h3>
              </div>
              <div class="card-body">
                <!-- text input -->
                <div class="form-group">
                  <label for="title">Title</label>
                  <input id="title" value="{{old('title') ? old('title') : $tag->title}}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
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
                  <input id="slug" value="{{old('slug') ? old('slug') : $tag->slug}}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" readonly>
                  @error('slug')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- /.form-group -->
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer float-left">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tags.index') }}" class="btn btn-info">Cancel</a>&nbsp;&nbsp;
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </form>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<!-- End Content -->

@section('footer-scripts')
<!-- Page Specific JS File -->
@include('backend.adminlte.tags.script')
@endsection