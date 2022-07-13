<div class="section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>About Tire Studio</h4>
                    </div>
                    <div class="about-widget">
                        <p>Tire Store was created by car enthusiasts for car enthusiasts with a goal of providing a
                            single destination for customers to easily locate all items pertaining to their wheel and
                            tire needs.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Contact</h4>
                    </div>

                    <ul class="contact-widget clearfix">
                        <li><i class="fa fa-phone"></i> 209-507-1033</li>
                        <li><i class="fa fa-envelope-o"></i> info@tiresstudio.com</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h4>Operating Hours</h4>
                    </div>

                    <ul class="related-post working-hours clearfix">
                        <li>
                            <h5>Sales Department</h5>
                            <p>Open Daily: 9am - 5pm</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copyrights">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 text-left">
                <p>Copyrights <small>© 2022</small> All Rights Reserved by <a
                        href="{{route('frontend.pages.index')}}">Tiresstudio.com</a>.</p>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                <ul class="list-inline">
                    <li><a href="{{route('frontend.pages.index')}}">Home</a></li>
                    @foreach ($pages as $page)
                    <li><a href="{{route('frontend.pages.page', $page->id)}}">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="{{route('frontend.pages.wheels')}}">Wheels</a></li>
                    <li><a href="{{route('frontend.pages.tires')}}">Tires</a></li>
                    <li><a href="{{route('frontend.pages.contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="dmtop"><i class="fa fa-angle-up"></i></div>
