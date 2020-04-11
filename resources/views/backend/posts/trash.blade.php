@extends('backend.stisla.global')
@section("title") All Post Trash @endsection
@section("sub_title")Post @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    
                {{-- <div class="float-right">
                    <form action="{{ route('posts.trash') }}">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                        <div class="input-group-append">                                            
                          <button type="submit" value="filter" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div> --}}
                  <div class="clearfix mb-3"></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>#</th>
                                <th><b>Title</b></th>
                                <th><b>Category</b></th>
                                <th><b>Author</b></th>
                                <th><b>Tags</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            <tbody>
                                @foreach($posts as $post => $hasil)
                                <tr>
                                    <td>{{$post + $posts->firstitem()}}</td>
                                    <td>{{$hasil->title}}</td>
                                    <td>{{$hasil->category->title}}</td>
                                    <td>{{$hasil->author->name}}</td>
                                    <td>
                                        @foreach ($hasil->tags as $tag)
                                            <ul>
                                                <li>
                                                    {{$tag->title}}
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    {{-- <td> 
                                        @if($hasil->image)
                                        <img src="{{asset($hasil->image)}}" width="70px"/>
                                        @else
                                        <img alt="image" src="{{ asset('public/assets/stisla/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture" width="70px">
                                        @endif
                                    </td> --}}
                                    <td> 
                                        <a class="btn btn-info text-white btn-sm" href="{{route('posts.restore', [$hasil->id])}}">Restore</a>
                                        {{-- <a href="{{route('posts.show', $hasil->id)}}" class="btn btn-primary btn-sm">Detail</a> --}}
                                        <form  class="d-inline" action="{{route('posts.delete_permanent', [$hasil->id])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=10>{{$posts->appends(Request::all())->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
