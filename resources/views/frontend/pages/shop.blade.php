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
        <div id="app">
            <advanced-search></advanced-search>
        </div>
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
