@extends('backend.stisla.global')
@section("title") All Category @endsection
@section("sub_title")Category @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @if (!$categories)
                <div class="card-header">
                    <div class="alert alert-danger">
                        <strong>No record found</strong>
                    </div>
                </div>
                @else
                <div class="card-body">
                    <div class="float-left">
                        <a href="{{route('categories.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="float-right">
                        <form action="{{ route('categories.index') }}">
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
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th><b>Title</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Image</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                                <tbody>
                                    @foreach($categories as $categori => $hasil)
                                    <tr>
                                        <td>{{$categori + $categories->firstitem()}}</td>
                                        <td>{{$hasil->title}}</td>
                                        <td>{{$hasil->status}}</td>
                                        <td> 
                                            @if($hasil->image)
                                            <img src="{{ $hasil->imageUrl }}" width="70px"/>
                                            @else
                                            <img alt="image" src="/assets/stisla/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="70px">
                                            @endif</td>
                                            <td> 
                                                <a class="btn btn-info text-white btn-sm" href="{{route('categories.edit', [$hasil->id])}}">Edit</a>
                                                {{-- <a href="{{route('categories.show', $hasil->id)}}" class="btn btn-primary btn-sm">Detail</a> --}}
                                                <form  class="d-inline" action="{{route('categories.destroy', [$hasil->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card-footer text-left">
                                        {{$categories->appends(Request::all())->links()}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <small>{{ $categoryCount }} {{ Str::plural('categori', $categoryCount) }}</small>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endsection
    