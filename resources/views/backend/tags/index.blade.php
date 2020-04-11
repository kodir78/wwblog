@extends('backend.stisla.global')
@section("title") All Tags @endsection
@section("sub_title")Tags @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="float-left">
                        <a href="{{route('tags.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                <div class="float-right">
                    <form action="{{ route('tags.index') }}">
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
                                <th><b>Action</b></th>
                            </tr>
                            <tbody>
                                @foreach($tags as $tag => $hasil)
                                <tr>
                                    <td>{{$tag + $tags->firstitem()}}</td>
                                    <td>{{$hasil->title}}</td>
                                    <td> 
                                        <a class="btn btn-info text-white btn-sm" href="{{route('tags.edit', [$hasil->id])}}">Edit</a>
                                        {{-- <a href="{{route('tags.show', $hasil->id)}}" class="btn btn-primary btn-sm">Detail</a> --}}
                                        <form  class="d-inline" action="{{route('tags.destroy', [$hasil->id])}}" method="POST">
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
                                    <td colspan=10>{{$tags->appends(Request::all())->links()}}</td>
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
