@extends('layouts.frontend')

@section('content')

<!-- ******************************************
        PAGE TITLE
        ********************************************** -->

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>About Us</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">About Us</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end col -->
        </div><!-- end page-title -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
        PAGE WRAPPER
        ********************************************** -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="welcome-widget clearfix">
                    <div class="section-title clearfix">
                        <h4>Welcome to the Engines</h4>
                        <hr class="custom">
                    </div><!-- end section-title -->

                    <p><strong>Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In
                            iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique
                            digniss mi dictum.</strong></p>

                    <p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you
                        a complete account of the system, and expound the actual se teachings of the great explorer of
                        the truth, the m rejects, dislikes, avoids pleasure itself mistaken idea sed off denouncing
                        pleasure.</p>

                    <div class="widget-footer row">
                        <div class="col-md-5">
                            <strong>William Shocks, <small>Founder</small></strong>
                            <small class="val">Engines.</small>
                        </div>
                        <div class="col-md-7">
                            <img src="{{asset('frontend/images/signature.png')}}" alt="" class="">
                        </div><!-- end col -->
                    </div>
                </div><!-- end welcome-widget -->
            </div><!-- end col -->

            <div class="col-md-6 col-sm-12 welcome-widget wow fadeIn">
                <img src="{{asset('frontend/uploads/about.png')}}" alt="" class="img-responsive">
            </div>
        </div><!-- end row -->

        <hr class="large">

        <div class="row vission-mission">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="post-media entry">
                            <img src="{{asset('frontend/uploads/mission_01.png')}}" alt="" class="img-responsive">
                            <div class="magnifier"><a href="#"><img src="{{asset('frontend/images/zoom.png')}}"
                                        alt=""></a></div>
                        </div><!-- end col -->
                    </div><!-- end post-media -->

                    <div class="col-md-6">
                        <div class="post-media entry">
                            <img src="{{asset('frontend/uploads/mission_02.png')}}" alt="" class="img-responsive">
                            <div class="magnifier"><a href="#"><img src="{{asset('frontend/images/zoom.png')}}"
                                        alt=""></a></div>
                        </div><!-- end col -->
                    </div><!-- end post-media -->
                </div><!-- end row -->

                <div class="section-title small-margin-title clearfix">
                    <h5>Our Mission</h5>
                    <hr class="custom">
                </div><!-- end section-title -->

                <div class="service-text">
                    <p>Denouncing pleasure and praising pain was born and I will give you a complete account of the
                        system, and expound the actual se teachings off the great explorere of the truth, the
                        master-builder of human happiness no sed one rejects, dislikes.</p>
                    <ul class="customlist">
                        <li><i class="fa fa-check"></i> Customer statisfaction is first</li>
                        <li><i class="fa fa-check"></i> No compromise in products quality</li>
                        <li><i class="fa fa-check"></i> Dealing with a customer as a friend</li>
                    </ul>
                </div><!-- end service-text -->
            </div><!-- end col -->

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="post-media entry">
                            <img src="{{asset('frontend/uploads/mission_03.png')}}" alt="" class="img-responsive">
                            <div class="magnifier"><a href="#"><img src="{{asset('frontend/images/zoom.png')}}"
                                        alt=""></a></div>
                        </div><!-- end col -->
                    </div><!-- end post-media -->

                    <div class="col-md-6">
                        <div class="post-media entry">
                            <img src="{{asset('frontend/uploads/mission_04.png')}}" alt="" class="img-responsive">
                            <div class="magnifier"><a href="#"><img src="{{asset('frontend/images/zoom.png')}}"
                                        alt=""></a></div>
                        </div><!-- end col -->
                    </div><!-- end post-media -->
                </div><!-- end row -->

                <div class="section-title small-margin-title clearfix">
                    <h5>Our Vision</h5>
                    <hr class="custom">
                </div><!-- end section-title -->

                <div class="service-text">
                    <p>Again is there anyone who loves or pursues or desires to obtain pain of itself, because it is
                        pain, but because occasionally circumstances occur in which is a toil and pain can him some
                        great pleasure. To take a trivial undertakes laboexercise.</p>
                    <ul class="customlist">
                        <li><i class="fa fa-check"></i> We intend to provide our customers with the best experience</li>
                        <li><i class="fa fa-check"></i> To help people enjoy life with their lovable own car</li>
                        <li><i class="fa fa-check"></i> To have our product in every home in the United States</li>
                    </ul>
                </div><!-- end service-text -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
        PARALLAX
        ********************************************** -->
