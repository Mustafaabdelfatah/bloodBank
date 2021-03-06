<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item d-none d-sm-inline-block">
                    <a hreflang="{{ $localeCode }}"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="nav-link"> {{ $properties['native'] }}</a>
                </li>
        @endforeach

    </ul>

 <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
            <a class='btn btn-danger' href="/logout">Logout</a>
        </li>
    </ul>


</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('/')}}/design/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('/')}}/design/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('dashboard.governorates.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>Governorates</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('dashboard.cities.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Cities</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Categories</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('dashboard.donations.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Donations</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('dashboard.posts.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Posts</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
