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
                            <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('posts.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                            &nbsp;&nbsp;&nbsp;
                            <?php $links = [] ?>
                            @foreach($statusList as $key => $value)
                                @if($value)
                                    <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                                    <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                                @endif
                            @endforeach
                            {!! implode(' | ', $links) !!}

                            <div class="card-tools" style="padding:8px 0px">
                                <form action="{{ route('posts.index') }}">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
                                        
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            @include('backend.adminlte.partials.message')

                            @if (!$posts->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                            @else
                                @if($onlyTrashed)
                                    @include('backend.adminlte.posts.table-trash')
                                @else
                                    @include('backend.adminlte.posts.table')
                                @endif
                            @endif

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="float-left">
                                {{ $posts->appends( Request::query() )->render() }}
                            </div>
                            <div class="float-right">
                                <small>{{ $postCount }} {{ Str::plural('post', $postCount) }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
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