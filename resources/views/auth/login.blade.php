@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <a style="text-decoration:none" href="{{ route('blog') }}"><img src="/assets/stisla/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"></a>
                    {{-- <a style="text-decoration:none" href="{{ route('blog') }}"><img src="/uploads/images/logo/logo.png" alt="logo" ></a> --}}
                    <br> <br>
                    <a style="text-decoration:none" href="{{ route('blog') }}"><h4>My Blog</h4></a>
                </div>
                <div class="card card-primary">
                    {{-- <div class="card-header"><h4>{{ __('Login') }}</h4></div> --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="invalid-feedback">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">{{ __('Password') }}</label>
                                    <div class="float-right">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-small">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">
                                @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <a style="text-decoration:none" href="{{ route('blog') }}" class="text-small">
                            <i class="fas fa-arrow-left"></i> <strong> Back to Home </strong>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
