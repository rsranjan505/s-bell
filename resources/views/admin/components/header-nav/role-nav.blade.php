<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="nav-align-top">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a href="{{ route('roles.index')}}" class="nav-link {{ $activeTab == 'list' ? 'active' : '' }}" aria-selected="true">Roles Management</a>
            </li>
            @can('can-role-edit')
                @if (isset($role))
                    @if($activeTab == 'edit')
                    <li class="nav-item">
                        <a href="{{ route('roles.edit',['role' => $role])}}" class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" role="tab" >Edit</a>
                    </li>
                    @endif
                @endif
            @endcan
            @can('can-role-create')
                @if($activeTab == 'add')
                    <li class="nav-item">
                        <a href="{{ route('roles.create')}}" class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" role="tab" >Create</a>
                    </li>
                @endif
            @endcan
        </ul>
    </div>
    @can('can-role-create')
        @if($activeTab != 'add')
            <a class="btn btn-outline-primary" style="float: right;position:absolute;right:15px;left:auto;" href="{{ route('roles.create')}}">Create New</a>
        @endif
    @endcan
</nav>
