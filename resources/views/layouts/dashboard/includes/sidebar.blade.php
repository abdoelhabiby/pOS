   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->segment(3) == 'home' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@Lang('site.dashboard')</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->

    @if (auth()->user()->hasPermissionTo('read'))
        <li class="nav-item {{ request()->segment(3) == 'users' ? 'active' : '' }}">
            <a class="nav-link " href="{{ url('dashboard/users') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>@Lang('site.users')</span>
            </a>
        </li>



        <hr class="sidebar-divider">
    @endif

    <!-- Heading -->

    @if (auth()->user()->hasPermissionTo('read_cat'))
        <li class="nav-item {{ request()->segment(3) == 'category' ? 'active' : '' }}">
            <a class="nav-link " href="{{ url('dashboard/category') }}">
                <i class="fas fa-fw fa-star"></i>
                <span>Category</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    @endif


    @if (auth()->user()->hasPermissionTo('read_pro'))
        <li class="nav-item {{ request()->segment(3) == 'products' ? 'active' : '' }}">
            <a class="nav-link " href="{{ url('dashboard/products') }}">
                <i class="fas fa-fw fa-star"></i>
                <span>Products</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    @endif





    @if (auth()->user()->hasPermissionTo('read_cli'))
        <li class="nav-item {{ request()->segment(3) == 'client' ? 'active' : '' }}">
            <a class="nav-link " href="{{ url('dashboard/client') }}">
                <i class="fas fa-fw fa-star"></i>
                <span>Clients</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    @endif



    @if (auth()->user()->hasPermissionTo('read_ord'))
        <li class="nav-item {{ request()->segment(3) == 'orders' ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('orders.index') }}">
                <i class="fas fa-fw fa-star"></i>
                <span>Orders</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    @endif







</ul>
<!-- End of Sidebar -->
