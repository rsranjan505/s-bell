@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Roles - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/role-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="table-responsive ">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($roles as $key => $item)
                <tr>
                    <td>{{$roles->firstItem() + $key}}</td>
                    <td>
                        <strong>{{$item->name }}</strong>
                    </td>
                    <td>
                        <div class="dropdown">
                            @can('can-role-create')
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            @endcan
                            <div class="dropdown-menu">
                                @can('can-role-edit')
                                    <a class="dropdown-item" href="{{route('roles.edit',['role' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                @endcan
                                @can('can-role-status-change')
                                    <a class="dropdown-item" onclick="confirmationStatus('roles',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                                @endcan
                                @can('can-role-delete')
                                    <a class="dropdown-item" onclick="confirmationDelete('roles',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

    </div>

    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table> --}}

</div>


<div class="col-lg-8">
    <div class="demo-inline-spacing  justify-content-end">
        {{-- {!! $roles->links() !!} --}}
    </div>
  </div>
@endsection
{{-- @extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin/components/header-nav/admin-user-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">User List</h4>
                            </p>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>User Type</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script type="text/javascript">
    $(function () {

      var table = $('.user-table').DataTable({
        processing: true,
        serverSide: false,
        paging: true,
          destroy: true,
          ajax: "{{ route('user-list') }}",
          columns: [
            {
                data: "DT_RowIndex",
                name: "SL No",
                className: "text-center",
                orderable: false,
                searchable: false,
            },
            {   data: 'Image',
                name: 'Image',
            },
            {data: 'First Name', name: 'First Name'},
            {data: 'Last Name', name: 'Last Name'},
            {data: 'Email', name: 'Email'},
            {data: 'Mobile', name: 'Mobile'},
            {data: 'User Type', name: 'User Type'},
            {data: 'Address', name: 'Address'},
            {data: 'City', name: 'City'},
            {data: 'State', name: 'State'},
            {data: 'Pincode', name: 'Pincode'},
            {data: 'Created Date', name: 'Created Date'},
            {data: 'Status', name: 'Status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    });
  </script>

@endsection --}}
