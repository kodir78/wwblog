@extends('backend.stisla.global')
@section("title") {{ $title }} @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="float-left">
                        <a href="{{route('sliders.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                <div class="float-right">
                    <form action="{{ route('sliders.index') }}">
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
                                {{-- <th><b>Author</b></th> --}}
                                <th><b>Action</b></th>
                            </tr>
                            <tbody>
                                @foreach($sliders as $slider => $result)
                                <tr>
                                    <td>{{$slider + $sliders->firstitem()}}</td>
                                    <td>{{$result->title}}</td>
                                    {{-- <td>{{$result->user->name}}</td> --}}
                                    {{-- <td>{{$result->created_by}}</td> --}}
                                    {{-- <td> 
                                        @if($result->image)
                                        <img src="{{asset($result->image)}}" width="70px"/>
                                        @else
                                        <img alt="image" src="{{ asset('public/assets/stisla/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture" width="70px">
                                        @endif
                                    </td> --}}
                                    <td> 
                                        <a class="btn btn-info text-white btn-sm" href="{{route('sliders.edit', [$result->id])}}">Edit</a>
                                        {{-- <a href="{{route('sliders.show', $result->id)}}" class="btn btn-primary btn-sm">Detail</a> --}}
                                        <form  class="d-inline" action="{{route('sliders.destroy', [$result->id])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                            <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=10>{{$sliders->appends(Request::all())->links()}}</td>
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
