<div class="row">
    <div class="col-md-12">

        <div class="search-tab clearfix">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs search-tab-nav" role="tablist">
                <li role="presentation" class="active"><a href="#tab01" role="tab" data-toggle="tab">Search
                        Wheels</a></li>
                <li role="presentation"><a href="#tab02" role="tab" data-toggle="tab">Search Tires</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab01">
                    <div class="search-wrapper">
                        <form id="home_search" class="row" action="{{ route('frontend.pages.wheels') }}" method="post">
                            @csrf
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div id="yearLoader" style="display: none">
                                    <div class="loader">
                                        <div class="select-overlay-content">
                                            <div class="select-spinner"></div>
                                        </div>
                                    </div>
                                </div>
                                <select name="year" class="year" id="year">
                                    <option value="">Year</option>
                                    @isset($years)
                                    @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div><!-- end col -->

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div id="makeLoader" style="display: none">
                                    <div class="loader">
                                        <div class="select-overlay-content">
                                            <div class="select-spinner"></div>
                                        </div>
                                    </div>
                                </div>
                                <select name="make" class="make" disabled>
                                    <option value="">Make</option>
                                </select>
                            </div><!-- end col -->

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div id="modelLoader" style="display: none">
                                    <div class="loader">
                                        <div class="select-overlay-content">
                                            <div class="select-spinner"></div>
                                        </div>
                                    </div>
                                </div>
                                <select name="model" class="model" disabled>
                                    <option>Model</option>
                                </select>
                            </div><!-- end col -->

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <button type="button" id="btn_search" class="btn btn-primary btn-block">SEARCH</button>
                            </div><!-- end col -->
                        </form><!-- end row -->
                    </div><!-- end search-wrapper -->
                </div><!-- end tab-pane -->

                <div role="tabpanel" class="tab-pane fade" id="tab02">
                    <div class="search-wrapper">
                        <form id="tire_search" class="row" action="{{ route('frontend.pages.tires') }}" method="post">
                            @csrf
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div id="yearTireLoader" style="display: none">
                                    <div class="loader">
                                        <div class="select-overlay-content">
                                            <div class="select-spinner"></div>
                                        </div>
                                    </div>
                                </div>
                                <select name="yearTire" class="yearTire" id="yearTire">
                                    <option value="">Year</option>
                                    @isset($years)
                                    @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div><!-- end col -->

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div id="makeTireLoader" style="display: none">
                                    <div class="loader">
                                        <div class="select-overlay-content">
                                            <div class="select-spinner"></div>
                                        </div>
                                    </div>
                                </div>
                                <select name="makeTire" class="makeTire" disabled>
                                    <option value="">Make</option>
                                </select>
                            </div><!-- end col -->

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div id="modelTireLoader" style="display: none">
                                    <div class="loader">
                                        <div class="select-overlay-content">
                                            <div class="select-spinner"></div>
                                        </div>
                                    </div>
                                </div>
                                <select name="modelTire" class="modelTire" disabled>
                                    <option>Model</option>
                                </select>
                            </div><!-- end col -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <button type="button" id="tire_btn_search"
                                    class="btn btn-primary btn-block">SEARCH</button>
                            </div><!-- end col -->
                        </form><!-- end row -->
                    </div><!-- end search-wrapper -->
                </div><!-- end tab-pane -->
            </div><!-- end tab-content -->
        </div><!-- end tab -->
    </div><!-- end col -->
</div>
