@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add City - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/city-nav',['activeTab' => 'edit'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('city.update',['city' => $city]) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label" for="mobile">Name</label>
                    <input type="text" id="name" name="name" class="form-control phone-mask @error('name') is-invalid @enderror" value="{{ $city->name }}" placeholder="Name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">State</label>
                    <select class="form-select" id="state_id" name="state_id" aria-label="Default select example">
                        <option value="" selected>Select State</option>
                        @foreach ($states as $item)
                            <option value="{{$item->id}}" {{ $city->state_id == $item->id ? 'selected' : '' }}>{{ $item->name}}</option>
                        @endforeach
                    </select>

                    @error('state_id')
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
