<!-- ******************************************
        FOOTER
        ********************************************** -->
<div class="section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>About Tire Studio</h4>
                    </div><!-- end widget-title -->
                    <div class="about-widget">
                        <p>It is a long established fact that a reader will be distracted by the readable.</p>
                        <a href="{{route('frontend.pages.about')}}" class="readmore">Learn More</a>
                    </div><!-- end about-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-md-8 col-sm-12">
                <div class="widget clearfix">
                    <div class="twitter-carousel owl-carousel owl-theme">
                        <div class="twitter-widget clearfix">
                            <p><i class="flaticon-social-media alignleft"></i> <a href="javascript:void(0)">@John
                                    Bravo</a>, Second time using Tire Studio and have been pleased with the available
                                selection and customer service. Items are shipped
                                on time. Will continue using Tire Studio for my needs.</p>
                        </div><!-- end testimonial -->

                        <div class="twitter-widget clearfix">
                            <p>A friend told me about Tire Studio. I decided to get all four of my tires replaced and
                                wanted a new brand of tires this
                                year. Tire Studio was knowledgeable and very professional. They made it easy to find
                                which tires were best for my car
                                and budget. Now they have a new and loyal customer!</p>
                        </div><!-- end testimonial -->
                    </div><!-- end carousel -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr>

        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Contact</h4>
                    </div><!-- end widget-title -->

                    <ul class="contact-widget clearfix">
                        {{-- <li><i class="fa fa-map-marker"></i> Rock St 12, Newyork City, USA</li> --}}
                        <li><i class="fa fa-phone"></i> 209-507-1033</li>
                        <li><i class="fa fa-envelope-o"></i> info@tiresstudio.com</li>
                        {{-- <li><i class="fa fa-fax"></i> 209-507-1033</li> --}}
                        {{-- <li><a href="javascript:void(0)">Find Us On Map</a></li> --}}
                    </ul>
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Latest Blog Post</h4>
                    </div><!-- end widget-title -->

                    <ul class="related-post clearfix">
                        <li>
                            <a href="javascript:void(0)">Find latest news about our wheels & tires for easy to choose
                                best
                                one.</a>
                            <small><i class="fa fa-clock-o"></i> Feb 21, 2022</small>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Find latest news about our wheels & tires for easy to choose
                                best
                                one.</a>
                            <small><i class="fa fa-clock-o"></i> Feb 21, 2022</small>
                        </li>
                    </ul><!-- end related -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Useful Tags</h4>
                    </div><!-- end widget-title -->

                    <ul class="tags list-inline">
                        <li><a href="javascript:void(0)">Wheels</a></li>
                        <li><a href="javascript:void(0)">Wheels</a></li>
                        <li><a href="javascript:void(0)">Tires</a></li>
                        <li><a href="javascript:void(0)">Accessories</a></li>
                        <li><a href="javascript:void(0)">Tiresstudio</a></li>
                    </ul><!-- end tags -->
                </div><!-- end widget -->

                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Subscribe Us</h4>
                    </div><!-- end widget-title -->

                    <div class="footer-newsletter clearfix">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control input-lg" placeholder="Email Address...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-lg" type="button">
                                    Go
                                </button>
                            </span>
                        </div>
                    </div>
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Operating Hours</h4>
                    </div><!-- end widget-title -->

                    <ul class="related-post working-hours clearfix">
                        <li>
                            <h5>Sales Department</h5>
                            <p>Open Daily: 9am - 5pm</p>
                            {{-- <p>Saturday & Sunday: <small>Closed</small></p> --}}
                        </li>
                        <li>
                            <h5>Service Department</h5>
                            <p>Open Daily: 9am - 5pm</p>
                            {{-- <p>Saturday & Sunday: <small>Closed</small></p> --}}
                        </li>
                    </ul><!-- end related -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end footer -->

<!-- ******************************************
        COPYRIGHTS
        ********************************************** -->
<div class="copyrights">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 text-left">
                <p>Copyrights <small>© 2022</small> All Rights Reserved by <a
                        href="{{route('frontend.pages.index')}}">Tiresstudio.com</a>.</p>
            </div><!-- end col -->

            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                <ul class="list-inline">
                    <li><a href="{{route('frontend.pages.index')}}">Home</a></li>
                    {{-- <li><a href="{{route('frontend.pages.about')}}">About</a></li> --}}
                    @foreach ($pages as $page)
                    <li><a href="{{route('frontend.pages.page', $page->id)}}">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="{{route('frontend.pages.contact')}}">Contact</a></li>
                    <li><a href="{{route('frontend.pages.wheels')}}">Wheels</a></li>
                    <li><a href="{{route('frontend.pages.tires')}}">Tires</a></li>
                    <li><a href="{{route('frontend.pages.contact')}}">Contact</a></li>
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end copyrights -->
<div class="dmtop"><i class="fa fa-angle-up"></i></div>
