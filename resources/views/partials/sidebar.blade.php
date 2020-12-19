<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="" alt="" style="width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link"  href="{{url('/home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Action
    </div>

@if (auth()->user()->level === "kasir" || auth()->user()->level === "waiter" || auth()->user()->level === "owner")
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/order')}}">
                <i class="fas fa-fw fa-table"></i><span>Transaction</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/invoice')}}">
                <i class="fas fa-fw fa-table"></i><span>Invoice</span>
            </a>
        </li>
    @else
    <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span>
            </a>        
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tables Screens:</h6>
                    @if (auth()->user()->level == "admin" || auth()->user()->level == "kasir")
                    <a class="collapse-item" href="{{url('/makanans')}}">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span class="ml-1">Tabel Makanan</span>
                    </a>
                    @endif
                </div>
            </div>
        </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->