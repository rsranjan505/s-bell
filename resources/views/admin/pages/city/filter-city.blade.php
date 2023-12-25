@foreach ($cities as $key => $item)
    <tr>
        <td>{{$cities->firstItem() + $key}}</td>
        <td>
            <strong>{{$item->name }}</strong>
        </td>
        <td>
            {{$item->state->name}}
        </td>

        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('city.edit',['city' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" onclick="confirmationDelete('city',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>

@endforeach
<tr style="margin-top: 10px;">
    <td colspan="3" align="center">
        {!! $cities->links() !!}
    </td>
</tr>

