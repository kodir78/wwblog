@extends('backend.adminlte.layouts.main')
@section("title") Create User @endsection
@section('styles')
<!-- Start styles Libraies -->
<!-- Select2 -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
            <small>Edit User</small>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Edit User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form id="post-form" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', $user->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User Data</h3>
              </div>
              <div class="card-body">
                <!-- text input -->
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input id="name" value="{{old('name') ? old('name') : $user->name}}"  name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
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
                  <input id="email" value="{{old('email') ? old('email') : $user->email}}" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label class="d-block" for="status">Status</label>
                  <div class="form-check form-check-inline">
                    <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-check-input" id="active" name="status">
                    <label class="form-check-label" for="active">Active</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-check-input" id="inactive" name="status">
                    <label class="form-check-label" for="inactive">Inactive</label>
                  </div>
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                {{-- <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" name="user_roles" id="user_roles" style="width: 50%;">
                    <option selected="">Select Role</option>
                    <option value="1" @if ($user->user_roles == 1)
                      selected="selected"
                      @endif>
                      Administrator
                  </option>
                    <option  value="0" selected="selected" @if ($user->user_roles == 0)
                      
                      @endif>Author</option>
                  </select>
                  @error('user_roles')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div> --}}
                <!-- /.form-group -->
                
              <!-- text input -->
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <!-- /.form-group -->
              <!-- text input -->
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
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
              <button type="submit" class="btn btn-primary float-left">Update</button>
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
@section('footer-scripts')
<!-- Jasny Bootstrap 4 -->
<script src="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
<!-- Select2 -->
<script src="/assets/backend/adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- Page Specific JS File -->
@endsection
@section('script-js')
@include('backend.adminlte.users.script')
@endsection
@endsection
<!-- End Content -->