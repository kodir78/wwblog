@extends('backend.adminlte.main')
@section("title") Home Dashboard @endsection
@section('styles')
<!-- Start styles Libraies -->
  
<!-- End styles Libraies -->
@endsection
<!-- Start Content -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
<!-- End Content -->

@section('footer-scripts')
<!-- Library Specific JS File -->
<script src="/assets/stisla/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
<script src="/assets/stisla/modules/chart.min.js') }}"></script>
<script src="/assets/stisla/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="/assets/stisla/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="/assets/stisla/modules/summernote/summernote-bs4.js') }}"></script>
<script src="/assets/stisla/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->

@endsection

