@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add City - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/city-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('city.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="mobile">Name</label>
                    <input type="text" id="name" name="name" class="form-control phone-mask @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="City Name" />
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
                            @if (old('state_id') == $item->id)
                                <option value="{{$item->id}}" selected>{{ $item->name}}</option>
                            @endif
                            <option value="{{$item->id}}">{{ $item->name}}</option>
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


{{-- @extends('admin.layouts.base')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            @include('admin/components/header-nav/city-nav',['activeTab' => 'add'] )

            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('cities-save') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Select State') }}</label>
                        <div class="col-md-6">
                            <select  class="form-control form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id" required>
                                <option> Select state</option>
                                @foreach ($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('City Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#state_id').on('change', function () {
        let state_id = this.value;
        $.ajax({
            url: "/city/"+state_id,
            type: "get",

            success: function (res) {
                let html = "";
                html += '<select id="city_id" type="text" name="city_id" search class="form-control">';
                res.forEach((val, key) => {
                    html += "<option value=" + val.id + ">" + val.name + "</option>";
                });
                html += '</select>';
                $("#city_id").html("");
                $("#city_id").html(html);
            },
        });
    });
</script>
@endsection --}}
