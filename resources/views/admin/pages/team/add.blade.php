@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add Team - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/team-nav',['activeTab' => 'add'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('team.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="mobile">Name</label>
                    <input type="text" id="name" name="name" class="form-control phone-mask @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Department Name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Team Leader</label>
                    <select id="team_lead_id" name="team_lead_id" class="form-select @error('team_lead_id') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach ($users as $item)
                            @if(in_array($item->user_type,['employee','agnet']))
                                <option value="{{$item->id}}">{{$item->first_name .' ('.$item->first_name .')' }}</option>
                            @endif
                        @endforeach
                      </select>
                      @error('team_lead_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Assigned Maneger</label>
                    <select id="team_manager_id" name="team_manager_id" class="form-select @error('team_manager_id') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach ($users as $item)
                            @if(in_array($item->user_type,['employee','agnet']))
                                <option value="{{$item->id}}">{{$item->first_name .' ('.$item->first_name .')' }}</option>
                            @endif
                        @endforeach
                      </select>
                      @error('team_manager_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
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
