@extends('layouts.frontend')

@section('content')
<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Inventory Single</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Inventory</a></li>
                            <li class="active">Product</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end col -->
        </div><!-- end page-title -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="single-car-wrapper clearfix">
                    <!-- main slider carousel -->
                    <div class="row">
                        <div class="col-md-12" id="slider">
                            <div class="col-md-12" id="carousel-bounding-box">
                                <div id="myCarousel" class="carousel slide">
                                    <!-- main slider carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item" data-slide-number="0">
                                            <img src="{{asset('frontend/uploads/single_car_01.png')}}" alt=""
                                                class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="1">
                                            <img src="{{asset('frontend/uploads/single_car_02.png')}}" alt=""
                                                class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="2">
                                            <img src="{{asset('frontend/uploads/single_car_03.png')}}" alt=""
                                                class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="3">
                                            <img src="{{asset('frontend/uploads/single_car_04.png')}}" alt=""
                                                class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="4">
                                            <img src="{{asset('frontend/uploads/single_car_05.png')}}" alt=""
                                                class="img-responsive">
                                        </div>
                                    </div>
                                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
                                    <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/main slider carousel-->

                    <!-- thumb navigation carousel -->
                    <div class="row-fluid" id="slider-thumbs">
                        <!-- thumb navigation carousel items -->
                        <ul class="list-inline">
                            <li class="col-md-15 col-sm-15 col-xs-6">
                                <a id="carousel-selector-0" class="selected">
                                    <img src="{{asset('frontend/uploads/single_car_01.png')}}" alt=""
                                        class="img-responsive">
                                </a>
                            </li>
                            <li class="col-md-15 col-sm-15 col-xs-6">
                                <a id="carousel-selector-1">
                                    <img src="{{asset('frontend/uploads/single_car_02.png')}}" alt=""
                                        class="img-responsive">
                                </a>
                            </li>
                            <li class="col-md-15 col-sm-15 col-xs-6">
                                <a id="carousel-selector-2">
                                    <img src="{{asset('frontend/uploads/single_car_03.png')}}" alt=""
                                        class="img-responsive">
                                </a>
                            </li>
                            <li class="col-md-15 col-sm-15 col-xs-6">
                                <a id="carousel-selector-3">
                                    <img src="{{asset('frontend/uploads/single_car_04.png')}}" alt=""
                                        class="img-responsive">
                                </a>
                            </li>
                            <li class="col-md-15 col-sm-15 col-xs-6">
                                <a id="carousel-selector-4">
                                    <img src="{{asset('frontend/uploads/single_car_05.png')}}" alt=""
                                        class="img-responsive">
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="clearfix"></div>

                    <div class="car-description clearfix">
                        <h3>Audi A8 3.0 TDI S12 Quattro Tiptronic</h3>

                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using content here, content
                            heremaking it look like readable Englishbut the majority haveor randomised words which don't
                            look even slightly believable. </p>

                        <p>Distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                            using content herehave suffered alteration.</p>

                        <div class="carcustom">
                            <img src="{{asset('frontend/uploads/car_custom_01.png')}}" alt="" class="img-responsive">
                        </div>
                    </div><!-- end desc -->

                    <div class="car-table clearfix">
                        <p><strong>Key Features</strong> of Audi A8 3.0 TDI S12 Quattro Tiptronic </p>
                        <i class="fa fa-angle-down"></i>
                    </div><!-- end car-table -->

                    <div class="table-responsive">
                        <table class="table car-table-wrapper">
                            <tbody>
                                <tr>
                                    <td>Body</td>
                                    <td><strong>Convirtible</strong></td>
                                    <td>Transmission</td>
                                    <td><strong>Semi Automatic</strong></td>
                                </tr>
                                <tr>
                                    <td>Total Kilometres</td>
                                    <td><strong>2090Km’s</strong></td>
                                    <td>Engine</td>
                                    <td><strong>3.7L V-L cyl</strong></td>
                                </tr>
                                <tr>
                                    <td>Fuel Type</td>
                                    <td><strong>Diesel</strong></td>
                                    <td>Fuel Economy</td>
                                    <td><strong>14.55 kmpl</strong></td>
                                </tr>
                                <tr>
                                    <td>Reg.Year</td>
                                    <td><strong>2013, Aug</strong></td>
                                    <td>Color</td>
                                    <td><strong>TitaniumMetalic</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- end table-responsive -->

                    <div class="car-table clearfix">
                        <p><strong>Technical Details</strong> of Audi A8 3.0 TDI S12 Quattro Tiptronic </p>
                        <i class="fa fa-angle-down"></i>
                    </div><!-- end car-table -->

                    <!-- tabs left -->
                    <div class="tabbable tabs-left row-fluid clearfix">
                        <ul class="nav nav-tabs col-md-2 col-sm-2">
                            <li><a href="#a" data-toggle="tab">Performance</a></li>
                            <li class="active"><a href="#b" data-toggle="tab">Capacity</a></li>
                            <li><a href="#c" data-toggle="tab">Comfort</a></li>
                            <li><a href="#d" data-toggle="tab">Safety</a></li>
                        </ul>
                        <div class="tab-content col-md-10 col-sm-10">
                            <div class="tab-pane fade clearfix" id="a">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Seating Capacity:
                                                <strong>3 Front and 4 Back Comfortable</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Cargo Volume
                                                <strong>460-Litres Maximum</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Number of Doors
                                                <strong>4 Doors (2 Front & 2 Back)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Type:
                                                <strong>Tubeless, Radial (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Size:
                                                <strong>218/53 R15 ( With Stepney)</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Size
                                                <strong>165/38 R15 (With Stepney)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Type
                                                <strong>Alloy Wheel (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Fuel Tank Capacity:
                                                <strong>65 Litres</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Front Headroom:
                                                <strong>914mm Front Headroom</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Rear Headroom:
                                                <strong>916mm Rear Headroom</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade in active" id="b">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Seating Capacity:
                                                <strong>3 Front and 4 Back Comfortable</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Cargo Volume
                                                <strong>460-Litres Maximum</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Number of Doors
                                                <strong>4 Doors (2 Front & 2 Back)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Type:
                                                <strong>Tubeless, Radial (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Size:
                                                <strong>218/53 R15 ( With Stepney)</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Size
                                                <strong>165/38 R15 (With Stepney)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Type
                                                <strong>Alloy Wheel (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Fuel Tank Capacity:
                                                <strong>65 Litres</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Front Headroom:
                                                <strong>914mm Front Headroom</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Rear Headroom:
                                                <strong>916mm Rear Headroom</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade" id="c">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Seating Capacity:
                                                <strong>3 Front and 4 Back Comfortable</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Cargo Volume
                                                <strong>460-Litres Maximum</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Number of Doors
                                                <strong>4 Doors (2 Front & 2 Back)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Type:
                                                <strong>Tubeless, Radial (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Size:
                                                <strong>218/53 R15 ( With Stepney)</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Size
                                                <strong>165/38 R15 (With Stepney)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Type
                                                <strong>Alloy Wheel (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Fuel Tank Capacity:
                                                <strong>65 Litres</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Front Headroom:
                                                <strong>914mm Front Headroom</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Rear Headroom:
                                                <strong>916mm Rear Headroom</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade" id="d">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Seating Capacity:
                                                <strong>3 Front and 4 Back Comfortable</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Cargo Volume
                                                <strong>460-Litres Maximum</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Number of Doors
                                                <strong>4 Doors (2 Front & 2 Back)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Type:
                                                <strong>Tubeless, Radial (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Tyre Size:
                                                <strong>218/53 R15 ( With Stepney)</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="car-list-wrapper-2">
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Size
                                                <strong>165/38 R15 (With Stepney)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Wheel Type
                                                <strong>Alloy Wheel (ARBC Approved)</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Fuel Tank Capacity:
                                                <strong>65 Litres</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Front Headroom:
                                                <strong>914mm Front Headroom</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-angle-double-right alignleft"></i>
                                                Rear Headroom:
                                                <strong>916mm Rear Headroom</strong>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                        </div>
                    </div>
                    <!-- /tabs -->

                    <div class="car-table clearfix">
                        <p><strong>Extra Features</strong> of Audi A8 3.0 TDI S12 Quattro Tiptronic </p>
                        <i class="fa fa-angle-down"></i>
                    </div><!-- end car-table -->

                    <div class="row-fluid row-content clearfix">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <ul class="normallist">
                                <li><i class="fa fa-check"></i> <strong>Auto on Headlights</strong></li>
                                <li><i class="fa fa-check"></i> <strong>LED Taillights</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Solar Tinted Glass</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Spare Tire Kit (Inflator)</strong></li>
                            </ul><!-- end ul -->
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <ul class="normallist">
                                <li><i class="fa fa-check"></i> <strong>Sensor Airbags (Approved)</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Child Seat Anchors</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Anti Theft System (Alaram)</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Advanced Bluetooth</strong></li>
                            </ul><!-- end ul -->
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <ul class="normallist">
                                <li><i class="fa fa-check"></i> <strong>CD & DVD Players</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Electric Side Mirror</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Navigation System</strong></li>
                                <li><i class="fa fa-check"></i> <strong>Rear Traffic Alert</strong></li>
                            </ul><!-- end ul -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="banner-wrapper clearfix">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="banner-message">
                                    <span>Audi A8 3.0 TDI S12 Quattro Tiptronic </span>
                                    <small class="badge">Special Offers</small>

                                    <div class="special-offer clearfix">
                                        <small>Sales Offer:</small>
                                        <p>1.5APR ,Deal Available untill Aug 21 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*2
                                            Years Free Service</p>
                                    </div>

                                    <div class="special-offer clearfix">
                                        <small>Service Offer:</small>
                                        <p>Get 50% Discount on Every Service &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* 1
                                            Year Free Service</p>
                                        <p>3 Years Warrant for all Products</p>
                                    </div>
                                </div><!-- end message -->
                            </div><!-- end col -->

                            <div class="col-md-5 col-sm-5">
                                <a href="#"><img src="{{asset('frontend/uploads/banner_03.png')}}" alt=""
                                        class="img-responsive"></a>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end banner-wrapper -->

                    <hr class="invis">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="section-title clearfix">
                                <h5>Contact Us</h5>
                                <hr class="custom">
                            </div><!-- end section-title -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="search-tab lightversion clearfix">
                                <div class="search-wrapper">
                                    <form class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" placeholder="Your Name *">
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" class="form-control" placeholder="Your Email *">
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" placeholder="Phone Number *">
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="orderby" class="selectpicker">
                                                <option>Subject</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end col -->

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea class="form-control" placeholder="Your Message"></textarea>
                                        </div><!-- end col -->

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary">SUBMIT NOW</button>
                                        </div><!-- end col -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-4 col-sm-4 col-xs-12 m30">
                            <div class="contact-departments contact-version clearfix">
                                <ul class="contact-widget clearfix">
                                    <li>
                                        <i class="fa fa-map-marker alignleft"></i>
                                        <strong>Address:</strong> Level 13, 2 Elizabeth St,
                                        <br> Melbourne, Victoria 3000 Australia
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o alignleft"></i>
                                        <strong>Have any questions?</strong> support@SteelThemes.com
                                    </li>
                                    <li>
                                        <i class="fa fa-phone alignleft"></i>
                                        <strong>Call us & Hire us</strong> (526) 326-985-7423
                                    </li>
                                    <li>
                                        <i class="fa fa-fax alignleft"></i>
                                        <strong>Fax</strong> (526) 326-985-7423
                                    </li>
                                </ul>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end single-car-wrapper -->
            </div><!-- end col -->

            <div class="custom-sidebar col-md-3 col-sm-12">
                <div class="widget light-widget clearfix">
                    <div class="inner-addon right-addon">
                        <i class="glyphicon glyphicon-search"></i>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div><!-- end widget -->

                <div class="widget clearfix">
                    <div class="search-tab light-tab clearfix">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs search-tab-nav" role="tablist">
                            <li role="presentation" class="active"><a href="#tab01" role="tab" data-toggle="tab">New
                                    Cars</a></li>
                            <li role="presentation"><a href="#tab02" role="tab" data-toggle="tab">Used Cars</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="tab01">
                                <div class="search-wrapper">
                                    <form class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-input">
                                                <label>Make:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>All Makes</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Models:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>All Models</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Body:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>Convertible:</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Year:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>2012 - 2013</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-input">
                                                <label>Min Price:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>$30.000</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-input">
                                                <label>Max Price:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>$130.000</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-input">
                                                <label>Transmission:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>Semi Automatic</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Color:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>Titanium Metalic</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-12 col-xs-12">
                                            <button class="btn btn-primary btn-block">FIND A CAR</button>
                                            <a href="#" class="customa"><i class="fa fa-refresh"></i> Reset all</a>
                                        </div><!-- end col -->
                                    </form><!-- end row -->
                                </div><!-- end search-wrapper -->
                            </div><!-- end tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="tab02">
                                <div class="search-wrapper">
                                    <form class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-input">
                                                <label>Make:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>All Makes</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Models:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>All Models</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Body:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>Convertible:</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Year:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>2012 - 2013</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-input">
                                                <label>Min Price:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>$30.000</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-input">
                                                <label>Max Price:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>$130.000</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-input">
                                                <label>Transmission:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>Semi Automatic</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->

                                            <div class="form-input">
                                                <label>Color:</label>
                                                <select name="orderby" class="selectpicker">
                                                    <option>Titanium Metalic</option>
                                                    <option>Select Dropdown 01</option>
                                                    <option>Select Dropdown 02</option>
                                                    <option>Select Dropdown 03</option>
                                                    <option>Select Dropdown 04</option>
                                                    <option>Select Dropdown 05</option>
                                                </select>
                                            </div><!-- end form-input -->
                                        </div><!-- end col -->

                                        <div class="col-md-12 col-xs-12">
                                            <button class="btn btn-primary btn-block">FIND A CAR</button>
                                        </div><!-- end col -->
                                    </form><!-- end row -->
                                </div><!-- end search-wrapper -->
                            </div><!-- end tab-pane -->
                        </div><!-- end tab content -->
                    </div>
                </div><!-- end widget -->

                <div class="widget custom-widget clearfix">
                    <div class="section-title clearfix">
                        <h5>Customers Reviews</h5>
                        <hr class="custom">
                    </div><!-- end section-title -->
                    <div class="sidebar-testimonial">
                        <div class="testimonial clearfix">
                            <p class="lead">They have got my project on time with competition well-organized and very
                                experienced team of professional engineers.</p>
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
                    </div><!-- end sidebar-testimonial -->
                </div><!-- end widget -->

                <div class="widget custom-widget clearfix">
                    <div class="section-title clearfix">
                        <h5>Engines Brochure</h5>
                        <hr class="custom">
                    </div><!-- end section-title -->

                    <div class="brochures">
                        <a href="#"><i class="fa fa-file-pdf-o"></i> Car Manual Book.pdf</a>
                        <hr class="invis2">
                        <a href="#"><i class="fa fa-file-pdf-o"></i> Engines Profile.pdf</a>
                    </div><!-- end brochures -->
                </div><!-- end widget -->

                <div class="widget custom-widget clearfix">
                    <div class="calculator">
                        <div class="calculator-title">
                            <h4>Payment Calculator</h4>
                        </div><!-- end title -->
                        <div class="search-tab light-tab calculator-body">
                            <div class="search-wrapper">
                                <form class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-input">
                                            <label>Vehicle Price ($)</label>
                                            <input class="form-control" placeholder="500000" type="text">
                                        </div><!-- end form-input -->
                                        <div class="form-input">
                                            <label>Down Price ($)</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>20000</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-input">
                                            <label>Term (Month)</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>24</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-input">
                                            <label>Interest Rate</label>
                                            <select name="orderby" class="selectpicker">
                                                <option>8.97%</option>
                                                <option>Select Dropdown 01</option>
                                                <option>Select Dropdown 02</option>
                                                <option>Select Dropdown 03</option>
                                                <option>Select Dropdown 04</option>
                                                <option>Select Dropdown 05</option>
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <hr class="invis2">
                                        <h5>Monthly Payment:</h5>
                                        <label>$21906.66</label>
                                        <hr class="invis2">
                                        <h5>Total Interest to Pay:</h5>
                                        <label>$25759.84</label>
                                        <hr class="invis2">
                                        <h5>Total Amount:</h5>
                                        <label class="totalpay">$525759.84</label>
                                        <hr class="invis2">
                                        <a href="#" class="btn btn-default btn-block">CALCULATE</a>
                                    </div><!-- end col -->
                                </form>
                            </div><!-- end search wrapper -->
                        </div><!-- end body -->
                    </div><!-- end calculator -->
                </div><!-- d widget -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection
