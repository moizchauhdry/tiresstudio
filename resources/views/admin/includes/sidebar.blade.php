<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link text-center">
        <img src="{{asset('public/images/logo-white.png')}}" class="w-75">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}"
                        class="nav-link {{(Route::currentRouteName() == 'admin.dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if (Auth::guard('admin')->user()->hasPermission('manage-admin-users'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'admins.create' || Route::currentRouteName() == 'admins.index'|| Route::currentRouteName() == 'admins.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'admins.create' || Route::currentRouteName() == 'admins.index' || Route::currentRouteName() == 'admins.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.create')}}"
                                class="nav-link {{(Route::currentRouteName() == 'admins.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'admins.index' || Route::currentRouteName() == 'admins.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'products.index' || Route::currentRouteName() == 'products.show'|| Route::currentRouteName() == 'products.index' ) ? 'menu-open' : ''}}">
                    <a href="#"
                       class="nav-link {{(Route::currentRouteName() == 'products.index' || Route::currentRouteName() == 'products.show' || Route::currentRouteName() == 'products.index' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('products.index')}}"
                               class="nav-link {{(Route::currentRouteName() == 'products.index' || Route::currentRouteName() == 'products.index' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Products</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'brands.index' || Route::currentRouteName() == 'brands.show'|| Route::currentRouteName() == 'brands.index' ) ? 'menu-open' : ''}}">
                    <a href="#"
                       class="nav-link {{(Route::currentRouteName() == 'brands.index' || Route::currentRouteName() == 'brands.show' || Route::currentRouteName() == 'brands.index' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Brands
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('brands.index')}}"
                               class="nav-link {{(Route::currentRouteName() == 'brands.index' || Route::currentRouteName() == 'brands.index' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Brands</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'vehicle.indexMake' || Route::currentRouteName() == 'vehicle.showMake'|| Route::currentRouteName() == 'vehicle.indexMake' ) ? 'menu-open' : ''}}">
                    <a href="#"
                       class="nav-link {{(Route::currentRouteName() == 'vehicle.indexMake' || Route::currentRouteName() == 'vehicle.showMake' || Route::currentRouteName() == 'vehicle.indexMake' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Makes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('vehicle.indexMake')}}"
                               class="nav-link {{(Route::currentRouteName() == 'vehicle.indexMake' || Route::currentRouteName() == 'vehicle.showMake' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Makes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'vehicle.index' || Route::currentRouteName() == 'vehicle.show'|| Route::currentRouteName() == 'vehicle.index' ) ? 'menu-open' : ''}}">
                    <a href="#"
                       class="nav-link {{(Route::currentRouteName() == 'vehicle.index' || Route::currentRouteName() == 'vehicle.show' || Route::currentRouteName() == 'vehicle.index' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Vehicles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('vehicle.index')}}"
                               class="nav-link {{(Route::currentRouteName() == 'vehicle.index' || Route::currentRouteName() == 'vehicle.show' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Vehicles</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
