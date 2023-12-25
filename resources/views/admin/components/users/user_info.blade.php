

    <div class="row w-100 mx-0">
        <div class="col-md-9 grid-margin mx-auto">
            <div class="card">
                <div class="card-body">
                <form class="form-sample" method="POST" action="{{ route('user-info/update') }}">
                    @csrf
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">User ID</label>
                                <select  id="user_id" type="text" name="user_id" class="form-control">
                                    <option value="">Select user</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user['id']}}" {{isset($userId) ? $userId == $user['id'] ? 'selected' : '' : ''}}>{{$user['email']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">First Name</label>
                                <input id="first_name" type="text" name="first_name" class="form-control" value="{{$userInfo != null ? $userInfo['first_name'] : ''}}"/>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Last Name</label>
                                <input id="last_name" type="text" name="last_name" class="form-control" value="{{$userInfo != null ? $userInfo['last_name'] : ''}}"/>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" col-form-label">Mobile Number</label>
                                <input id="mobile" type="text" name="mobile" class="form-control" value="{{$userInfo != null ? $userInfo['mobile'] : ''}}"/>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="col-form-label">Alternative Mobile</label>
                                <input id="alt_mobile" type="text" name="alt_mobile" class="form-control" value="{{$userInfo != null ? $userInfo['alt_mobile'] : ''}}"/>
                                @error('alt_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Address</label>
                                <textarea id="address" type="text" name="address" class="form-control" value="{{$userInfo != null ? $userInfo['address'] : ''}}"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Landmark</label>
                                <input id="landmark" type="text" name="landmark" class="form-control" value="{{$userInfo != null ? $userInfo['landmark'] : ''}}"/>
                                @error('landmark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="col-form-label">City</label>
                                <input id="city" type="text" name="city" class="form-control" value="{{$userInfo != null ? $userInfo['city'] : ''}}"/>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Pincode</label>
                                <input id="pincode" type="text" name="pincode" class="form-control" value="{{$userInfo != null ? $userInfo['pincode'] : ''}}"/>
                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Latitude</label>
                                <input id="latitude" type="text" name="latitude" class="form-control" value="{{$userInfo != null ? $userInfo['latitude'] : ''}}"/>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Longitude</label>
                                <input id="longitude" type="text" name="longitude" class="form-control" value="{{$userInfo != null ? $userInfo['longitude'] : ''}}"/>

                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">is Active</label>
                                <select id="is_active" type="text" name="is_active" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#user_id').on('change', function(){
                var user_id = $('#user_id').val();
                var ajaxurl = '{{route('user/info/ajax', ':user_id')}}';

                ajaxurl = ajaxurl.replace(':user_id', user_id);
                alert(user_id);
                $.ajax({
                    url: ajaxurl,
                    type: "GET",
                    success: function(data){
                        $data = $(data); // the HTML content that controller has produced
                        $('#item-container').hide().html($data).fadeIn();
                    }
                });
            })
        });
    </script>


