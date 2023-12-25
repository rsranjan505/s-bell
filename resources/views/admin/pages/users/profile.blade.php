@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User Profile - Sortie Services')

@section('content')
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item"><a class="nav-link active" href="{{ route('user-profile')}}"><i class="bx bx-user me-1"></i> Account</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('notification.index')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li> --}}
        <li class="nav-item"><a class="nav-link" href="{{ route('setting-view')}}"><i class="bx bx-lock me-1"></i> Change Password </a></li>
      </ul>
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <div class="card-body">
            @include('admin.pages.users.user-form',['user' => $data['user'] ] )
        </div>
        <!-- /Account -->
      </div>

    </div>
  </div>
@endsection
