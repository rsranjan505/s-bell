@if (isset($item))
<div class="modal fade" id="team_{{$item->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Assigned Team</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('team.assigned')}}">
        <div class="modal-body">

                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Team Name</label>
                        <select id="team_id" name="team_id" class="form-select">
                            <option value="">Select team</option>
                            @foreach ($teams as $team)
                                <option value="{{$team->id}}" {{ $item->team_id == $team->id ? 'selected' : ''}}>{{ $team->name}} {{ $team->leader !=null ? ' (' .$team->leader->first_name.')' : ''}}</option>
                            @endforeach
                        </select>
                    </div>
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

