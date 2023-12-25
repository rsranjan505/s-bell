@if (isset($item))
<div class="modal fade" id="statuslog_{{$item->id}}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-scrollable"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Status Logs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-1 col-sm-6">
                        <h6> # </h6>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label>Action</label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label>Changes</label>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label>Date</label>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label>Updated By</label>
                    </div>
                </div>
                @foreach ($item->statuslogs as $key => $log)
                <hr>
                    <div class="row">
                        <div class="col-md-1 col-sm-6">
                            <h6> {{ ++$key}} </h6>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <h6> {{ ucfirst($log->action)}}</h6>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h6>{{$log->changes}}</h6>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6>{{$log->created_at->format('d-m-Y g:i A')}}</h6>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <h6>{{ $log->creator ? ucfirst($log->creator->first_name) : ''}}</h6>
                        </div>

                    </div>
                @endforeach

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
