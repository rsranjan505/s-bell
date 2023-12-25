@if (isset($vendor))
<div class="modal fade" id="vendorView_{{$vendor->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Vendor View</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="key_person">Name Of Establishment</strong>
                        <input type="text" class="without-border" disabled  value="{{ $vendor->name_of_establishment }}"/>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        @php
                            if ($vendor->establishment_type == 1){
                                $type = 'Individual';
                            }
                            elseif ($vendor->establishment_type == 2){
                                $type = 'LLP';
                            }

                            elseif ($vendor->establishment_type == 3){
                                $type = 'OPC';
                            }

                            elseif ($vendor->establishment_type == 4){
                                $type = 'Propietorship';
                            }

                            elseif ($vendor->establishment_type == 5){
                                $type = 'Partnership';
                            }

                            elseif ($vendor->establishment_type == 6){
                                $type = 'Pvt. Ltd.';
                            }
                            elseif ($vendor->establishment_type == 7){
                                $type = 'Ltd.';
                            }

                            elseif ($vendor->establishment_type == 8){
                                $type = 'Other';
                            }

                        @endphp

                        <strong for="key_person">Establishment Type</strong>
                        <input type="text" class="without-border" disabled value="{{ $type }}"/>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <strong for="key_person">Key Person Name</strong>
                <input type="text"class="without-border" disabled  value="{{ $vendor->key_person }}" placeholder="Key Person Name" />

            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="email">Email</strong>
                        <input type="text" class="without-border" disabled  value="{{ $vendor->email }}"  />

                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="mobile">Mobile</strong>
                        <input type="text" class="without-border" disabled  value="{{ $vendor->mobile }}"  />

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <strong for="address">Address</strong></br>
                <input class="without-border" disabled value="{{ $vendor->address }}"/>

            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="mb-3">
                        <strong>State</strong>
                        <input type="text" class="without-border" disabled  value="{{ $vendor->state ? $vendor->state->name : '' }}"  />

                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">City</strong>
                        <input type="text" class="without-border" disabled  value="{{ $vendor->city ? $vendor->city->name : '' }}"  />

                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">Pincode</strong>
                        <input type="text" value="{{$vendor->pincode}}" class="without-border" disabled  />

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">Latitude</strong>
                        <input type="text" class="without-border" disabled  value="{{$vendor->latitude }}"  />
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">Longitude</strong>
                        <input type="text" class="without-border" disabled  value="{{$vendor->longitude }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="status">Status</strong>
                        <select class="without-border" disabled >
                            <option value="">Select</option>
                            <option value="1" {{ $vendor->status == 1 ? 'selected' : ''}}>Open - Not Contacted</option>
                            <option value="2" {{ $vendor->status == 2 ? 'selected' : ''}}>Working - Contacted</option>
                            <option value="3" {{ $vendor->status == 3 ? 'selected' : ''}}>Closed - Converted</option>
                            <option value="4" {{ $vendor->status == 4 ? 'selected' : ''}}>Closed - Not Converted</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="source">Source</strong>
                        <select class="without-border" disabled >
                            <option value="Website" {{ $vendor->source == 'Website' ? 'selected' : ''}}>Website</option>
                            <option value="Phone Inquiry" {{ $vendor->source == 'Phone Inquiry' ? 'selected' : ''}}>Phone Inquiry</option>
                            <option value="Partner Referal" {{ $vendor->source == 'Partner Referal' ? 'selected' : ''}}>Partner Referal</option>
                            <option value="Other" {{ $vendor->source == 'Other' ? 'selected' : ''}}>Other</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="mb-3">
                <strong for="volume">Notes</strong>
                <input type="text" class="without-border" disabled  value="{{ $vendor->description }}"  />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif
