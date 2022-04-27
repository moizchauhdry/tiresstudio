<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li id="top-notification" class="nav-item dropdown">
            <a class="nav-link" href="javascript:void(0)">
                <i class="far fa-bell"></i>
                <span
                    class="badge badge-warning navbar-badge">{{ isset($adminNotifications)? $adminNotifications->count() : '' }}</span>
            </a>
        </li>
        <li class="nav-item">
            <button class="btn btn-outline-dark btn-border btn-sm mb-1"><b>Login Email:</b>
                {{Auth::guard('admin')->user()->email}}
            </button>
            <a href="{{route('admin.logout')}}" class="btn btn-outline-dark btn-border btn-sm mb-1">
                <i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
