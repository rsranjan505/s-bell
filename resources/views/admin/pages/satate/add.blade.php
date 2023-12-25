@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add Designation - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/designation-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('designation.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="mobile">Name</label>
                    <input type="text" id="name" name="name" class="form-control phone-mask @error('name') is-invalid @enderror" value="{{ old('mobile') }}" placeholder="Department Name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Address</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Address">{{ old('address') }}</textarea>
                    @error('description')
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
