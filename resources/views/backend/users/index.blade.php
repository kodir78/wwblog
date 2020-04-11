@extends('backend.stisla.global')
@section("title") List Users @endsection
@section("sub_title") List Users @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="float-left">
                        <a href="{{route('users.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                <div class="float-right">
                    <form action="{{ route('users.index') }}">
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
                                <th><b>Full Name</b></th>
                                <th><b>Email</b></th>
                                <th><b>Type</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            <tbody>
                                @foreach($users as $user => $hasil)
                                <tr>
                                    <td>{{$user + $users->firstitem()}}</td>
                                    <td>{{$hasil->name}}</td>
                                    <td>{{$hasil->email}}</td>
                                    <td>
                                        @if ($hasil->user_roles)
                                       <span class="badge badge-info">Administrator</span>
                                    @else
                                    <span class="badge badge-warning">Author</span>
                                    @endif
                                    </td>
                                    {{-- <td>
                                        @if($hasil->avatar)
                                        <img src="{{asset('storage/'.$hasil->avatar)}}" width="70px"/>
                                        @else
                                        <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="70px">
                                        @endif
                                    </td>
                                    <td>
                                        @if($hasil->status == "ACTIVE")
                                        <span class="badge badge-success">
                                            {{$hasil->status}}
                                        </span>
                                        @else
                                        <span class="badge badge-danger">
                                            {{$hasil->status}}
                                        </span>
                                        @endif
                                    </td> --}}
                                    <td> 
                                        <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', [$hasil->id])}}">Edit</a>
                                        <a href="{{route('users.show', [$hasil->id])}}" class="btn btn-primary btn-sm">Detail</a>
                                        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', [$hasil->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=10>{{$users->appends(Request::all())->links()}}</td>
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
