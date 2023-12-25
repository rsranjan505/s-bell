@if (count($users) > 0)
    @foreach ($users as $key => $item)
        <tr>
            <td>{{$users->firstItem() + $key}}</td>
            <td>{{'Emp-'. $item->id }}</td>
            <td>
                @if ($item->image)
                    <img src="{{$item->image->url}}" width="50px" alt="Avatar" class="rounded-circle">
                @else
                    <img src="http://anirachemicals.com/admin/assets/images/accounticon.png"  width="50px" alt="Avatar" class="rounded-circle">

                @endif
            </td>
            <td>
            <strong>{{$item->first_name .' '.$item->last_name}}</strong>
            </td>
            <td>
                {{$item->email}}
            </td>
            <td>
                {{$item->mobile}}
            </td>
            <td>
                {{$item->department ? $item->department->name : ''}}
            </td>
            <td>
                {{$item->designation ? $item->designation->name : ''}}
            </td>
            <td>
                {{$item->city ? $item->city->name : ''}}
            </td>
            <td>
                {{$item->joining_date}}
            </td>
            <td>
                {{$item->team ? $item->team->name : ''}}
            </td>
            <td>
                <span class="badge bg-label-{{$item->is_active ==1 ? 'success' : 'warning'}} me-1">{{$item->is_active ==1 ? 'Active' : 'In Active'}}</span>
            </td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#team_{{$item->id}}"><i class="bx bx-edit-alt me-1"></i> Assigend Team</a>
                        <a class="dropdown-item" href="{{route('admin-user-edit',['id' => $item->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" onclick="confirmationStatus('user',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                        <a class="dropdown-item" onclick="confirmationDelete('user',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        @include('admin/components/modal/team',['item' => $item] )
    @endforeach
    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td colspan="3" align="center">
                {!! $users->links() !!}
            </td>
        </div>
    </tr>
@else
<tr style="margin-top: 10px;">
    <div class="demo-inline-spacing  justify-content-end">
        <td id="norecord" colspan="3" align="center">
           No records Found.
        </td>
    </div>
</tr>
@endif
