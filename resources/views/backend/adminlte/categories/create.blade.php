@extends('backend.adminlte.layouts.main')
@section("title") Create Post @endsection
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
            Category
            <small>Create Category</small>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Post</a></li>
            <li class="breadcrumb-item active">Create Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form id="post-form" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Write Your Category</h3>
              </div>
              <div class="card-body">
                <!-- text input -->
                <div class="form-group">
                  <label for="title">Title</label>
                  <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
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
                  <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" readonly>
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
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('categories.index') }}" class="btn btn-info">Cancel</a>&nbsp;&nbsp;
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
@include('backend.adminlte.categories.script')
@endsection