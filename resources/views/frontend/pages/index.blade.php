@extends('layouts.frontend')

@section('content')

@include('frontend.includes.slider')

<div class="section">
    <div class="container">

        @include('frontend.includes.search')

        <hr class="invis">

        <div class="row">
            <div class="col-md-6">
                <div class="section-title clearfix">
                    <h4>Popular Wheels</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="section-title clearfix ">
                    <a href="{{route('frontend.pages.wheels')}}"
                        style="float: right; margin-top: 11px; font-size:16px; font-weight: bold;">VIEW ALL
                        WHEELS <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div><!-- end row -->

        <div class="row">
            @foreach ($wheels as $wheel)
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">

                <div class="car-wrapper clearfix">
                    <div class="post-media entry">
                        <a href="{{ route('frontend.pages.product',$wheel->id) }}"><img
                                src="{{ asset('images/placeholder.gif') }}"
                                data-src="{{ imageURL($wheel->product_image)}}" alt="" class="img-responsive"></a>
                    </div><!-- end post-media -->

                    <div class="car-title clearfix text-center">
                        <h4><a
                                href="{{ route('frontend.pages.product',$wheel->id) }}">{{getProductName($wheel->id)}}</a>
                        </h4>
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
                    <p class="stat_count">58840</p>
                    <small>Wheels</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-vehicle"></i>
                    <p class="stat_count">2244</p>
                    <small>Tires</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-signs"></i>
                    <p class="stat_count">80</p>
                    <small>Brands</small>
                </div><!-- end stat-wrap -->
            </div><!-- end col -->
            <div class="col-md-3 col-sm-3 col-xs-12 wow fadeIn">
                <div class="stat-wrap">
                    <i class="flaticon-profile"></i>
                    <p class="stat_count">5000</p>
                    <small>Customers</small>
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
            <div class="col-md-6">
                <div class="section-title clearfix">
                    <h4>Popular Tires</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="section-title clearfix ">
                    <a href="{{route('frontend.pages.tires')}}"
                        style="float: right; margin-top: 11px; font-size:16px; font-weight: bold;">VIEW ALL
                        TIRES <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div><!-- end row -->

        <div class="row">
            @foreach ($tires as $tire)
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">

                <div class="car-wrapper clearfix">
                    <div class="post-media entry">
                        <a href="{{ route('frontend.pages.product',$tire->id) }}"><img
                                src="{{ asset('images/placeholder.gif') }}"
                                data-src="{{ imageURL($tire->product_image)}}" alt="" class="img-responsive"></a>
                    </div><!-- end post-media -->

                    <div class="car-title clearfix text-center">
                        <h4><a href="{{ route('frontend.pages.product',$tire->id) }}">{{getProductName($tire->id)}}</a>
                        </h4>
                    </div><!-- end car-title -->
                </div><!-- end clearfix -->

            </div>
            @endforeach
        </div>

        <hr class="invis">

        <div class="row">
            <div class="col-md-6 col-sm-6 wow fadeInUp">
                <div class="post-media">
                    <a href="#"><img src="{{asset('frontend/images/banner-3.jpg')}}" alt="" class="img-responsive"></a>
                </div><!-- end post-media -->
            </div><!-- end col -->

            <div class="col-md-6 col-sm-6 wow fadeInUp">
                <div class="post-media">
                    <a href="#"><img src="{{asset('frontend/images/banner-5.jpg')}}" alt="" class="img-responsive"></a>
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
                        <h3>Looking to Buy a Wheel?</h3>
                        <p>Choose from over 50,000 wheels to customize the look of your vehicle.</p>

                        <a href="{{route('frontend.pages.wheels')}}" class="btn btn-default">BUY A WHEEL</a>
                    </div><!-- end col -->
                </div><!-- end messahe box -->
            </div><!-- emd col -->

            <div class="col-md-4 col-sm-6 color2">
                <div class="message-box row clearfix">
                    <div class="col-md-2 text-center">
                        <i class="flaticon-vehicle"></i>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <h3>Looking to Buy a Tire?</h3>
                        <p>Choose from over 2,000 tires to create the look you want and the traction you need.</p>

                        <a href="{{route('frontend.pages.tires')}}" class="btn btn-default">BUY A TIRE</a>
                    </div><!-- end col -->
                </div><!-- end messahe box -->
            </div><!-- emd col -->

            <div class="col-md-4 col-sm-12 color1">
                <div class="message-box row clearfix">
                    <div class="col-md-2 text-center">
                        <i class="flaticon-two"></i>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <h3>Looking for Accessories?</h3>
                        <p>Choose from over 14,000 accessories to maximize the look of your vehicle.</p>
                        <a href="{{route('frontend.pages.accessories')}}" class="btn btn-default">BUY ACCESSORIES</a>
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
                    <h4>Selection</h4>
                    {{-- <small>Easy Finance</small> --}}
                    <p>Tire Studio offers over 70,000 products from a multitude of brands for you to choose from making
                        us a “one stop shop”
                        for your tire, wheel, and accessory needs.</p>
                </div><!-- end service-box -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-box clearfix">
                    <i class="flaticon-tool alignleft"></i>
                    <h4>Pricing</h4>
                    {{-- <small>No Hidden Charges</small> --}}
                    <p>Our prices are competitive and fair. There are no surprise costs or fees. That’s how we would
                        like to be treated, and
                        that is how we will treat you.</p>
                </div><!-- end service-box -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-box clearfix">
                    <i class="flaticon-interface alignleft"></i>
                    <h4>Shipping</h4>
                    {{-- <small>24/7 Online Support</small> --}}
                    <p>We offer free shipping within the 48 contiguous United States and will package and handle your
                        items with care.</p>
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

                    <p>Tire Studio exists today because of you, the customer. Whether you are an enthusiast or simply
                        need new tires, Tire
                        Studio is here for you. Here are what some of our customers have to say about the experience
                        that Tire Studio provides.</p>

                    {{-- <a href="#" class="readmore">Know More</a> --}}

                </div><!-- end about-widget -->
            </div><!-- end col -->

            <div class="col-md-8 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    <div class="testimonial clearfix">
                        <p class="lead">A friend told me about Tire Studio. I decided to get all four of my tires
                            replaced and wanted a new brand of tires this
                            year. Tire Studio was knowledgeable and very professional. They made it easy to find which
                            tires were best for my car
                            and budget. Now they have a new and loyal customer!</p>
                        <div class="testi-meta">
                            <img src="{{asset('frontend/uploads/testi_01.png')}}" alt=""
                                class="img-responsive alignleft">
                            <h4>James Fernando <small></small></h4>
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
                        <p class="lead">Wow, Tire Studio delivered my tire and wheel sets practically overnight! From
                            the time I ordered my items online to the
                            expected delivery date, the tires were delivered two days ahead of the scheduled delivery
                            date! Because of Tire Studio’s
                            exceptional service I was able to get back on the road earlier than expected. Thank you Tire
                            Studio!</p>
                        <div class="testi-meta">
                            <img src="{{asset('frontend/uploads/testi_01.png')}}" alt=""
                                class="img-responsive alignleft">
                            <h4>James Fernando <small></small></h4>
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

@section('scripts')
<script>
    $('.car-wrapper img').lazy({
        placeholder:"{{ asset('images/placeholder.gif') }}"
    })
    $('#btn_search').on('click',function(){
            if($('.year').selectpicker('val') != '' && $('.make').selectpicker('val') != '' && $('.model').selectpicker('val') != ''){
                $('#home_search').trigger('submit');
            }
        })

        $('#tire_btn_search').on('click',function(){
            if($('.yearTire').selectpicker('val') != '' && $('.makeTire').selectpicker('val') != '' && $('.modelTire').selectpicker('val') != ''){
                $('#tire_search').trigger('submit');
            }
        })

        $('.year,.model,.make,.yearTire,.modelTire,.makeTire').selectpicker();

        $('.year').on('changed.bs.select', function () {
            $.ajax({
                method: "POST",
                url: '{{ route('get.makes-by-year') }}',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    year : $('.year').selectpicker('val'),
                },
                beforeSend:function(){
                    $('#yearLoader').show();
                    $('#makeLoader').show();
                },
                success: function (response) {
                    if( $.isArray(response.data) &&  response.data.length ) {
                        $('.make select').prop('disabled',false);
                        $('.make').removeClass('disabled');
                        $('.make option').remove();
                        $('.make select').append(' <option value=""  >Select Make</option>');

                        response.data.forEach(function (item, index) {
                            option = "<option value='" + item.id + "'>" + item.name + "</option>"
                            $('.make select').append(option);
                        });
                    }
                    else{
                        $('.make select').prop('disabled', true);
                        $('.make').addClass('disabled');
                        $('.make option').remove();
                        $('.make select').append(' <option value="" selected >Select Make</option>');
                    }

                    $('.make').selectpicker('refresh');
                    $('#yearLoader').hide();
                    $('#makeLoader').hide();
                }
            });
        });

        $('.make').on('changed.bs.select', function () {
            $.ajax({
                method: "POST",
                url: '{{ route('get.model-by-makes') }}',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    year : $('.year').selectpicker('val'),
                    make : $('.make').selectpicker('val'),
                },
                beforeSend:function(){
                    $('#makeLoader').show();
                    $('#modelLoader').show();
                },
                success: function (response) {
                    if( $.isArray(response.data) &&  response.data.length ) {
                        $('.model select').prop('disabled',false);
                        $('.model').removeClass('disabled');
                        $('.model option').remove();
                        $('.model select').append(' <option value=""  >Select Make</option>');

                        response.data.forEach(function (item, index) {
                            option = "<option value='" + item.id + "'>" + item.model +  (item.subModel != null ? ' - ' + item.subModel: '' ) +"</option>"
                            $('.model select').append(option);
                        });
                    }
                    else{
                        $('.model select').prop('disabled', true);
                        $('.model').addClass('disabled');
                        $('.model option').remove();
                        $('.model select').append(' <option value="" selected >Select Make</option>');
                    }

                    $('.model').selectpicker('refresh');
                    $('#makeLoader').hide();
                    $('#modelLoader').hide();
                }
            });
        });

        $('.yearTire').on('changed.bs.select', function () {
        $.ajax({
            method: "POST",
            url: '{{ route('get.makes-by-year') }}',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                year : $('.yearTire').selectpicker('val'),
            },
            beforeSend:function(){
                $('#yearTireLoader').show();
                $('#makeTireLoader').show();
            },
            success: function (response) {
                if( $.isArray(response.data) &&  response.data.length ) {
                    $('.makeTire select').prop('disabled',false);
                    $('.makeTire').removeClass('disabled');
                    $('.makeTire option').remove();
                    $('.makeTire select').append(' <option value=""  >Select Make</option>');

                    response.data.forEach(function (item, index) {
                        option = "<option value='" + item.id + "'>" + item.name + "</option>"
                        $('.makeTire select').append(option);
                    });
                }
                else{
                    $('.makeTire select').prop('disabled', true);
                    $('.makeTire').addClass('disabled');
                    $('.makeTire option').remove();
                    $('.makeTire select').append(' <option value="" selected >Select Make</option>');
                }

                $('.makeTire').selectpicker('refresh');
                $('#yearTireLoader').hide();
                $('#makeTireLoader').hide();
            }
        });
    });

        $('.makeTire').on('changed.bs.select', function () {
        $.ajax({
            method: "POST",
            url: '{{ route('get.model-by-makes') }}',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                year : $('.yearTire').selectpicker('val'),
                make : $('.makeTire').selectpicker('val'),
            },
            beforeSend:function(){
                $('#makeTireLoader').show();
                $('#modelTireLoader').show();
            },
            success: function (response) {
                if( $.isArray(response.data) &&  response.data.length ) {
                    $('.modelTire select').prop('disabled',false);
                    $('.modelTire').removeClass('disabled');
                    $('.modelTire option').remove();
                    $('.modelTire select').append(' <option value=""  >Select Make</option>');

                    response.data.forEach(function (item, index) {
                        option = "<option value='" + item.id + "'>" + item.model + "</option>"
                        $('.modelTire select').append(option);
                    });
                }
                else{
                    $('.modelTire select').prop('disabled', true);
                    $('.modelTire').addClass('disabled');
                    $('.modelTire option').remove();
                    $('.modelTire select').append(' <option value="" selected >Select Make</option>');
                }

                $('.modelTire').selectpicker('refresh');
                $('#makeTireLoader').hide();
                $('#modelTireLoader').hide();
            }
        });
    });

        function searchResults(){
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    home:{
                        year : $('.year').selectpicker('val'),
                        make : $('.make').selectpicker('val'),
                        model : $('.model').selectpicker('val'),
                    }
                },
                beforeSend:function(){
                    $('.overlay-products').show();
                },
                success: function (response) {
                    $('#viewProducts').html(response.view);
                    $('.overlay-products').hide();
                }
            });
        }

        function searchResultsTire(){
        $.ajax({
            method: "POST",
            url: url,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                home:{
                    year : $('.yearTire').selectpicker('val'),
                    make : $('.makeTire').selectpicker('val'),
                    model : $('.modelTire').selectpicker('val'),
                }
            },
            beforeSend:function(){
                $('.overlay-products').show();
            },
            success: function (response) {
                $('#viewProducts').html(response.view);
                $('.overlay-products').hide();
            }
        });
    }
</script>
@endsection
