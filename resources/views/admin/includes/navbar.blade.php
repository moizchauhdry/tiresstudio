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
