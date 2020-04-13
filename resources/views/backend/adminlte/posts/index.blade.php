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
    @include('backend.adminlte.posts.message')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('posts.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                            
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            
                            
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $request = request(); ?>
                                    
                                    @foreach ($posts as $post)
                                    
                                    <tr>
                                        <td>
                                            <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{route('posts.edit', $post->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>&nbsp;&nbsp;
                                            <form  class="d-inline" action="{{route('posts.destroy', $post->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-xs delete-row"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->author->name }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td><abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> | {!! $post->publicationLabel() !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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