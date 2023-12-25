<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="nav-align-top">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a href="{{ route('admin-user-list')}}" class="nav-link {{ $activeTab == 'list' ? 'active' : '' }}" aria-selected="true">User List</a>
            </li>
            @can('can-user-edit')
                @if($activeTab == 'edit')
                <li class="nav-item">
                    <a href="{{ route('admin-user-edit')}}" class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" role="tab" >Edit</a>
                </li>
                @endif
            @endcan
            @can('can-user-edit')
                @if($activeTab == 'add')
                    <li class="nav-item">
                        <a href="{{ route('admin-user-add')}}" class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" role="tab" >Create</a>
                    </li>
                @endif
            @endcan
        </ul>
    </div>
    @can('can-user-create')
        @if($activeTab != 'add')
            <a class="btn btn-outline-primary" style="float: right;position:absolute;right:15px;left:auto;" href="{{ route('admin-user-add')}}">Create New</a>
        @endif
    @endcan
</nav>
