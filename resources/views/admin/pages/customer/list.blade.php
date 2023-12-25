@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User customers - Sortie Services')

@section('content')
<div class="row">
    @include('admin.components.header-nav.customer-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-10">
                <div class="col-md">
                    <div class="form-check mt-3">
                        <label for="defaultSelect" class="form-label">Search</label>
                        <input class="form-control" id="search" type="search" placeholder="Search ..." id="html5-search-input" />
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="col-md">
                    {{-- <div class="form-check mt-3">
                        <form id="exportData" method="POST" action="{{ route('customer.export')}}">
                            @csrf
                            <button style="margin-top:25px;" class="btn btn-primary" type="submit" > <span class="tf-icons bx bx-download"></span> Export </button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
        <div id="accordionIcon" class="accordion mt-3 ">
            <div class="accordion-item card">
              <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                  Advanced Filter
                </button>
              </h2>
              <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">State</label>
                                    <select id="state_id" name="state_id" class="form-select">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}">{{ $state->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By City</label>
                                    <select class="form-select filter"  onchange="getFilterValue(this,'city')"  id="city_id" aria-label="Default select example">
                                        <option value="" selected>Select City</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By Status</label>
                                    <select class="form-select filter"  onchange="getFilterValue(this,'status')"  id="status" aria-label="Default select example">
                                        <option value="">Select</option>
                                        <option value="1">Open - Not Contacted</option>
                                        <option value="2">Working - Contacted</option>
                                        <option value="3">Closed - Converted</option>
                                        <option value="4">Closed - Not Converted</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="col-md">
                                        <div class="form-check mt-3">
                                            <label for="defaultSelect" class="form-label">Start Date</label>
                                            <input class="form-control filter" type="date" id="startDate" name="startDate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-md">
                                        <div class="form-check mt-3">
                                            <label for="defaultSelect" class="form-label">End Date</label>
                                            <input class="form-control filter" type="date" id="endDate" name="endDate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md">
                                        <div class="form-check mt-3">
                                            <button style="margin-top:25px;" class="btn btn-primary" type="button" onclick="findByDate()" >Find </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By Joining Date</label>
                                    <input class="form-control filter" type="date" id="joining_date" name="joining_date" id="html5-date-input" />
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By Roles</label>
                                    <select class="form-select filter" onchange="getFilterValue(this,'role')" id="role" aria-label="Default select example">
                                        <option value="" selected>Select Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By City</label>
                                    <select class="form-select" id="designation" aria-label="Default select example">
                                        <option value="" selected>Select City</option>
                                        @foreach ($designations as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    <hr>
    <div class="card-body">
        <div class="table-responsive ">
        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @include('admin.pages.customer.filter-customer')
            </tbody>
        </table>
        <input type="hidden" id="type">
        </div>
    </div>
</div>

<script type="text/javascript">

var filterEleId = '';
     $('body').on('click', '#search', function(event){
        $('.filter').val('');
        fetch_data(1,"","");
     });
     $('body').on('click', '.filter', function(event){
        $('#search').val('');
     });

    // $(document).ready(function(){

    const fetch_data = (page, filter_item, seach_term,type=null) => {
        if(seach_term === undefined){
            seach_term = "";
        }
        if(filter_item === undefined){
            filter_item = "";
        }
        $.ajax({
            url:"customer/?page="+page,
            data:{filter_item:filter_item,seach_term:seach_term,type:type},
            success:function(data){
                $('tbody').html('');
                $('tbody').html(data);
            }
        })
    }

    $('body').on('keyup', '#search', function(){
        var filter_item = $(filterEleId).val();
        var seach_term = $('#search').val();
        var page = $('#hidden_page').val();
        fetch_data(page, filter_item, seach_term);
    });

    function  getFilterValue($this,type){
        $('#startDate').val("");
        $('#endDate').val("");

        filterEleId = $($this).attr('id');
        var filter_item = $this.value;
        var seach_term = $('#search').val();
        var page = $('#hidden_page').val();
        $('#type').val(type);
        fetch_data(page, filter_item, seach_term,type);
    }

    function findByDate(){

        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var filter_item = {
            'startDate':startDate,
            'endDate':endDate
        };
        $('#type').val(type);
        var page = $('#hidden_page').val();
        fetch_data(page, filter_item, "",'date');
    }

    // $('body').on('change', '#joining_date', function(){
    //     var filter_item = $('#date').val();
    //     var seach_term = $('#search').val();
    //     var page = $('#hidden_page').val();
    //     fetch_data(page, filter_item, seach_term,'date');
    // });

    $('body').on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var filter_item = '';
        if(filterEleId !=''){
            filter_item = $('#'+filterEleId).val();
        }

        var seach_term = $('#search').val();

        fetch_data(page,filter_item, seach_term);
    });


    //export Data
    $(document).ready(function(){
        $("#exportData").on("submit", function(e){
            e.preventDefault();
            var filter_item = '';
            if(filterEleId !='' && filterEleId !='undefined'){
                var filter_item = $('#'+filterEleId).val();
            }
            var seach_term = $('#search').val();
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var type = $('#type').val();
            if((startDate != undefined && endDate != undefined) && (startDate != '' && endDate != '')){
                filter_item = {
                    'startDate':startDate,
                    'endDate':endDate
                };
            }
            if(seach_term === undefined){
                seach_term = "";
            }
            if(filter_item === undefined){
                filter_item = "";
            }
        $.ajax({
            xhrFields: {
                responseType: 'blob',
            },
            url:"customer/export",
            type: 'post',
            data:{filter_item:filter_item,seach_term:seach_term,type:type},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(result, status, xhr){
                var disposition = xhr.getResponseHeader('content-disposition');
                var matches = /"([^"]*)"/.exec(disposition);
                var filename = (matches != null && matches[1] ? matches[1] : 'customer-report.csv');

                // The actual download
                var blob = new Blob([result], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;

                document.body.appendChild(link);

                link.click();
                document.body.removeChild(link);
            }
        })

        });//submit
    });//document ready

</script>

@endsection
