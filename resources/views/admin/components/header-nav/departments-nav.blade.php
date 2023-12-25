<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="nav-align-top">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a href="{{ route('departments.index')}}" class="nav-link {{ $activeTab == 'list' ? 'active' : '' }}" aria-selected="true">Departments List</a>
            </li>
            @can('can-department-edit')
                @if (isset($departments))
                    @if($activeTab == 'edit')
                    <li class="nav-item">
                        <a href="{{ route('departments.edit',['department' => $departments])}}" class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" role="tab" >Edit</a>
                    </li>
                    @endif
                @endif
            @endcan
            @can('can-department-create')
                @if($activeTab == 'add')
                    <li class="nav-item">
                        <a href="{{ route('departments.create')}}" class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" role="tab" >Create</a>
                    </li>
                @endif
            @endcan
        </ul>
    </div>
    @can('can-department-create')
        @if($activeTab != 'add')
            <a class="btn btn-outline-primary" style="float: right;position:absolute;right:15px;left:auto;" href="{{ route('departments.create')}}">Create New</a>
        @endif
    @endcan
</nav>
