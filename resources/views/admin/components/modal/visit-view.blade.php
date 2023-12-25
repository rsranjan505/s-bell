@if (isset($visit))
<div class="modal fade" id="visitView_{{$visit->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Visit View</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14613.167032861855!2d90.433811!3d23.701273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b767a022cd4b%3A0xaf33907e219d127!2sRayerbag%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1675146270950!5m2!1sen!2sbd"></iframe>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="key_person">Name Of Establishment</strong>
                        <input type="text" class="without-border" disabled  value="{{ $visit->name_of_establishment }}"/>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        @php
                            if ($visit->establishment_type == 1){
                                $type = 'Individual';
                            }
                            elseif ($visit->establishment_type == 2){
                                $type = 'LLP';
                            }

                            elseif ($visit->establishment_type == 3){
                                $type = 'OPC';
                            }

                            elseif ($visit->establishment_type == 4){
                                $type = 'Propietorship';
                            }

                            elseif ($visit->establishment_type == 5){
                                $type = 'Partnership';
                            }

                            elseif ($visit->establishment_type == 6){
                                $type = 'Pvt. Ltd.';
                            }
                            elseif ($visit->establishment_type == 7){
                                $type = 'Ltd.';
                            }

                            elseif ($visit->establishment_type == 8){
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
                <input type="text"class="without-border" disabled  value="{{ $visit->key_person }}" placeholder="Key Person Name" />

            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="email">Email</strong>
                        <input type="text" class="without-border" disabled  value="{{ $visit->email }}"  />

                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="mobile">Mobile</strong>
                        <input type="text" class="without-border" disabled  value="{{ $visit->mobile }}"  />

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <strong for="address">Address</strong></br>
                <input class="without-border" disabled value="{{ $visit->address }}"/>

            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="mb-3">
                        <strong>State</strong>
                        <input type="text" class="without-border" disabled  value="{{ $visit->state ? $visit->state->name : '' }}"  />

                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">City</strong>
                        <input type="text" class="without-border" disabled  value="{{ $visit->city ? $visit->city->name : '' }}"  />

                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">Pincode</strong>
                        <input type="text" value="{{$visit->pincode}}" class="without-border" disabled  />

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">Latitude</strong>
                        <input type="text" class="without-border" disabled  value="{{$visit->latitude }}"  />
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="basic-default-fullname">Longitude</strong>
                        <input type="text" class="without-border" disabled  value="{{$visit->longitude }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="status">Status</strong>
                        <select class="without-border" disabled >
                            <option value="">Select</option>
                            <option value="1" {{ $visit->status == 1 ? 'selected' : ''}}>Open - Not Contacted</option>
                            <option value="2" {{ $visit->status == 2 ? 'selected' : ''}}>Working - Contacted</option>
                            <option value="3" {{ $visit->status == 3 ? 'selected' : ''}}>Closed - Converted</option>
                            <option value="4" {{ $visit->status == 4 ? 'selected' : ''}}>Closed - Not Converted</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                        <strong for="source">Source</strong>
                        <select class="without-border" disabled >
                            <option value="Website" {{ $visit->source == 'Website' ? 'selected' : ''}}>Website</option>
                            <option value="Phone Inquiry" {{ $visit->source == 'Phone Inquiry' ? 'selected' : ''}}>Phone Inquiry</option>
                            <option value="Partner Referal" {{ $visit->source == 'Partner Referal' ? 'selected' : ''}}>Partner Referal</option>
                            <option value="Other" {{ $visit->source == 'Other' ? 'selected' : ''}}>Other</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="mb-3">
                <strong for="volume">Notes</strong>
                <input type="text" class="without-border" disabled  value="{{ $visit->description }}"  />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif
