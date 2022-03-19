<div class="custom-sidebar col-md-3 col-sm-12">
    <div class="widget dark-widget clearfix">
        <div class="inner-addon right-addon">
            <i class="glyphicon glyphicon-search" ></i>
            <input type="text" class="form-control" id="search" placeholder="Search" onkeyup="getResults('{{ URL::current() }}')">
        </div>
    </div><!-- end widget -->

    <div class="widget clearfix">
        <div class="search-tab clearfix">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs search-tab-nav" role="tablist">
                @if($response['type'] == 'Wheel') <li role="presentation" class="active"><a href="#tab01" role="tab" data-toggle="tab">Wheels</a></li> @endif
                @if($response['type'] == 'Tire') <li role="presentation" class="active"><a href="#tab02" role="tab" data-toggle="tab">Tires</a></li> @endif
                @if($response['type'] == 'ACC') <li role="presentation" class="active"><a href="#tab03" role="tab" data-toggle="tab">Accessories</a></li> @endif
                @if($response['type'] == 'SHOP') <li role="presentation" class="active"><a href="#tab03" role="tab" data-toggle="tab">Shop</a></li> @endif
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                @if($response['type'] == 'Wheel')
                    <div role="tabpanel" class="tab-pane in active" id="tab01">
                    <div class="search-wrapper">
                        <form class="row" action="" id="sidebarForm" onsubmit="this.preventDefault()">
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

                            <input type="text" hidden name="year" id="year" value="{{ isset($response['filter']['year']) ? $response['filter']['year'] : '' }}">
                            <input type="text" hidden name="make" id="make" value="{{ isset($response['filter']['make']) ? $response['filter']['make'] : '' }}">
                            <input type="text" hidden name="model" id="model" value="{{ isset($response['filter']['model']) ? $response['filter']['model'] : '' }}">

                            <div class="col-md-12 col-xs-12">
                                <button class="btn btn-primary btn-block" type="button"   onclick="getResults('{{ route('frontend.pages.wheels') }}')">FILTER WHEELS</button>
                                <a href="javascript:void(0)" onclick="resetAll()" class="customa"><i class="fa fa-refresh"></i> Reset all</a>
                            </div><!-- end col -->
                        </form><!-- end row -->
                    </div><!-- end search-wrapper -->
                </div>
                @endif<!-- end tab-pane -->
                @if($response['type'] == 'Tire')
                    <div role="tabpanel" class="tab-pane in active" id="tab02">
                    <div class="search-wrapper">
                        <form class="row" action="" id="sidebarForm" onsubmit="this.preventDefault()">
                            @csrf
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-input">
                                    <label>Tires By Brand:</label>
                                    <select name="brands" id="brands">
                                        <option value="" >All Brand</option>
                                        @foreach($response['brands'] as $item)
                                            <option value="{{$item->id}}">{{$item->description}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Tires By Width:</label>
                                    <select name="width" id="width">
                                        <option value="">All Width</option>
                                        @foreach($response['width'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Tires By Wheel Diameter:</label>
                                    <select name="wheelDiameter" id="wheelDiameter">
                                        <option value="">All Wheel Diameter</option>
                                        @foreach($response['wheelDiameter'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Tires By Diameter:</label>
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
                                    <label>Tires By Rim Diameter:</label>
                                    <select name="rimDiameter" id="rimDiameter">
                                        <option value="">All Rim Diameter</option>
                                        @foreach($response['rimDiameter'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->

                                <div class="form-input">
                                    <label>Tires By Speed Rating:</label>
                                    <select name="speedRating" id="speedRating">
                                        <option value="">All Speed Rating</option>
                                        @foreach($response['speedRating'] as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->
                            </div><!-- end col -->

                            <input type="text" hidden name="year" id="year" value="{{ isset($response['filter']['year']) ? $response['filter']['year'] : '' }}">
                            <input type="text" hidden name="make" id="make" value="{{ isset($response['filter']['make']) ? $response['filter']['make'] : '' }}">
                            <input type="text" hidden name="model" id="model" value="{{ isset($response['filter']['model']) ? $response['filter']['model'] : '' }}">

                            <div class="col-md-12 col-xs-12">
                                <button class="btn btn-primary btn-block" type="button"   onclick="getResults('{{ route('frontend.pages.tires') }}')">FILTER TIRES</button>
                                <a href="javascript:void(0)" onclick="resetAll()" class="customa"><i class="fa fa-refresh"></i> Reset all</a>
                            </div><!-- end col -->
                        </form>
                    </div><!-- end search-wrapper -->
                </div>
                @endif<!-- end tab-pane -->
                @if($response['type'] == 'ACC')
                    <div role="tabpanel" class="tab-pane in active" id="tab03">
                    <div class="search-wrapper">
                        <form class="row" action="" id="sidebarForm" onsubmit="this.preventDefault()">
                            @csrf
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-input">
                                    <label>Accessories By Brand:</label>
                                    <select name="brands" id="brands">
                                        <option value="" >All Brand</option>
                                        @foreach($response['brands'] as $item)
                                            <option value="{{$item->id}}">{{$item->description}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-input -->
                            </div><!-- end col -->

                            <input type="text" hidden name="year" id="year" value="{{ isset($response['filter']['year']) ? $response['filter']['year'] : '' }}">
                            <input type="text" hidden name="make" id="make" value="{{ isset($response['filter']['make']) ? $response['filter']['make'] : '' }}">
                            <input type="text" hidden name="model" id="model" value="{{ isset($response['filter']['model']) ? $response['filter']['model'] : '' }}">

                            <div class="col-md-12 col-xs-12">
                                <button class="btn btn-primary btn-block" type="button"   onclick="getResults('{{ route('frontend.pages.accessories') }}')">FILTER ACCESSORIES</button>
                                <a href="javascript:void(0)" onclick="resetAll()" class="customa"><i class="fa fa-refresh"></i> Reset all</a>
                            </div><!-- end col -->
                        </form>
                    </div><!-- end search-wrapper -->
                </div>
                @endif
                @if($response['type'] == 'SHOP')
                        <div role="tabpanel" class="tab-pane in active" id="tab03">
                            <div class="search-wrapper">
                                <form class="row" action="" id="sidebarForm" onsubmit="this.preventDefault()">
                                    @csrf
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-input">
                                            <label>Shop By Brand:</label>
                                            <select name="brands" id="brands">
                                                <option value="" >All Brand</option>
                                                @foreach($response['brands'] as $item)
                                                    <option value="{{$item->id}}">{{$item->description}}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- end form-input -->
                                    </div><!-- end col -->

                                    <input type="text" hidden name="year" id="year" value="{{ isset($response['filter']['year']) ? $response['filter']['year'] : '' }}">
                                    <input type="text" hidden name="make" id="make" value="{{ isset($response['filter']['make']) ? $response['filter']['make'] : '' }}">
                                    <input type="text" hidden name="model" id="model" value="{{ isset($response['filter']['model']) ? $response['filter']['model'] : '' }}">

                                    <div class="col-md-12 col-xs-12">
                                        <button class="btn btn-primary btn-block" type="button"   onclick="getResults('{{ route('frontend.pages.shop') }}')">FILTER SHOP</button>
                                        <a href="javascript:void(0)" onclick="resetAll()" class="customa"><i class="fa fa-refresh"></i> Reset all</a>
                                    </div><!-- end col -->
                                </form>
                            </div><!-- end search-wrapper -->
                        </div>
                @endif<!-- end tab-pane -->
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
