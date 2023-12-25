@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Update User - Sortie Services')
@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/page-auth.css')}}">
@endsection
@section('content')
<div class="row">
    @include('admin.components.header-nav.admin-user-nav',['activeTab' => 'edit'] )
    <hr>
    <div class="card mb-4">
        <div class="card-body">
            @include('admin.pages.users.user-form',['user' => $data['user'] ] )
        </div>
    </div>
</div>

@endsection
