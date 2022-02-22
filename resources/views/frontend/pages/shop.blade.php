@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Inventory</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Inventory</a></li>
                            <li class="active">Shop</li>
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

            @include('frontend.includes.sidebar')

            <div class="col-md-9 col-sm-12">
                <div class="car-list-wrapper clearfix">
                    <div class="list-top clearfix">
                        <div class="pull-left">
                            <div class="form-input">
                                <label class="">Sort by:</label>
                                <select name="orderby" class="selectpicker">
                                    <option>Price: Highest First</option>
                                    <option>Price: Lowest First</option>
                                    <option>Time: End First</option>
                                    <option>Time: First First</option>
                                </select>
                            </div><!-- end form-input -->
                        </div><!-- end left -->

                        <div class="pull-right hidden-xs">
                            <ul class="list-inline">
                                <li class="active"><a href="#"><i class="flaticon-grid"></i></a></li>
                                <li><a href="#"><i class="flaticon-list"></i></a></li>
                            </ul><!-- end ul -->
                        </div><!-- end right -->
                    </div><!-- end list-top -->

                    <div class="row grid-wrapper">
                        @foreach ($response['products'] as $product)
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                            <div class="car-wrapper clearfix">
                                <div class="post-media entry">
                                    <img src="{{asset('frontend/wheels/1.png')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                    </div><!-- end magnifier -->
                                    {{-- <div class="car-price">
                                        <p>$78900</p>
                                    </div> --}}
                                    <ul class="list-inline">
                                        <li class="car-km">
                                            <p><i class="fa fa-road"></i> 26000</p>
                                        </li>
                                        <li class="car-oil">
                                            <p><i class="fa fa-car"></i> Diesel</p>
                                        </li>
                                        <li class="car-date">
                                            <p><i class="fa fa-clock-o"></i> 2014</p>
                                        </li>
                                    </ul>
                                </div><!-- end post-media -->

                                <div class="car-title clearfix">
                                    <h4><a
                                            href="{{route('frontend.pages.product', $product->id)}}">{{$product->title}}</a>
                                    </h4>
                                </div><!-- end car-title -->
                            </div><!-- end clearfix -->
                        </div><!-- end col -->
                        @endforeach
                    </div><!-- end row -->

                    <nav class="text-center">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div><!-- end car-list-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="banner clearfix text-center">
                    <a href="#"><img src="uploads/banner_01.png" alt="" class="img-responsive"></a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection
