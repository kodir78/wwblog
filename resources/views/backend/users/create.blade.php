@extends('backend.stisla.global')
@section("title") Create User @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12"> 
            <div class="card">
                <div class="clearfix mb-3"></div>
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_login">User Login</label>
                            <input class="form-control {{$errors->first('user_login') ? "is-invalid": ""}}" placeholder="User Login" type="text" name="user_login" id="user_login"/>
                            <div class="invalid-feedback">
                                {{$errors->first('user_login')}}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input  class="form-control {{$errors->first('email') ? "is-invalid": ""}}" placeholder="E-mail" type="email" name="email" id="email"/>
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block" for="roles">Roles</label>
                            <select class="form-control  {{$errors->first('user_roles') ? "is-invalid" :"" }} " name="user_roles" id="user_roles">
                                <option value="">Select Role</option>
                                <option value="1">Administrator</option>
                                <option value="0">Author</option>
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('roles')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Phone Number</label>
                            <input value="{{old('user_phone')}}" class="form-control {{$errors->first('user_phone') ? "is-invalid": ""}}" placeholder="Phone" type="text" name="user_phone" id="user_phone"/>
                            <div class="invalid-feedback">
                                {{$errors->first('user_phone')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_url">Website</label>
                            <input value="{{old('user_url')}}" class="form-control {{$errors->first('user_url') ? "is-invalid": ""}}" placeholder="Website" type="text" name="user_url" id="user_url"/>
                            <div class="invalid-feedback">
                                {{$errors->first('user_url')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control {{$errors->first('password') ? "is-invalid": ""}}" placeholder="Password" type="text" name="password" id="password"/>
                            <small class="text-muted">Kosongkan jika mau menggunakan password 12345678</small>
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input class="form-control" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
                        </div> --}}
                        <div class="form-group">
                            <label for="user_bio">Bio</label>
                            <textarea  class="form-control summernote-simple" name="user_bio" id="user_bio" class="form-control {{$errors->first('user_bio') ? "is-invalid" : "" }}"></textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('user_bio')}}
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="avatar">Avatar image</label>
                            <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
                            <div class="invalid-feedback">
                                {{$errors->first('avatar')}}
                            </div>
                        </div> --}}
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit" value="save">Save</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div> 
<script src="{{asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace( 'bio' );
    </script>
    @endsection
    