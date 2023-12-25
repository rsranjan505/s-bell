@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Designation - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/designation-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive ">
        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($designation as $key => $item)
                    <tr>
                        <td>{{$designation->firstItem() + $key}}</td>
                        <td>
                            <strong>{{$item->name }}</strong>
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            {{$item->creator->first_name}}
                        </td>
                        <td>
                            <span class="badge bg-label-{{$item->is_active ==1 ? 'success' : 'warning'}} me-1">{{$item->is_active ==1 ? 'Active' : 'In Active'}}</span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('designation.edit',['designation' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" onclick="confirmationStatus('designation',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                                <a class="dropdown-item" onclick="confirmationDelete('designation',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>


<div class="col-lg-8">
    <div class="demo-inline-spacing  justify-content-end">
        {!! $designation->links() !!}
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
