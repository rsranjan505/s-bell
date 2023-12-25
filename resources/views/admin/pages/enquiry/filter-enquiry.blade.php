@if (count($enquiry) > 0)
    @foreach ($enquiry as $key => $item)
    <tr>
        <td>{{$enquiry->firstItem() + $key}}</td>

        <td>
            {{ucfirst($item->name)}}
        </td>

        <td>
            {{$item->email }}
        </td>
        <td>
            {{$item->mobile }}
        </td>
        <td>
            {{ ucfirst($item->subject)}}
        </td>
        <td>
            {{ $item->message }}
        </td>
        <td>
            @if ($item->status == 'contacted')
                <span class="badge bg-label-success me-1">Working - Contacted</span>
            @elseif ($item->status == 'not_contacted')
                <span class="badge bg-label-danger me-1">Working - Contacted</span>
            @elseif ($item->status == 'other')
                <span class="badge bg-label-info me-1">Other</span>
            @endif

        </td>
        <td>
            {{$item->remarks}}
        </td>
        <td>
            {{$item->created_at->format('d-m-Y g:i A') }}
        </td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">

                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enquirytatus_{{$item->id}}" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Add Remarks</a>
                    <a class="dropdown-item" onclick="confirmationDelete('visit',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>

    {{-- @include('admin.components.modal.status-log',['item' => $item] )
    @include('admin.components.modal.image-view',['item' => $item] )
    @include('admin.components.modal.visit-status',['item' => $item] )
    @include('admin.components.modal.visit-view',['visit' => $item] ) --}}
    @endforeach

    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td colspan="3" align="center">
                {!! $enquiry->links() !!}
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