<div class="parallax section" data-stellar-background-ratio="0.7"
    style="background-image:url('frontend/uploads/parallax_04.jpg');">
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
        SERVICES SECTION
        ********************************************** -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title clearfix text-center">
                    <h4>Our Advantages</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row about-list">
            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                <div class="service-hover text-center">
                    <i class="flaticon-home"></i>
                    <h4>25 years of Experience</h4>
                    <p class="showhover">Know how to pursue pleasure seds encounter consequences that are ut extremely
                        painfull nor pursues.</p>
                </div><!-- end service-hover -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                <div class="service-hover text-center">
                    <i class="flaticon-profile"></i>
                    <h4>Exclusive Partnership</h4>
                    <p class="showhover">Know how to pursue pleasure seds encounter consequences that are ut extremely
                        painfull nor pursues.</p>
                </div><!-- end service-hover -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                <div class="service-hover text-center">
                    <i class="flaticon-technology-2"></i>
                    <h4>Innovative Workers</h4>
                    <p class="showhover">Know how to pursue pleasure seds encounter consequences that are ut extremely
                        painfull nor pursues.</p>
                </div><!-- end service-hover -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">

        <div class="row about-list">
            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                <div class="service-hover text-center">
                    <i class="flaticon-tool-1"></i>
                    <h4>Best Quality Products</h4>
                    <p class="showhover">Know how to pursue pleasure seds encounter consequences that are ut extremely
                        painfull nor pursues.</p>
                </div><!-- end service-hover -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                <div class="service-hover text-center">
                    <i class="flaticon-hands"></i>
                    <h4>Business Opportunities</h4>
                    <p class="showhover">Know how to pursue pleasure seds encounter consequences that are ut extremely
                        painfull nor pursues.</p>
                </div><!-- end service-hover -->
            </div><!-- end col -->

            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                <div class="service-hover text-center">
                    <i class="flaticon-clock"></i>
                    <h4>24/7 Online Support</h4>
                    <p class="showhover">Know how to pursue pleasure seds encounter consequences that are ut extremely
                        painfull nor pursues.</p>
                </div><!-- end service-hover -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
        TEAM SECTION
        ********************************************** -->
<div class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title clearfix text-center">
                    <h4>Our Team Members</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="team-box clearfix">
                    <div class="post-media entry">
                        <img src="{{asset('frontend/uploads/team_01.jpg')}}" alt="" class="img-responsive">
                        <div class="magnifier colorized">
                            <div class="social-hover">
                                <ul class="list-inline">
                                    <li><a data-toggle="tooltip" data-placement="top" title="+91 84569 14 527"
                                            href="#"><i class="fa fa-phone"></i></a></li>
                                    <li><a data-toggle="tooltip" data-placement="top" title="info@yoursite.com"
                                            href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end media -->

                    <div class="team-desc text-center">
                        <h4>Michael Jeorge</h4>
                        <p>CEO & Founder</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="team-box clearfix">
                    <div class="post-media entry">
                        <img src="{{asset('frontend/uploads/team_02.jpg')}}" alt="" class="img-responsive">
                        <div class="magnifier colorized">
                            <div class="social-hover">
                                <ul class="list-inline">
                                    <li><a data-toggle="tooltip" data-placement="top" title="+91 84569 14 527"
                                            href="#"><i class="fa fa-phone"></i></a></li>
                                    <li><a data-toggle="tooltip" data-placement="top" title="info@yoursite.com"
                                            href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end media -->

                    <div class="team-desc text-center">
                        <h4>Alberto Siddle</h4>
                        <p>Team Leader</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="team-box clearfix">
                    <div class="post-media entry">
                        <img src="{{asset('frontend/uploads/team_03.jpg')}}" alt="" class="img-responsive">
                        <div class="magnifier colorized">
                            <div class="social-hover">
                                <ul class="list-inline">
                                    <li><a data-toggle="tooltip" data-placement="top" title="+91 84569 14 527"
                                            href="#"><i class="fa fa-phone"></i></a></li>
                                    <li><a data-toggle="tooltip" data-placement="top" title="info@yoursite.com"
                                            href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end media -->

                    <div class="team-desc text-center">
                        <h4>Stephen Fernando</h4>
                        <p>VP Sales & Marketing</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="team-box clearfix">
                    <div class="post-media entry">
                        <img src="{{asset('frontend/uploads/team_04.jpg')}}" alt="" class="img-responsive">
                        <div class="magnifier colorized">
                            <div class="social-hover">
                                <ul class="list-inline">
                                    <li><a data-toggle="tooltip" data-placement="top" title="+91 84569 14 527"
                                            href="#"><i class="fa fa-phone"></i></a></li>
                                    <li><a data-toggle="tooltip" data-placement="top" title="info@yoursite.com"
                                            href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end media -->

                    <div class="team-desc text-center">
                        <h4>William Kenndy</h4>
                        <p>Finance Manager</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
        FORM SECTION
        ********************************************** -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title clearfix text-center">
                    <h4>Supported Brands</h4>
                    <hr class="custom">
                </div><!-- end section-title -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row clients">
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_01.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_02.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_03.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_04.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_05.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_06.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_07.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_08.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_09.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-15 col-sm-3 col-xs-6">
                <img src="{{asset('frontend/uploads/client_10.jpg')}}" alt="" class="img-responsive">
            </div>
        </div><!-- end carousel -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection
