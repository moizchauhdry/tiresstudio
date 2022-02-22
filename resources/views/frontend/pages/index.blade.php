@extends('layouts.frontend')

@section('content')

@include('frontend.includes.slider')

<div class="section">
    <div class="container">

        @include('frontend.includes.search')

        <hr class="invis">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title clearfix">
                    <h4>Popular Wheels</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
        </div>

        <div class="row">
            @foreach ($response['popular_wheels'] as $wheel)
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper clearfix">
                    <div class="post-media entry">
                        <img src="{{asset('frontend/wheels/1.png')}}" alt="" class="img-responsive">
                        <div class="magnifier">
                        </div><!-- end magnifier -->
                        {{-- <div class="car-price">
                            <p>$78900</p>
                        </div> --}}
                        <ul class="list-inline">
                            <li class="car-km">
                                <p><i class="fa fa-road"></i> 26000</p>
                            </li>
                            <li class="car-oil">
                                <p><i class="fa fa-car"></i> Diesel</p>
                            </li>
                            <li class="car-date">
                                <p><i class="fa fa-clock-o"></i> 2014</p>
                            </li>
                        </ul>
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">{{$wheel->title}}</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div>
            @endforeach
        </div>

    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
            PARALLAX
            ********************************************** -->
<div class="parallax section" data-stellar-background-ratio="0.5"
    style="background-image:url('frontend/uploads/parallax_01.jpg');">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-car"></i>
                    <p class="stat_count">2545</p>
                    <small>New Cars For Sale</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-profile"></i>
                    <p class="stat_count">2545</p>
                    <small>Satisfied Customers</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-vehicle"></i>
                    <p class="stat_count">2545</p>
                    <small>Dealer Branches</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-signs"></i>
                    <p class="stat_count">1008</p>
                    <small>Certifications Hold</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
            BANNERS & DEALS
            ********************************************** -->
<div class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title clearfix text-center">
                    <h4>OUR BRANDS</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper deal-wrapper clearfix">
                    <div class="post-media">
                        <img src="{{asset('frontend/wheels/1.png')}}" alt="" class="img-responsive">
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">Hyndai Grand i10 2010 Model Cross Sport</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper deal-wrapper clearfix">
                    <div class="post-media">
                        <img src="{{asset('frontend/wheels/2.png')}}" alt="" class="img-responsive">
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">Ford Mustang 2.3 Ecoboost Premium Taurus</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper deal-wrapper clearfix">
                    <div class="post-media">
                        <img src="{{asset('frontend/wheels/3.png')}}" alt="" class="img-responsive">
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">BMW F12 6 Series Midsized Manual Convertible</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper deal-wrapper clearfix">
                    <div class="post-media">
                        <img src="{{asset('frontend/wheels/1.png')}}" alt="" class="img-responsive">
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">Hyndai Grand i10 2010 Model Cross Sport</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper deal-wrapper clearfix">
                    <div class="post-media">
                        <img src="{{asset('frontend/wheels/2.png')}}" alt="" class="img-responsive">
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">Ford Mustang 2.3 Ecoboost Premium Taurus</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="car-wrapper deal-wrapper clearfix">
                    <div class="post-media">
                        <img src="{{asset('frontend/wheels/3.png')}}" alt="" class="img-responsive">
                    </div><!-- end post-media -->

                    <div class="car-title clearfix">
                        <h4><a href="#">BMW F12 6 Series Midsized Manual Convertible</a></h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">

        <div class="row">
            <div class="col-md-6 col-sm-6 wow fadeInUp">
                <div class="post-media">
                    <a href="#"><img src="{{asset('frontend/uploads/banner_01.jpg')}}" alt=""
                            class="img-responsive"></a>
                </div><!-- end post-media -->
            </div><!-- end col -->

            <div class="col-md-6 col-sm-6 wow fadeInUp">
                <div class="post-media">
                    <a href="#"><img src="{{asset('frontend/uploads/banner_02.jpg')}}" alt=""
                            class="img-responsive"></a>
                </div><!-- end post-media -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
            MESSAGE BOXES
            ********************************************** -->
