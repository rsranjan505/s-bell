@if (count($customers) > 0)
    @foreach ($customers as $key => $item)
    <tr>
        <td>{{$customers->firstItem() + $key}}</td>
        <td>
            @if ($item->image)
                <img data-bs-toggle="modal" data-bs-target="#viewImage_{{$item->id}}" src="{{$item->image->url}}" width="50px" alt="Avatar" class="rounded-circle">
            @else
                <img data-bs-toggle="modal" data-bs-target="#viewImage_{{$item->id}}" src="http://anirachemicals.com/admin/assets/images/customer.png"  width="50px" alt="Avatar" class="rounded-circle">
            @endif
        </td>
        <td>
            {{ucfirst($item->first_name)}}  {{ ucfirst($item->key_person)}}
        </td>

        <td>
            {{$item->email }}
        </td>
        <td>
            {{$item->mobile }}
        </td>
        <td>
            {{ $item->city ? ucfirst($item->city->name) : ''  }}
        </td>
        <td>
            @if ($item->status == 1)
                <span class="badge bg-label-warning me-1">Open - Not Contacted</span>
            @elseif ($item->status == 2)
                <span class="badge bg-label-info me-1">Working - Contacted</span>
            @elseif ($item->status == 3)
                <span class="badge bg-label-success me-1">Closed - Converted</span>
            @elseif ($item->status == 4)
                <span class="badge bg-label-danger me-1">Closed - Not Converted</span>
            @endif

        </td>

        <td>
            {{$item->created_at->format('d-m-Y g:i A') }}
        </td>
        <td>
            <div class="dropdown">
                @can('can-customer-create')
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                @endcan
                <div class="dropdown-menu">
                    @can('can-customer-view-log')
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#statuslog_{{$item->id}}"  href="javascript:void(0);"><i class="bx bx-group me-1"></i> customer Logs</a>
                    @endcan

                    @can('can-customer-view')
                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#customerView_{{$item->id}}"><i class="bx bx-show-alt me-1"></i> View</a>
                    @endcan

                    @can('can-customer-edit')
                        <a class="dropdown-item" href="{{route('customer.edit',['customer' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    @endcan

                    @can('can-customer-status-change')
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#customerstatus_{{$item->id}}" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                    @endcan

                    @can('can-customer-delete')
                        <a class="dropdown-item" onclick="confirmationDelete('customer',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    @endcan
                </div>
            </div>
        </td>
    </tr>

    {{-- @include('admin.components.modal.status-log',['item' => $item] )
    @include('admin.components.modal.image-view',['item' => $item] )
    @include('admin.components.modal.customer-status',['item' => $item] )
    @include('admin.components.modal.customer-view',['customer' => $item] ) --}}
    @endforeach

    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td colspan="3" align="center">
                {!! $customers->links() !!}
            </td>
        </div>
    </tr>

@else
    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td id="norecord" colspan="6" align="center">
            No records Found.
            </td>
        </div>
    </tr>
@endif
