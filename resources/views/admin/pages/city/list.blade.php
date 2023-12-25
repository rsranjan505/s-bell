@extends('admin.layouts.contentNavbarLayout')

@section('title', 'City - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/city-nav',['activeTab' => 'list'] )
    <hr>

    <div class="card mb-4">
        <div class="card-body">
        <div class="card-body">
            <div class="row gy-3">
            <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Search city</label>
                    <input class="form-control" id="search" type="search" placeholder="Search ..." id="html5-search-input" />
                </div>
            </div>
            <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Filter</label>
                    <select class="form-select" id="state_id" aria-label="Default select example">
                        <option value="" selected>Select State</option>
                        @foreach ($states as $item)
                            <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>
        </div>
        <hr class="m-0" />
            <div class="table-responsive ">
            <table class="table table-hover">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>City Name</th>
                    <th>State</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @include('admin.pages.city.filter-city')
                </tbody>
            </table>

            </div>
        </div>
    </div>
</div>

  <script type="text/javascript">
        $('#state_id').on('click', function(event){
            $('#search').val("");
        });
        $('#search').on('click', function(event){
            $('#state_id').val("");
        });
        $(document).ready(function(){
        const fetch_data = (page, state_id, seach_term) => {
            if(state_id === undefined){
                state_id = "";
            }
            if(seach_term === undefined){
                seach_term = "";
            }
            $.ajax({
                url:"city/?page="+page+"&state_id="+state_id+"&seach_term="+seach_term,
                success:function(data){
                    console.log(data);
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        $('body').on('keyup', '#search', function(){
            var state_id = $('#state_id').val();
            var seach_term = $('#search').val();
            var page = $('#hidden_page').val();
            fetch_data(page, state_id, seach_term);
        });

        $('body').on('change', '#state_id', function(){
            var state_id = $('#state_id').val();
            var seach_term = $('#search').val();
            var page = $('#hidden_page').val();
            fetch_data(page, state_id, seach_term);
        });

        $('body').on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var state_id = $('#state_id').val();
            var seach_term = $('#search').val();

            fetch_data(page,state_id, seach_term);
        });
    });

    </script>
@endsection


{{-- @extends('admin.layouts.base')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @include('admin.components.header-nav.city-nav',['activeTab' => 'list'] )
                    <div class="card-body">
                        <div class="row w-100 mx-0">
                            <h4 class="card-title">City List</h4>
                            </p>
                            <div style="margin-right:0px; margin-left:auto;" >
                                <div class="row mb-6">

                                    <div class="col-md-12">
                                        <select  class="form-control" name="state_id" id="state_id">
                                            <option> select state</option>
                                            @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table city-table">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>State</th>
                                            <th>City Name</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#state_id').on('change', function () {
        var state_id = $('#state_id').val();
        $('.city-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            destroy: true,
            ajax: {
                url: "{{ route('cities-list') }}",
                data: {
                    state_id: state_id,
                },
                type: 'get',
                headers: { 'content-type': 'application/x-www-form-urlencoded', 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                async: true,
                error: function (jqXHR, textStatus, errorThrown) {
                    $.each(jqXHR.responseJSON.errors, function (key, value) {
                        $('#' + key + 'Error').html('<i class="fa-solid fa-triangle-exclamation"></i>&nbsp' + value);
                    });
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "SL No",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                },
                {   data: 'State',
                    name: 'State',
                },
                {data: 'City Name', name: 'City Name'},
            ]
        });
    });

    $(function () {


    });
});
  </script>

@endsection --}}