<div class="section nopadding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6 color1">
                <div class="message-box row clearfix">
                    <div class="col-md-2 text-center">
                        <i class="flaticon-transport"></i>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <h3>Looking For Buy a Car?</h3>
                        <p>Now is a good time to buy a car, Engines provide you new and used car in good
                            conditions, after full car checkup only we deleiverd your car to you with fully
                            completed documentations. </p>

                        <a href="#" class="btn btn-default">BUY A CAR</a>
                    </div><!-- end col -->
                </div><!-- end messahe box -->
            </div><!-- emd col -->

            <div class="col-md-4 col-sm-6 color2">
                <div class="message-box row clearfix">
                    <div class="col-md-2 text-center">
                        <i class="flaticon-vehicle-1"></i>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <h3>Do You Want to Sell a Car?</h3>
                        <p>Now is a good time to buy a car, Engines provide you new and used car in good
                            conditions, after full car checkup only we deleiverd your car to you with fully
                            completed documentations. </p>

                        <a href="#" class="btn btn-default">SELL A CAR</a>
                    </div><!-- end col -->
                </div><!-- end messahe box -->
            </div><!-- emd col -->

            <div class="col-md-4 col-sm-12 color1">
                <div class="message-box row clearfix">
                    <div class="col-md-2 text-center">
                        <i class="flaticon-two"></i>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <h3>Kids Grill the Car Experts</h3>
                        <p>Now is a good time to buy a car, Engines provide you new and used car in good
                            conditions, after full car checkup only we deleiverd your car to you with fully
                            completed documentations. </p>

                        <a href="#" class="btn btn-default">KNOW MORE</a>
                    </div><!-- end col -->
                </div><!-- end messahe box -->
            </div><!-- emd col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
            WHY CHOOSE US
            ********************************************** -->
<div class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title clearfix text-center">
                    <h4>Why Choose Us</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-box clearfix">
                    <i class="flaticon-people alignleft"></i>
                    <h4>Auto Loan Facility</h4>
                    <small>Easy Finance</small>
                    <p>How all this mistakens idea off ut denouncing pleasures and praisings ut pain was born
                        and will give you a completed by account.</p>
                </div><!-- end service-box -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-box clearfix">
                    <i class="flaticon-tool alignleft"></i>
                    <h4>Free Documentation</h4>
                    <small>No Hidden Charges</small>
                    <p>Denouncing pleasures and ut praisings pains was born work will gives you a completed uts
                        seds account human happiness.</p>
                </div><!-- end service-box -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-box clearfix">
                    <i class="flaticon-interface alignleft"></i>
                    <h4>Cutomer Support</h4>
                    <small>24/7 Online Support</small>
                    <p>Idea of denouncing pleasure ut and praisings pain was born and ut will give you a
                        complete account of the system and expound.</p>
                </div><!-- end service-box -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
            PARALLAX LAST
            ********************************************** -->
<div class="parallax section" data-stellar-background-ratio="0.5"
    style="background-image:url('frontend/uploads/parallax_02.jpg');">
    <div class="container bgcolor">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="about-widget">
                    <div class="section-title clearfix">
                        <h4>Thousands of Customers Behind Our Success. </h4>
                        <hr class="custom">
                    </div><!-- end section-title -->

                    <p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will
                        give you a complete account of the system, and expound the ut actual of the great
                        explorer of the truth.</p>

                    <a href="#" class="readmore">Know More</a>

                </div><!-- end about-widget -->
            </div><!-- end col -->

            <div class="col-md-8 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    <div class="testimonial clearfix">
                        <p class="lead">They have got my project on time with the competition with a highly
                            skilled, well-organized and experienced team of professional team mates how all this
                            mistaken idea of and praising a complete account of the system.</p>
                        <div class="testi-meta">
                            <img src="{{asset('frontend/uploads/testi_01.png')}}" alt=""
                                class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- end rating -->
                        </div><!-- end testi-meta -->
                    </div><!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <p class="lead">They have got my project on time with the competition with a highly
                            skilled, well-organized and experienced team of professional team mates how all this
                            mistaken idea of and praising a complete account of the system.</p>
                        <div class="testi-meta">
                            <img src="{{asset('frontend/uploads/testi_01.png')}}" alt=""
                                class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- end rating -->
                        </div><!-- end testi-meta -->
                    </div><!-- end testimonial -->
                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection
