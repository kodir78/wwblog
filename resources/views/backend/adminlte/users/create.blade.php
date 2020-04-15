@extends('backend.adminlte.layouts.main')
@section("title") Create User @endsection
@section('styles')
<!-- Start styles Libraies -->
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
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
            User
            <small>Create User</small>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Create User</li>
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
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input User Data</h3>
              </div>
              <div class="card-body">
                <!-- text input -->
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Title">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- /.form-group -->
                <!-- text input -->
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- /.form-group -->
                <!-- text input -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- /.form-group -->
                <!-- text input -->
                <div class="form-group">
                  <label for="confirmpassword">Confirm Password</label>
                  <input id="confirmpassword" name="confirmpassword" type="text" class="form-control @error('confirmpassword') is-invalid @enderror">
                  @error('confirmpassword')
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
          <div class="col-md-4">
            <!-- Photo Profile -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Photo Profile</h3>
              </div>
              <div class="card-body text-center">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                    <img src="/assets/backend/adminlte/dist/img/no_image.png"  alt="...">
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
            <!-- /.card body -->
            <div class="card-footer float-left">
                <button type="submit" class="btn btn-primary float-left">Save</button>
                <a href="{{ route('categories.index') }}" class="btn btn-info float-right">Cancel</a>&nbsp;&nbsp;
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
<!-- Jasny Bootstrap 4 -->
<script src="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
@endsection