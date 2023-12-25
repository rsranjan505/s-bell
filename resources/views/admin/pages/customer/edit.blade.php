@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Update customers - Sortie Services')

@section('content')
<div class="row">
    @include('admin.components.header-nav.customer-nav',['activeTab' => 'edit'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                customer Update
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('customer.update',['customer' => $customer]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4" >
                        @if ($customer->image !=null)
                            <img style="width: 100px;" id="avatarPreview" class="d-block rounded" src="{{$customer->image->url }}" alt="Card image cap" />
                        @else
                            <img style="width: 100px;" class="d-block rounded" id="avatarPreview" src="http://anirachemicals.com/admin/assets/images/customer.png" alt="your image" />
                        @endif

                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload customer image</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload"  capture="camera" name="avatar" multiple class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            {{-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if($errors->has('avatar'))
                        <strong class="alert-danger">{{ $errors->first('avatar') }}</strong>
                    @endif
                    <hr>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name_of_establishment">Name Of Establishment</label>
                            <input type="text" class="form-control @error('name_of_establishment') is-invalid @enderror" id="name_of_establishment" name="name_of_establishment" value="{{ $customer->name_of_establishment }}" placeholder="Name Of Establishment" />
                            @error('name_of_establishment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="establishment_type">Establishment Type</label>
                            <select id="establishment_type" name="establishment_type" class="form-select @error('establishment_type') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="1" {{ $customer->establishment_type == 1 ? 'selected' : ''}}>Individual</option>
                                <option value="2" {{ $customer->establishment_type == 2 ? 'selected' : ''}}>LLP</option>
                                <option value="3" {{ $customer->establishment_type == 3 ? 'selected' : ''}}>OPC</option>
                                <option value="4" {{ $customer->establishment_type == 4 ? 'selected' : ''}}>Propietorship</option>
                                <option value="5" {{ $customer->establishment_type == 5 ? 'selected' : ''}}>Partnership</option>
                                <option value="6" {{ $customer->establishment_type == 6 ? 'selected' : ''}}>Pvt. Ltd.</option>
                                <option value="7" {{ $customer->establishment_type == 7 ? 'selected' : ''}}>Ltd.</option>
                                <option value="8" {{ $customer->establishment_type == 8 ? 'selected' : ''}}>Other</option>
                            </select>
                            @error('establishment_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="key_person">Key Person Name</label>
                    <input type="text" class="form-control @error('key_person') is-invalid @enderror" id="key_person" name="key_person" value="{{ $customer->key_person }}" placeholder="Key Person Name" />
                    @error('key_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $customer->email }}" placeholder="Email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="mobile">Mobile</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ $customer->mobile }}" placeholder="Mobile" />
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h5><strong> Note:</strong> To find Latitude and Longitude you have to take shop image from your mobile with GPS/Location tag Enable setting then, you will get latitude and longitude in image description.</h5>
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">{{ $customer->address }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">State</label>
                            <select id="state_id" name="state_id" class="form-select @error('state_id') is-invalid @enderror">
                                <option value="">Select</option>
                                @foreach ($states as $state)
                                    @if ($customer->state_id == $state->id)
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
                            <select id="city_id" name="city_id" class="form-select @error('city_id') is-invalid @enderror">
                                <option value="">Select State First</option>
                                @foreach ($cities->where('state_id',$customer->state_id) as $city)
                                    <option value="{{$city->id}}" {{$customer->city_id == $city->id ? 'selected' : '' }}>{{ $city->name}}</option>
                                @endforeach
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
                            <input type="text" value="{{$customer->pincode}}" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="Pincode" />
                            @error('pincode')
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
                            <input type="hidden" id="latitude" name="latitude" value="{{$customer->latitude }}"  />
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <input type="hidden" id="longitude" name="longitude" value="{{$customer->longitude }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="1" {{ $customer->status == 1 ? 'selected' : ''}}>Open - Not Contacted</option>
                                <option value="2" {{ $customer->status == 2 ? 'selected' : ''}}>Working - Contacted</option>
                                <option value="3" {{ $customer->status == 3 ? 'selected' : ''}}>Closed - Converted</option>
                                <option value="4" {{ $customer->status == 4 ? 'selected' : ''}}>Closed - Not Converted</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="source">Source</label>
                            <select id="source" name="source" class="form-select @error('source') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="Website" {{ $customer->source == 'Website' ? 'selected' : ''}}>Website</option>
                                <option value="Phone Inquiry" {{ $customer->source == 'Phone Inquiry' ? 'selected' : ''}}>Phone Inquiry</option>
                                <option value="Partner Referal" {{ $customer->source == 'Partner Referal' ? 'selected' : ''}}>Partner Referal</option>
                                <option value="Other" {{ $customer->source == 'Other' ? 'selected' : ''}}>Other</option>
                            </select>
                            @error('source')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="volume">Notes</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $customer->description }}" placeholder="Description" />
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
