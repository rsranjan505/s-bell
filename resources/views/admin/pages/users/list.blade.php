@extends('admin.layouts.contentNavbarLayout')

@section('title', 'User List - Sortie Services')

@section('content')
<div class="row">
    @include('admin/components/header-nav/admin-user-nav',['activeTab' => 'list'] )
    <hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md">
                <div class="form-check mt-3">
                    <label for="defaultSelect" class="form-label">Search</label>
                    <input class="form-control" id="search" type="search" placeholder="Search ..." id="html5-search-input" />
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
                                    <label for="defaultSelect" class="form-label">Filter By Team</label>
                                    <select class="form-select filter"  onchange="getFilterValue(this,'team')"  id="team" aria-label="Default select example">
                                        <option value="" selected>Select Team</option>
                                        @foreach ($teams as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By Department</label>
                                    <select class="form-select filter"  onchange="getFilterValue(this,'department')"  id="department" aria-label="Default select example">
                                        <option value="" selected>Select Department</option>
                                        @foreach ($departments as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By Designation</label>
                                    <select class="form-select filter" onchange="getFilterValue(this,'designation')" id="designation" aria-label="Default select example">
                                        <option value="" selected>Select Designation</option>
                                        @foreach ($designations as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <label for="defaultSelect" class="form-label">Filter By Joining Date</label>
                                    <input class="form-control filter" type="date" id="joining_date" name="joining_date" id="html5-date-input" />
                                </div>
                            </div>
                        </div>
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
                <th>EmpId</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Department</th>
                <th>Designation</th>
                <th>City</th>
                <th>Joining Date</th>
                <th>Team</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @include('admin.pages.users.filter-user')
            </tbody>
        </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    var filterEleId = '';
     $('body').on('click', '#search', function(event){
        $('.filter').val('');
     });
     $('body').on('click', '.filter', function(event){
        $('#search').val('');
     });
    // $(document).ready(function(){

    const fetch_data = (page, filter_item, seach_term,type=null) => {
        // if(state_id === undefined){
        //     state_id = "";
        // }
        if(seach_term === undefined){
            seach_term = "";
        }
        $.ajax({
            url:"user-list/?page="+page,
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
        filterEleId = $($this).attr('id');
        var filter_item = $this.value;
        var seach_term = $('#search').val();
        var page = $('#hidden_page').val();
        fetch_data(page, filter_item, seach_term,type);
    }

    $('body').on('change', '#joining_date', function(){
        var filter_item = $('#joining_date').val();
        var seach_term = $('#search').val();
        var page = $('#hidden_page').val();
        fetch_data(page, filter_item, seach_term,'joining_date');
    });

    $('body').on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var filter_item = $(filterEleId).val();
        var seach_term = $('#search').val();

        fetch_data(page,filter_item, seach_term);
    });
// });

</script>

@endsection
