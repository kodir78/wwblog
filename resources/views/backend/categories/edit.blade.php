@extends('backend.stisla.global')
@section("title") Edit Category @endsection
@section("sub_title")Category @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12"> 
            <div class="card">
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('categories.update', $category->id)}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{old('title') ? old('title') : $category->title}}" class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Category Title" type="text" name="title" id="title"/>
                            <div class="invalid-feedback">
                                {{$errors->first('title')}}
                            </div>
                        </div><div class="form-group">
                            <label class="d-block" for="roles">Status</label>
                            <div class="form-check form-check-inline">
                              <input {{$category->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-check-input" id="active" name="status">
                              <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input {{$category->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-check-input" id="inactive" name="status">
                              <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                            <div class="invalid-feedback">
                              {{$errors->first('status')}}
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="image">Feature Image</label>
                            @if($category->image)
                            <img src="{{ $category->imageUrl }}" width="80px" />
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
                            <a class="btn btn-info text-white" href="{{ route('categories.index') }}">Back</a>
                            <button class="btn btn-primary" type="submit" value="save">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    @endsection
    