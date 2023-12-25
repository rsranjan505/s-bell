@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User Departments - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/departments-nav',['activeTab' => 'list'] )
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
                @foreach ($departments as $key => $item)
                    <tr>
                        <td>{{$departments->firstItem() + $key}}</td>
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
                                <a class="dropdown-item" href="{{route('departments.edit',['department' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" onclick="confirmationStatus('departments',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                                <a class="dropdown-item" onclick="confirmationDelete('departments',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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
        {!! $departments->links() !!}
    </div>
  </div>
@endsection
