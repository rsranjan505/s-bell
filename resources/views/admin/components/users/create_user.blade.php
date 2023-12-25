
    <form class="form-sample" method="POST" action="{{ route('user/create') }}">
        @csrf
        <p class="card-description">

        </p>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input id="email" type="email" name="email" class="form-control" @error('email') is-invalid @enderror/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input id="password-confirm" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">is Super Admin</label>
                    <div class="col-sm-9">
                        <select  id="is_admin" type="text" name="is_admin" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Roles</label>
                    <div class="col-sm-9">
                        <select id="role" type="text" name="role" class="form-control">
                            <option value="">--select--</option>
                            <option value="adminuser">Admin User</option>
                            <option value="kitchen">Kitchen</option>
                            <option value="deliveryboy">Delivery Boy</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">is Active</label>
                    <div class="col-sm-9">
                        <div class="col-sm-9">
                            <select id="is_active" type="text" name="is_active" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <hr>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
