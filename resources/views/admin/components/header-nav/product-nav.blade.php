<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="nav-align-top">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a href="{{ route('product.index')}}" class="nav-link {{ $activeTab == 'list' ? 'active' : '' }}" aria-selected="true">Product List</a>
            </li>
            @if (isset($product))
                @if($activeTab == 'edit')
                <li class="nav-item">
                    <a href="{{ route('product.edit',['product' => $product])}}" class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" role="tab" >Edit</a>
                </li>
                @endif
            @endif

            @if($activeTab == 'add')
                <li class="nav-item">
                    <a href="{{ route('product.create')}}" class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" role="tab" >Create</a>
                </li>
            @endif
        </ul>
    </div>
    @if($activeTab != 'add')
        <a class="btn btn-outline-primary" style="float: right;position:absolute;right:15px;left:auto;" href="{{ route('product.create')}}">Create New</a>
    @endif
</nav>


{{-- <div class="card py-2">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'list' ? 'active' : '' }} " id="add-tab"  href="{{ route('product-list')}}"  aria-controls="list" aria-selected="true">List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'add' ? 'active' : '' }}" id="list-tab"  href="{{ route('product-add-view')}}"  aria-controls="add" aria-selected="false">Add New</a>
        </li>
        @if($activeTab == 'edit')
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'edit' ? 'active' : '' }}" id="edit" href="{{ route('product-edit-view', ['id' => isset($data['product']) ? $data['product']->id :''])}}"  aria-controls="edit" aria-selected="false">Edit</a>
        </li>
        @endif
    </ul>
</div> --}}
