@extends('admin/layouts/blankLayout')

@section('title', 'Login  - Sortie Services')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span>
              <span class="app-brand-text demo text-body fw-bolder">{{config('variables.productName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to {{config('variables.productName')}}! 👋</h4>
          <p class="mb-4">Please sign-in to your account</p>

            @error('error')
                <div class="mb-4 alert-danger">
                    <strong>{{ $errors->all()[0] }}</strong>
                </div>
            @endif
          <form  class="mb-3" action="{{ route('login') }}" method="POST">

            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email or username" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                @if (Route::has('request-password-view'))
                    <a href="{{ route('request-password-view') }}">
                        <small>{{ __('Forgot Your Password?') }}</small>
                    </a>
                @endif

              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember_me" {{ old('remember_me') ? 'checked' : '' }} name="remember_me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>

            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Sign in</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
