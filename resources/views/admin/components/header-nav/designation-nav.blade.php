<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="nav-align-top">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a href="{{ route('designation.index')}}" class="nav-link {{ $activeTab == 'list' ? 'active' : '' }}" aria-selected="true">Designation List</a>
            </li>
            @if (isset($designation))
                @if($activeTab == 'edit')
                <li class="nav-item">
                    <a href="{{ route('designation.edit',['designation' => $designation])}}" class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" role="tab" >Edit</a>
                </li>
                @endif
            @endif

            @if($activeTab == 'add')
                <li class="nav-item">
                    <a href="{{ route('designation.create')}}" class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" role="tab" >Create</a>
                </li>
            @endif
        </ul>
    </div>
    @if($activeTab != 'add')
        <a class="btn btn-outline-primary" style="float: right;position:absolute;right:15px;left:auto;" href="{{ route('designation.create')}}">Create New</a>
    @endif
</nav>
