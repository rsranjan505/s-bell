<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="nav-align-top">
        <ul class="nav nav-pills" city="tablist">
            <li class="nav-item">
                <a href="{{ route('city.index')}}" class="nav-link {{ $activeTab == 'list' ? 'active' : '' }}" aria-selected="true">City List</a>
            </li>
            @can('can-city-edit')
                @if (isset($city))
                    @if($activeTab == 'edit')
                    <li class="nav-item">
                        <a href="{{ route('city.edit',['city' => $city])}}" class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" city="tab" >Edit</a>
                    </li>
                    @endif
                @endif
            @endcan
            @can('can-city-create')
                @if($activeTab == 'add')
                    <li class="nav-item">
                        <a href="{{ route('city.create')}}" class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" city="tab" >Create</a>
                    </li>
                @endif
            @endcan
        </ul>
    </div>
    <div style="float: right;position:absolute;right:15px;left:auto;" >
        @can('can-city-create')
            @if($activeTab != 'add')
                <a class="btn btn-outline-primary" href="{{ route('city.create')}}">Create New</a>
            @endif
        @endcan
    </div>

</nav>

