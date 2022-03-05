<div class="custom-sidebar col-md-3 col-sm-12">
    <div class="widget dark-widget clearfix">
        <div class="inner-addon right-addon">
            <i class="glyphicon glyphicon-search" ></i>
            <input type="text" class="form-control" id="search" placeholder="Search" onkeyup="getResults('{{ route('frontend.pages.wheels') }}')">
        </div>
    </div><!-- end widget -->

    <div class="widget clearfix">
        <div class="search-tab clearfix">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs search-tab-nav" role="tablist">
                <li role="presentation" class="active"><a href="#tab01" role="tab" data-toggle="tab">Wheels</a></li>
                {{--<li role="presentation"><a href="#tab02" role="tab" data-toggle="tab">Tires</a></li>--}}
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active" id="tab01">
                    <div class="search-wrapper">
                        <form class="row" action="" id="sidebarForm">
                            @csrf
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-input">
                                    <label>Wheels By Brand:</label>
                                    <select name="brands" id="brands">
                                        <option value="" >All Brand</option>
                                        @foreach($response['brands'] as $item)
                                            <option value="{{$item->id}}">{{$item->description}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Wheels By Finish:</label>
                                    <select name="finishes" id="finishes">
                                        <option value="">All Finish</option>
                                        @foreach($response['finishes'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Wheels By Bolt Pattern:</label>
                                    <select name="boltPatterns" id="boltPatterns">
                                        <option value="">All Bolt Pattern</option>
                                        @foreach($response['boltPatterns'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Wheels By Diameter:</label>
                                    <select name="diameter" id="diameter">
                                        <option value="">All Diameter</option>
                                        @foreach($response['diameter'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->
                            </div><!-- end col -->

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-input">
                                    <label>Wheels By Offset:</label>
                                    <select name="offset" id="offset">
                                        <option value="">All Offset</option>
                                        @foreach($response['offset'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Wheels By Size:</label>
                                    <select name="sizeDesc" id="sizeDesc">
                                        <option value="">All Size</option>
                                        @foreach($response['sizeDesc'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->
                            </div><!-- end col -->

                            <div class="col-md-12 col-xs-12">
                                <a class="btn btn-primary btn-block thisPage" href="javascript:void(0)"  onclick="getResults('{{ route('frontend.pages.wheels') }}')">FILTER WHEELS</a>
                                <a href="javascript:void(0)" onclick="resetAll()" class="customa"><i class="fa fa-refresh"></i> Reset all</a>
                            </div><!-- end col -->
                        </form><!-- end row -->
                    </div><!-- end search-wrapper -->
                </div><!-- end tab-pane -->

                {{--<div role="tabpanel" class="tab-pane" id="tab02">
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
                                <button class="btn btn-primary btn-block">FILTER TIRES</button>
                            </div><!-- end col -->
                        </form><!-- end row -->
                    </div><!-- end search-wrapper -->
                </div>--}}<!-- end tab-pane -->
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
                    <img src="uploads/testi_01.png" alt="" class="img-responsive alignleft">
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
</div><!-- end col -->
