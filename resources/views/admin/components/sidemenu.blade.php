<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#visit" aria-expanded="false" aria-controls="ui-order">
                <i class="icon-stack menu-icon"></i>
                <span class="menu-title">Visit</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="visit">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('visit') }}">Visit</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('visit-add') }}"> Add New</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#vendor" aria-expanded="false" aria-controls="ui-order">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Vendor</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vendor">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('vendor-list') }}">List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vendor') }}"> Add New</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="ui-order">
                <i class="icon-inbox menu-icon"></i>
                <span class="menu-title">Order</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('order-list') }}"> Order List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('order-add-view') }}"> Create Order</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <i class="mdi mdi-cards menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('product-list') }}"> Product List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('product-add-view') }}"> Add Product</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">vedors report </a></li>
                </ul>
            </div>
        </li>

    @if (Auth::user()->is_admin==1)
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('user-list') }}">User List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('add-user-view') }}">Add User</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('setting-view') }}">Setting</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cities-list') }}">Add City</a></li>
{{--


                    <li class="nav-item"><a class="nav-link" href="{{ route('blocks-list') }}">Blocks</a></li> --}}
                </ul>
            </div>
        </li>

    @endif

    </ul>
  </nav>
