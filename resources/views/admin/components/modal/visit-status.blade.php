@if (isset($item))
<div class="modal fade" id="visitstatus_{{$item->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Change Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('visit.status.update')}}">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">Select</option>
                    <option value="1" {{ $item->status == 1 ? 'selected' : ''}}>Open - Not Contacted</option>
                    <option value="2" {{ $item->status == 2 ? 'selected' : ''}}>Working - Contacted</option>
                    <option value="3" {{ $item->status == 3 ? 'selected' : ''}}>Closed - Converted</option>
                    <option value="4" {{ $item->status == 4 ? 'selected' : ''}}>Closed - Not Converted</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endif

