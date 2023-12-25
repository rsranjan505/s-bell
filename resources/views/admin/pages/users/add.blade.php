@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add User - Sortie Services')
@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/page-auth.css')}}">
@endsection
@section('content')
<div class="row">
    @include('admin/components/header-nav/admin-user-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">

            <form method="POST" action="{{ route('admin-user-save') }}">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-check form-switch mb-2">
                            <label>{{ Form::checkbox('checkcustomer', 1, false, array('class' => 'form-check-input','id'=>"flexSwitchCheckChecked")) }}
                            Is Customer  </label>
                        </div>
                    </div>
                <hr/>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" />
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" />
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>

                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" aria-describedby="email" />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="mobile">Phone No</label>
                    <input type="text" id="mobile" name="mobile" class="form-control phone-mask @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" placeholder="658 799 8941" />
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">{{ old('address') }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">State</label>
                            <select id="state_id" name="state_id" class="form-select">
                                <option>Select</option>
                                @foreach ($data['state'] as $state)
                                    @if (old('state_id') == $state->id)
                                        <option value="{{$state->id}}" selected>{{ $state->name}}</option>
                                    @endif
                                    <option value="{{$state->id}}">{{ $state->name}}</option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">City</label>
                            <select id="city_id" name="city_id" class="form-select">
                                <option value="" >Select State First</option>
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Pincode</label>
                            <input type="text" value="{{old('pincode')}}" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="Pincode" />
                            @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>

                <div id="foremployee">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Roles</label>
                                <select id="roles" name="roles"  class="form-select @error('roles') is-invalid @enderror">
                                    <option>Select</option>
                                    @foreach ($data['roles'] as $role)
                                        @if (old('roles') == $role->id)
                                            <option value="{{$role->id}}" selected>{{ $role->name}}</option>
                                        @endif
                                        <option value="{{$role->id}}">{{ $role->name}}</option>
                                    @endforeach
                                  </select>
                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">User Type</label>
                                    <select id="user_type" name="user_type"  class="form-select @error('user_type') is-invalid @enderror">

                                        <option value="admin" {{ old('user_type') == 'admin' ? 'slected' : ''}}>Admin</option>
                                        <option value="employee"  {{ old('user_type') == 'employee' ? 'slected' : ''}}>Employee</option>
                                        <option value="agent"  {{ old('user_type') == 'agent' ? 'slected' : ''}}>Agent</option>
                                        <option value="users"  {{ old('user_type') == 'users' ? 'slected' : ''}}>Users</option>
                                    </select>
                                    @error('user_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="department_id">Department</label>
                                <select id="department_id" name="department_id" class="form-select">
                                    <option value="">Select Department</option>
                                    @foreach ($data['departments'] as $department)
                                        @if (old('department_id') == $department->id)
                                            <option value="{{$department->id}}" selected>{{ $department->name}}</option>
                                        @endif
                                        <option value="{{$department->id}}">{{ $department->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="designation_id">Designation</label>
                                <select id="designation_id" name="designation_id" class="form-select">
                                    <option value="">Select Designation</option>
                                    @foreach ($data['designations'] as $designation)
                                        @if (old('designation_id') == $designation->id)
                                            <option value="{{$designation->id}}" selected>{{ $designation->name}}</option>
                                        @endif
                                        <option value="{{$designation->id}}">{{ $designation->name}}</option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="first_name">Password</label>
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
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Password Confirmation</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
     var ele = $('#foremployee');
    $('#flexSwitchCheckChecked').on( "change", function() {

        if( $( '#flexSwitchCheckChecked' ).prop( "checked" )){
            ele.css('display','none');
        }else{
            ele.css('display','block');
        }
    });
    if( $( '#flexSwitchCheckChecked' ).prop( "checked" )){
        ele.css('display','none');
    }else{
        ele.css('display','block');
    }
</script>

@endsection
