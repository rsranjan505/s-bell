<div class="card py-2">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'list' ? 'active' : '' }} " id="add-tab"  href="{{ route('items')}}"  aria-controls="list" aria-selected="true">List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" id="list-tab"  href="{{ route('items/add')}}"  aria-controls="add" aria-selected="false">Add New</a>
        </li>
        @if($activeTab == 'edit')
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" id="edit" href="#edit"  aria-controls="edit" aria-selected="false">Edit</a>
        </li>
        @endif
    </ul>
</div>
