@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Contact</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.pages.index') }}">Home</a></li>
                            <li class="active">Contact</li>
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
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="section-title clearfix">
                    <h5>Contact Details</h5>
                    <hr class="custom">
                </div><!-- end section-title -->

                <div class="contact-departments contact-version clearfix">
                    <div class="contact-carousel owl-carousel owl-theme">
                        <div>
                            <h5 class="custom-title">Sales Department</h5>
                            <ul class="contact-widget clearfix">
                                <li>
                                    <i class="fa fa-map-marker alignleft"></i>
                                    <strong>Address:</strong>
                                    Level 13, 2 Elizabeth St,<br>
                                    Melbourne, Victoria 3000 Australia
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o alignleft"></i>
                                    <strong>Have any questions?</strong>
                                    support@SteelThemes.com
                                </li>
                                <li>
                                    <i class="fa fa-phone alignleft"></i>
                                    <strong>Call us & Hire us</strong>
                                    (526) 326-985-7423
                                </li>
                                <li>
                                    <i class="fa fa-fax alignleft"></i>
                                    <strong>Fax</strong>
                                    (526) 326-985-7423
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="custom-title">Support Department</h5>
                            <ul class="contact-widget clearfix">
                                <li>
                                    <i class="fa fa-map-marker alignleft"></i>
                                    <strong>Address:</strong>
                                    Level 13, 2 Elizabeth St,<br>
                                    Melbourne, Victoria 3000 Australia
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o alignleft"></i>
                                    <strong>Have any questions?</strong>
                                    support@SteelThemes.com
                                </li>
                                <li>
                                    <i class="fa fa-phone alignleft"></i>
                                    <strong>Call us & Hire us</strong>
                                    (526) 326-985-7423
                                </li>
                                <li>
                                    <i class="fa fa-fax alignleft"></i>
                                    <strong>Fax</strong>
                                    (526) 326-985-7423
                                </li>
                            </ul>
                        </div>
                    </div><!-- end carousel -->
                    <div class="contact-version social-icons">
                        <ul class="list-inline">
                            <li><strong>We Are Social:</strong></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="section-title clearfix">
                    <h5>Send Message Us</h5>
                    <hr class="custom">
                </div><!-- end section-title -->

                <div class="search-tab lightversion clearfix">
                    <h5 class="custom-title">I would like to discuss:</h5>
                    <div class="search-wrapper">
                        <form class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="orderby" class="selectpicker">
                                    <option>Turnaround Consulting</option>
                                    <option>Select Dropdown 01</option>
                                    <option>Select Dropdown 02</option>
                                    <option>Select Dropdown 03</option>
                                    <option>Select Dropdown 04</option>
                                    <option>Select Dropdown 05</option>
                                </select>
                            </div><!-- end col -->

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="Your Name *">
                            </div><!-- end col -->

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" class="form-control" placeholder="Your Email *">
                            </div><!-- end col -->

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="Phone Number *">
                            </div><!-- end col -->

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" placeholder="Your Message"></textarea>
                            </div><!-- end col -->

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary btn-block">SUBMIT NOW</button>
                            </div><!-- end col -->
                        </form>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="map"></div>

@endsection

@section('scripts')
<script src="js/map.js"></script>
@endsection
