@extends('backend.stisla.global')
@section("title") Create Tag @endsection
@section("sub_title")Tag @endsection
@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('tags.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Tag Title" type="text" name="title" id="title"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-info text-white" href="{{ route('tags.index') }}">Back</a>
                                <button class="btn btn-primary" type="submit" value="save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    
    @endsection
    