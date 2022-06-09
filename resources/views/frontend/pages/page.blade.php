@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>{{$page->title}}</h2>
                </div>
                <div class="pull-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.pages.index')}}">Home</a></li>
                            <li class="active">{{$page->title}}</li>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="welcome-widget clearfix">
                    <div class="section-title clearfix">
                        <h4>{{$page->title}}</h4>
                        <hr class="custom">
                    </div>
                    <div style="color: black !important">
                        {!!$page->description!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
