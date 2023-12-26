@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add Permissions - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/permission-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control phone-mask @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Permission Name" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
