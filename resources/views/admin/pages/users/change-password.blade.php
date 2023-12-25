@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Change Password - Sortie Services')

@section('content')
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item"><a class="nav-link " href="{{ route('user-profile')}}"><i class="bx bx-user me-1"></i> Account</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('notification.index')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li> --}}
        <li class="nav-item"><a class="nav-link active" href="{{ route('setting-view')}}"><i class="bx bx-lock me-1"></i> Change Password </a></li>
      </ul>
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                          @if (isset($message) )
                          <div class="mb-3">
                            <span class="alert-success bx-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          </div>
                          @else
                          <h4 class="mb-2">Change Password? 🔒</h4>
                          <form id="formAuthentication" class="mb-3" action="{{route('admin-user-change-password') }}" method="POST">
                            @csrf

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
                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100" name="submit" id="submit">Update Password</button>
                          </form>

                          @endif
                        </div>
                      </div>

                </div>
            </div>
        </div>
        <!-- /Account -->
      </div>

    </div>
</div>



@endsection
