@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add Roles - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/role-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="mobile">Name</label>
                            <input type="text" id="name" name="name" class="form-control phone-mask @error('name') is-invalid @enderror" placeholder="Name" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <strong>Permission:</strong>
                            <br/> <br/>
                            <div class="row">
                                @php
                                    $old=0;
                                @endphp
                                @foreach($permission as $key => $value)
                                    @if ($old == $key)
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-check form-switch mb-2">
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'form-check-input','id'=>"flexSwitchCheckChecked")) }}
                                                {{ ucfirst($value->name) }}</label>
                                            </div>
                                        </div>
                                    @else
                                    @php
                                        $old = $key;
                                    @endphp
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-check form-switch mb-2">
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'form-check-input','id'=>"flexSwitchCheckChecked")) }}
                                                {{ ucfirst($value->name) }}</label>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
