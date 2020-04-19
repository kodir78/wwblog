@extends('backend.adminlte.layouts.main')
@section("title") Edit Account @endsection
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
            <small>Edit Account</small>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Account</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @include('backend.adminlte.partials.message')
      {!! Form::model($user, [
        'method' => 'PUT',
        'url'  => '/edit-account',
        'id'     => 'user-form'
        ]) !!}
          @include('backend.adminlte.home.form', ['hideRoleDropdown' => true])
        {!! Form::close() !!}
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