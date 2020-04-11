@extends('backend.stisla.global')
@section("title") {{ $title }} @endsection
@section("sub_title")Post @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('sliders.update', $slider->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    {{-- <input type="hidden" value="PUT" name="_method"> --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{old('title') ? old('title') : $slider->title}}" class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Post Title" type="text" name="title" id="title"/>
                            <div class="invalid-feedback">
                                {{$errors->first('title')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input value="{{old('url') ? old('url') : $slider->url}}" class="form-control {{$errors->first('url') ? "is-invalid": ""}}" placeholder="URL" type="text" name="url" id="url"/>
                            <div class="invalid-feedback">
                                {{$errors->first('url')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Feature Image</label>
                            @if($slider->imageUrl)
                            <img src="{{$slider->imageUrl}}" width="80px" />
                            <br><br>
                            @else
                            <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="120px">
                            <br><br>
                            @endif  
                            <input type="file" class="form-control {{$errors->first('image') ? "is-invalid": ""}}" name="image" id="image" />
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-info text-white" href="{{ route('sliders.index') }}">Back</a>
                            <button class="btn btn-primary" type="submit" value="save">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('public/assets/stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/assets/stisla/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace( 'excerpt' );
        CKEDITOR.replace( 'body' );
    </script>
    
    @endsection
    