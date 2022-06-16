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
                            <h5 class="custom-title">Support Department</h5>
                            <ul class="contact-widget clearfix">
                                {{-- <li>
                                    <i class="fa fa-map-marker alignleft"></i>
                                    <strong>Address:</strong>
                                    Level 13, 2 Elizabeth St,<br>
                                    Melbourne, Victoria 3000 Australia
                                </li> --}}
                                <li>
                                    <i class="fa fa-envelope-o alignleft"></i>
                                    <strong>Have any questions?</strong>
                                    info@tiresstudio.com
                                </li>
                                <li>
                                    <i class="fa fa-phone alignleft"></i>
                                    <strong>Call us</strong>
                                    209-507-1033
                                </li>
                                {{-- <li>
                                    <i class="fa fa-fax alignleft"></i>
                                    <strong>Fax</strong>
                                    (526) 326-985-7423
                                </li> --}}
                            </ul>
                        </div>
                        {{-- <div>
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
                                    info@tiresstudio.com
                                </li>
                                <li>
                                    <i class="fa fa-phone alignleft"></i>
                                    <strong>Call us & Hire us</strong>
                                    209-507-1033
                                </li>
                                <li>
                                    <i class="fa fa-fax alignleft"></i>
                                    <strong>Fax</strong>
                                    (526) 326-985-7423
                                </li>
                            </ul>
                        </div> --}}
                    </div><!-- end carousel -->
                    <div class="contact-version social-icons">
                        <ul class="list-inline">
                            <li><strong>We Are Social:</strong></li>
                            <li><a href="https://www.facebook.com/Tire-Studio-101850355652222" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/tire_studio/" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="section-title clearfix">
                    <h5>Send Us a Message</h5>
                    <hr class="custom">
                </div><!-- end section-title -->

                <div class="search-tab lightversion clearfix">
                    <h5 class="custom-title">I would like to discuss:</h5>
                    <div class="search-wrapper">
                        @include('frontend.includes.contact')
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

{{-- <div id="map"></div> --}}

@endsection

@section('scripts')
<script src="js/map.js"></script>
@endsection
