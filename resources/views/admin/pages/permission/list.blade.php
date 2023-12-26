@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Permissions - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/permission-nav',['activeTab' => 'list'] )
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
            @foreach ($permissions as $key => $item)
                <tr>
                    <td>{{$permissions->firstItem() + $key}}</td>
                    <td>
                        <strong>{{$item->name }}</strong>
                    </td>
                    <td>
                        <div class="dropdown">
                            @can('can-permission-create')
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            @endcan
                            <div class="dropdown-menu">
                                @can('can-permission-edit')
                                    <a class="dropdown-item" href="{{route('permissions.edit',['permission' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                @endcan
                                @can('can-permission-status-change')
                                    <a class="dropdown-item" onclick="confirmationStatus('permissions',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                                @endcan
                                @can('can-permission-delete')
                                    <a class="dropdown-item" onclick="confirmationDelete('permissions',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

    </div>
    <div class="col-lg-8">
        <div class="demo-inline-spacing  justify-content-end">
            {!! $permissions->links() !!}
        </div>
      </div>
</div>



@endsection

