
@extends('admin/layouts/blankLayout')

@section('title', 'Forgot Password Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',['width'=>25,'withbg' => "#696cff"])</span>
              <span class="app-brand-text demo text-body fw-bolder">{{ config('variables.productName') }}</span>
            </a>
          </div>
          <!-- /Logo -->
          @if (isset($message) )
          <div class="mb-3">
            <span class="alert-success bx-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          </div>
          @else
          <h4 class="mb-2">Reset Password? 🔒</h4>
          <form id="formAuthentication" class="mb-3" action="{{ route('reset-password') }}" method="POST">
            @csrf
            <input type="hidden" value="{{$token}}" name="passwordToken">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
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
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Confirm Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="confirm-password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('confirm-password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary d-grid w-100" name="submit" id="submit">Update</button>
          </form>

          @endif

          <div class="text-center">
            <a href="{{ route('login')}}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection


