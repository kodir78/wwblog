@extends('backend.stisla.global')
@section("title") Detail Profile @endsection
@section('content')
  <!-- Main Content -->
  <div class="section-body">
    <h2 class="section-title">Hi, {{$users->name}}!</h2>
    <p class="section-lead">
      
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">                     
            @if($users->avatar)
            <img class="rounded-circle profile-widget-picture" src="{{asset('storage/'.$users->avatar)}}" width="120px" />
            <br><br>
            @else
            <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="120px">
            @endif 
            <div class="profile-widget-items">
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Posts</div>
                <div class="profile-widget-item-value">187</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Followers</div>
                <div class="profile-widget-item-value">6,8K</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Following</div>
                <div class="profile-widget-item-value">2,1K</div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name">{{$users->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
          {{-- menampilkan isi field tanpa tag html --}}
          {!! $users->bio !!}
          </div>
          <div class="card-footer text-center">
            <div class="font-weight-bold mb-2">Follow Ujang On</div>
            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-github mr-1">
              <i class="fab fa-github"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" 
            action="{{route('users.update', [$users->id])}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">                               
                  <div class="form-group col-md-8 col-12">
                    <label>Full Name</label>
                    <input name="name" id="name" type="text" readonly
                    class="form-control" 
                    value="{{old('name') ? old('name') : $users->name}}">
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>User Name</label>
                    <input type="text" name="user_login" id="user_login"
                    value="{{old('user_login') ? old('user_login') : $users->user_login}}" 
                    class="form-control" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-8 col-12">
                    <label>Email</label>
                    <input value="{{old('email') ? old('email') : $users->email}}" 
                    class="form-control" 
                    type="text" name="email" id="email" readonly>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Phone</label>
                    <input value="{{old('user_phone') ? old('user_phone') : $users->user_phone}}"
                    class="form-control" type="text" name="user_phone" id="user_phone" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label class="d-block" for="status">Status</label>
                    <div class="form-check form-check-inline">
                      <input {{$users->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" 
                      type="radio" class="form-check-input" id="active" name="status" disabled>
                      <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input {{$users->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" 
                      type="radio" class="form-check-input" id="inactive" name="status" disabled>
                      <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Role</label>
                    <select class="form-control  {{$errors->first('user_roles') ? "is-invalid" :"" }} " 
                      name="user_roles" id="user_roles" disabled>
                      <option value="">Select Role</option>
                      <option value="1" 
                        @if ($users->user_roles == 1)
                        selected
                        @endif>Administrator
                      </option>
                      <option value="0" 
                        @if ($users->user_roles == 0)
                        selected
                        @endif>Author
                      </option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label>Website</label>
                    <input value="{{old('user_url') ? old('user_url') : $users->user_url}}" 
                    class="form-control {{$errors->first('user_url') ? "is-invalid": ""}}"  
                    type="text" name="user_url" id="user_url" readonly>
                    <div class="invalid-feedback">
                      {{$errors->first('user_url')}}
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-footer text-right">
              <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Content -->
@endsection
      