<div class="dashboard light-widget">
    <ul>
        <li>
            <a class="{{(Route::currentRouteName() == 'frontend.customer.dashboard') ? 'active' : ''}}"
                href="{{route('frontend.customer.dashboard')}}"><i class="fa fa-paper-plane"></i>Home</a>
        </li>
        <li>
            <a class="{{(Route::currentRouteName() == 'frontend.customer.profile') ? 'active' : ''}}"
                href="{{route('frontend.customer.profile')}}"><i class="fa fa-paper-plane"></i>Profile</a>
        </li>
    </ul>

    <form action="{{route('frontend.customer.logout')}}" method="POST"> @csrf
        <button class="btn btn-default" type="submit">Logout</button>
    </form>
</div>
