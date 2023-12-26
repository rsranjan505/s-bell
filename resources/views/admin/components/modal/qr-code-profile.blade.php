@if (isset($item))
<div class="modal fade" id="qrprofile_{{$item->id}}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-scrollable"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Qr Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('qr-code.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="house_number">House Number</label>
                        <input type="text" id="house_number" name="house_number" class="form-control phone-mask @error('house_number') is-invalid @enderror" value="{{ old('house_number') }}" placeholder="House Number" />
                        @error('house_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="full_address">Full Address</label>
                        <textarea type="text" id="full_address" name="full_address" class="form-control phone-mask @error('full_address') is-invalid @enderror" value="{{ old('full_address') }}" placeholder="Full Address "> </textarea>
                        @error('full_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
