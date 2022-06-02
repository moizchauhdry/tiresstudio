@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Tiresstudio Gallery</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Gallery</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end col -->
        </div><!-- end page-title -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="section">
    <div class="container">
        <div class="row blog-list">
            @foreach ($gallery as $image)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-wrapper">
                    <div class="post-media entry">
                        <img src="{{asset('storage/'.$image->image_url)}}" alt="" class="img-responsive">
                        <div class="magnifier colorized">
                            <a href="#"><i class="flaticon-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <hr class="invis2">

        <nav class="text-center">
            <ul class="pagination">
                {{$gallery->links()}}
            </ul>
        </nav>
    </div><!-- end container -->
</div><!-- end section -->
@endsection
