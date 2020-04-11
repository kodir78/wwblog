@extends('backend.stisla.global')
@section("title") {{ $title }} @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('sliders.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Post Title" type="text" name="title" id="title"/>
                            <div class="invalid-feedback">
                                {{$errors->first('title')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input class="form-control {{$errors->first('url') ? "is-invalid": ""}}" placeholder="Full Url" type="text" name="url" id="url"/>
                            <div class="invalid-feedback">
                                {{$errors->first('url')}}
                            </div>
                            <small class="text-muted"><strong>Full URL</strong> example: http://blog.test/posts/codeigniter-4.jpeg  or https://...</small>
                        </div>
                        <div class="form-group">
                            <label for="image">Image Slider</label>
                            <input id="image" name="image" type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}">
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-info text-white" href="{{ route('sliders.index') }}">Back</a>
                            <button class="btn btn-primary" type="submit" value="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    