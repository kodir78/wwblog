@extends('backend.stisla.global')
@section("title") {{ $Pagetitle }} @endsection
@section("sub_title")Post @endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('home') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $Pagetitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></div>
                <div class="breadcrumb-item active">{{ $Pagetitle }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        @if (!$posts)
                        <div class="card-header">
                            <div class="alert alert-danger">
                                <strong>No record found</strong>
                            </div>
                        </div>
                        @else
                        <div class="card-body">
                            <div class="float-left">
                                <a href="{{route('posts.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                            <div class="float-right">
                                <form action="{{ route('posts.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                                        <div class="input-group-append">                                            
                                            <button type="submit" value="filter" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm">
                                        <tr>
                                            <th>#</th>
                                            <th><b>Title</b></th>
                                            <th><b>Category</b></th>
                                            <th><b>Author</b></th>
                                            <th><b>Date</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                        <tbody>
                                            @foreach($posts as $post => $hasil)
                                            <tr>
                                                <td>{{$post + $posts->firstitem()}}</td>
                                                <td>{{$hasil->title}}</td>
                                                <td>{{$hasil->category->title}}</td>
                                                <td>{{$hasil->author->name}}</td>
                                                <td><abbr title="{{ $hasil->dateFormatted(true) }}">{{ $hasil->dateFormatted() }}</abbr> | {!! $hasil->publicationLabel() !!}</td>
                                                <td> 
                                                    <a class="btn btn-info text-white btn-sm" href="{{route('posts.edit', [$hasil->id])}}">Edit</a>
                                                    {{-- <a href="{{route('posts.show', $hasil->id)}}" class="btn btn-primary btn-sm">Detail</a> --}}
                                                    <form  class="d-inline" action="{{route('posts.destroy', [$hasil->id])}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                        <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                <td colspan=10>{{$posts->appends(Request::all())->links()}}</td>
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card-footer text-left">
                                            {{$posts->appends(Request::all())->links()}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card-footer text-right">
                                            <nav class="d-inline-block">
                                                <small>{{ $postCount }} {{ Str::plural('post', $postCount) }}</small>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@section('footer-scripts')
<script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');
</script>
@endsection
@endsection
