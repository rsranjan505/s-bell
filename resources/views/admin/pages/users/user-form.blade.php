
@if (\Request::route()->getName() == 'admin-user-edit')
    <div class="col-xl">
        <form method="POST"action="{{ route('admin-user-update') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4" >

                        @if ($user->image !=null)
                            <img style="width: 100px;" id="avatarPreview" class="d-block rounded" src="{{$user->image->url }}" alt="Card image cap" />
                        @else
                            <img style="width: 100px;" class="d-block rounded" id="avatarPreview" src="{{ asset('admin/assets/img/accounticon.png')}}" alt="your image" />
                        @endif
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload"  name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                        <div  style="position: absolute;right:0px;left:auto;">
                            <label for="html5-date-input" class="col-md-6 col-form-label">Joining Date</label>
                            <div class="col-md-10">
                            <input class="form-control" type="date" value="{{$user->joining_date }}" name="joining_date" id="html5-date-input" />
                            </div>
                        </div>

                </div>
            </div>
            <hr class="my-0">
            <div class="card mb-4">
                <div class="card-body">
                    <input id="id" type="hidden" name="id" value="{{ $user->id }}" class="form-control"/>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" />
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
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" />
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

                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ $user->email }}" aria-describedby="email" readonly />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mobile">Phone No</label>
                        <input type="text" id="mobile" name="mobile" class="form-control phone-mask @error('mobile') is-invalid @enderror" value="{{ $user->mobile }}" placeholder="658 799 8941" />
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">{{ $user->address }}</textarea>
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
                                <select id="state_id" name="state_id" class="form-select  @error('state_id') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach ($data['state'] as $state)
                                        <option value="{{$state->id}}" {{ $user->state_id == $state->id ? 'selected' : '' }}>{{ $state->name}}</option>
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
                                    @foreach ($data['city'] as $city)
                                        <option value="{{$city->id}}" {{$user->city_id == $city->id ? 'selected' : '' }}>{{ $city->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Pincode</label>
                                <input type="text" value="{{$user->pincode}}" class="form-control @error('pincode') is-invalid @enderror" name="pincode" id="pincode" placeholder="Pincode" />
                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Roles</label>
                                <select id="roles" name="roles" class="form-select  @error('roles') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach ($data['roles'] as $role)
                                        <option value="{{$role->id}}" {{ $role->name == (count($user->getRoleNames()) > 0 ? $user->getRoleNames()[0] : '') ? 'selected' : ''}}>{{ $role->name}}</option>
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
                                <label class="form-label" for="basic-default-fullname">Is Admin</label>
                                <select id="is_admin" name="is_admin" class="form-select">
                                    <option value="0" {{$user->is_admin ==0 ? 'selected' : ''}}>No</option>
                                    <option value="1" {{$user->is_admin ==1 ? 'selected' : ''}}>Yes</option>
                                </select>
                                @error('is_admin')
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
                                        <option value="{{$department->id}}" {{$user->department_id ==$department->id ? 'selected' : ''}}>{{ $department->name}}</option>
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

                                        <option value="{{$designation->id}}"  {{$user->designation_id ==$designation->id ? 'selected' : ''}}>{{ $designation->name}}</option>
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
                    <button type="submit" class="btn btn-primary">Update</button>

                </div>
            </div>
        </form>
    </div>
@else
<div class="col-xl">
    <form method="POST"action="{{ route('admin-user-update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4" >
                @if ($user->image !=null)
                    <img style="width: 100px;" id="avatarPreview" class="d-block rounded" src="{{$user->image->url }}" alt="Card image cap" />
                @else
                    <img style="width: 100px;" class="d-block rounded" id="avatarPreview" src="{{ asset('admin/assets/img/accounticon.png')}}" alt="your image" />
                @endif
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload"  name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
                    </label>
                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
                <div  style="position: absolute;right:0px;left:auto;">
                    <label for="html5-date-input" class="col-md-6 col-form-label">Joining Date</label>

                    <label for="html5-date-input" class=" col-md-6 col-form-label"><strong> {{$user->joining_date }}</strong></label>

                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="card mb-4">
            <div class="card-body">
                <input id="id" type="hidden" name="id" value="{{ $user->id }}" class="form-control"/>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"  value="{{ $user->first_name }}" placeholder="First Name" readonly/>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" readonly/>

                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>

                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ $user->email }}" aria-describedby="email" readonly />


                </div>
                <div class="mb-3">
                    <label class="form-label" for="mobile">Phone No</label>
                    <input type="text" id="mobile" name="mobile" class="form-control phone-mask @error('mobile') is-invalid @enderror" value="{{ $user->mobile }}" placeholder="658 799 8941" readonly/>

                    </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" readonly>{{ $user->address }}</textarea>

                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">State</label>
                            <select id="state_id" name="state_id" class="form-select  @error('state_id') is-invalid @enderror" disabled>
                                <option value="">Select</option>
                                @foreach ($data['state'] as $state)
                                    <option value="{{$state->id}}" {{ $user->state_id == $state->id ? 'selected' : '' }}>{{ $state->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">City</label>
                            <select id="city_id" name="city_id" class="form-select" disabled>
                                @foreach ($data['city'] as $city)
                                    <option value="{{$city->id}}" {{$user->city_id == $city->id ? 'selected' : '' }}>{{ $city->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Pincode</label>
                            <input type="text" value="{{$user->pincode}}" class="form-control @error('pincode') is-invalid @enderror" name="pincode" id="pincode" placeholder="Pincode" readonly/>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Roles</label>
                            <select id="roles" name="roles" class="form-select  @error('roles') is-invalid @enderror" disabled>
                                <option value="">Select</option>
                                @foreach ($data['roles'] as $role)
                                    <option value="{{$role->id}}" {{ $role->name == (count($user->getRoleNames()) > 0 ? $user->getRoleNames()[0] : '') ? 'selected' : ''}}>{{ $role->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Is Admin</label>
                            <select id="is_admin" name="is_admin" class="form-select" disabled>
                                <option value="0" {{$user->is_admin ==0 ? 'selected' : ''}}>No</option>
                                <option value="1" {{$user->is_admin ==1 ? 'selected' : ''}}>Yes</option>
                            </select>
                            @error('is_admin')
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
                            <select id="department_id" name="department_id" class="form-select" disabled>
                                <option value="">Select Department</option>
                                @foreach ($data['departments'] as $department)
                                    <option value="{{$department->id}}" {{$user->department_id ==$department->id ? 'selected' : ''}}>{{ $department->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="designation_id">Designation</label>
                            <select id="designation_id" name="designation_id" class="form-select" disabled>
                                <option value="">Select Designation</option>
                                @foreach ($data['designations'] as $designation)

                                    <option value="{{$designation->id}}"  {{$user->designation_id ==$designation->id ? 'selected' : ''}}>{{ $designation->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
        </div>
    </form>
</div>
@endif
