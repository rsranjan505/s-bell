@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User Enquiry - Sortie Services')

@section('content')
<div class="row">
    {{-- @include('admin.components.header-nav.enquiry-nav',['activeTab' => 'list'] ) --}}
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md">
                            <div class="form-check mt-3">
                                <label for="defaultSelect" class="form-label">Filter By Status</label>
                                <select class="form-select filter"  onchange="getFilterValue(this)"  id="status" aria-label="Default select example">
                                    <option value="">Select</option>
                                    <option value="contacted">Contacted</option>
                                    <option value="not_contacted">Not Contacted</option>
                                    <option value="other">Other</option>
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
            </div>
            <div class="col-md-2">
                <div class="col-md">
                    <div class="form-check mt-3">
                        <form id="exportData" method="POST" action="{{ route('enquiry.export')}}">
                            @csrf
                            <button style="margin-top:25px;" class="btn btn-primary" type="submit" > <span class="tf-icons bx bx-download"></span> Export </button>
                        </form>
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
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @include('admin.pages.enquiry.filter-enquiry')
            </tbody>
        </table>
        <input type="hidden" id="type">
        </div>
    </div>
</div>

<script type="text/javascript">

var filterEleId = '';

    // $(document).ready(function(){

    const fetch_data = (page, filter_item) => {

        $.ajax({
            url:"enquiry/?page="+page,
            data:{filter_item:filter_item},
            success:function(data){
                $('tbody').html('');
                $('tbody').html(data);
            }
        })
    }

    function  getFilterValue($this){
        $('#startDate').val("");
        $('#endDate').val("");

        filterEleId = $($this).attr('id');
        var filter_item = $this.value;
        var page = $('#hidden_page').val();
        $('#type').val(type);
        fetch_data(page, filter_item);
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
        fetch_data(page, filter_item);
    }

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
            var filter_item = $('#'+filterEleId).val();
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
            url:"enquiry/export",
            type: 'post',
            data:{filter_item:filter_item,seach_term:seach_term,type:type},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(result, status, xhr){
                var disposition = xhr.getResponseHeader('content-disposition');
                var matches = /"([^"]*)"/.exec(disposition);
                var filename = (matches != null && matches[1] ? matches[1] : 'enquiry-report.csv');

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
