@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Dashboard</h2>
                </div>
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="account_page">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                            @include('frontend.customer.sidebar')
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <div class="section-title clearfix">
                                <h5>Dashboard</h5>
                                <hr class="custom">
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="blog-wrapper">
                                    <div class="post-media entry text-center">
                                        <h4 class="text-primary">Total Orders</h1>
                                            <h1 class="text-dark">
                                                {{Auth::guard('customer')->user()->orders->count() ?? 0}}
                                            </h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="blog-wrapper">
                                    <div class="post-media entry text-center">
                                        <h4 class="text-primary">Pending Orders</h1>
                                            <h1 class="text-dark">
                                                {{Auth::guard('customer')->user()->orders
                                                ->where('order_status', 0)->count() ?? 0}}
                                            </h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="blog-wrapper">
                                    <div class="post-media entry text-center">
                                        <h4 class="text-primary">Completed Orders</h1>
                                            <h1 class="text-dark">
                                                {{Auth::guard('customer')->user()->orders
                                                ->where('order_status', 3)->count() ?? 0}}
                                            </h1>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
