<!-- ******************************************
        START HEADER
        ********************************************** -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="logo-wrapper clearfix">
                    <a class="navbar-brand" href="{{route('frontend.pages.index')}}"><img
                            src="{{asset('frontend/images/logo-white.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end logo -->
            </div><!-- end col -->

            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="header-contact clearfix">
                    <p><i class="flaticon-icon-818 alignleft"></i> Monday to Sunday <br>9am to 5pm</p>
                </div><!-- end header-contact -->

                <div class="header-contact clearfix">
                    <p><i class="flaticon-technology alignleft"></i> 209-507-1033<br>Call us for enquiry</p>
                </div><!-- end header-contact -->

                <div class="hidden-xs header-search clearfix text-right">
                    {{-- <form class="search-form">
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search on this site..</label>
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Search on this site..">
                            <span class="fa fa-search form-control-feedback"></span>
                        </div>
                    </form> --}}
                    {{-- <a href="{{route('frontend.pages.register')}}"
                        class="btn btn-default btn-block">Login/Register</a> --}}
                </div><!-- end header-contact -->

                <div class="header-search login_sty clearfix text-right">
                    <ul>
                        @if (!Auth::guard('customer')->check())
                        <li><a href="{{route('frontend.pages.register')}}">Login</a></li>
                        <li>/</li>
                        <li><a href="{{route('frontend.pages.register')}}">Register</a></li>
                        @else
                        <li><a
                                href="{{route('frontend.customer.dashboard')}}">{{Auth::guard('customer')->user()->name}}</a>
                        </li>
                        @endif
                    </ul>
                </div><!-- end header-contact -->

            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end header -->

<div class="{{Route::currentRouteName() == 'frontend.pages.index' ? '' : 'normal-header'}} transparent-header">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('frontend.pages.index')}}">Home</a></li>
                    <li><a href="{{route('frontend.pages.wheels')}}">Wheels</a></li>
                    <li><a href="{{route('frontend.pages.tires')}}">Tires</a></li>
                    <li><a href="{{route('frontend.pages.accessories')}}">Accessories</a></li>
                    {{-- <li class="dropdown hasmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Brands <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu">
                            @foreach ($brands as $brand)
                            <li><a href="#">{{$brand->parent}}</a></li>
                            @endforeach
                        </ul>
                    </li> --}}
                    <li class="dropdown hasmenu uber_menu">
                        <a href="{{ route('frontend.pages.brands') }}" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">Brands <span
                                class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu uber_wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        @foreach ($brands->slice(0,5) as $brand)
                                        <li><a
                                                href="{{ route('frontend.pages.brand-products',$brand->id) }}">{{$brand->parent}}</a>
                                        </li>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        @foreach ($brands->slice(5,5) as $brand)
                                        <li><a
                                                href="{{ route('frontend.pages.brand-products',$brand->id) }}">{{$brand->parent}}</a>
                                        </li>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        @foreach ($brands->slice(10,5) as $brand)
                                        <li><a
                                                href="{{ route('frontend.pages.brand-products',$brand->id) }}">{{$brand->parent}}</a>
                                        </li>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        @foreach ($brands->slice(15,5) as $brand)
                                        <li><a
                                                href="{{ route('frontend.pages.brand-products',$brand->id) }}">{{$brand->parent}}</a>
                                        </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="{{ route('frontend.pages.shop') }}">Shop</a></li>
                    <li><a href="{{ route('frontend.pages.gallery') }}">Gallery</a></li>
                    <li class="dropdown hasmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">About <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('frontend.pages.about')}}">About Tiresstudio</a></li>
                            <li><a href="{{route('frontend.pages.about')}}">News & Blogs</a></li>
                            {{-- <li><a href="#">Warranty</a></li>
                            <li><a href="#">FAQ's</a></li> --}}
                        </ul>
                    </li>
                    <li><a href="{{route('frontend.pages.contact')}}">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="social-header"><a href="https://www.facebook.com/Tire-Studio-101850355652222"
                            target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-header"><a href="https://www.instagram.com/tire_studio/" target="_blank"><i
                                class="fa fa-instagram"></i></a></li>
                    <li class="navbar-cart"><a href="{{route('frontend.cart')}}">Cart <i
                                class="fa fa-shopping-cart"></i>
                            <small id="cart_items_count">{{ Cart::getContent()->count() }}</small></a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav><!-- end nav -->
</div><!-- end transparent header -->
