@extends('backend.adminlte.layouts.main')
@section("title") Home Dashboard @endsection
@section('styles')
<!-- Start styles Libraies -->

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
                        <small>Display All Posts</small>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></li>
                        <li class="breadcrumb-item active">All Posts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a id="add-button" title="Add New" class="btn btn-success card-title" href="{{ route('posts.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                            <div class="card-tools float-right">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive p-0">
                            @if (!$posts)
                            <div class="alert alert-danger">
                                <strong>No record found</strong>
                            </div>
                            @else
                            @include('backend.adminlte.posts.table')
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="card-footer clearfix">
                            <div class="float-left">
                                {{ $posts->appends( Request::query() )->render() }}
                            </div>
                            <div class="float-right">
                                <small>{{ $postCount }} {{ Str::plural('post', $postCount) }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<!-- End Content -->

@section('footer-scripts')
<!-- Library Specific JS File -->

<!-- Page Specific JS File -->

@endsection