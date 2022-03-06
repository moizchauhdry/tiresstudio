@extends('layouts.frontend')

@section('styles')
    <style>
        .car-title h4{
            height: 50px;
        }
    </style>
@endsection

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
                    <div class="overlay-products" style="display: none">
                        <div class="loader">
                            <div class="overlay-content">
                                <div class="spinner"></div>
                            </div>
                        </div>
                    </div>
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

                    <div id="viewProducts">
                        @include('frontend.includes.products')
                    </div>

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

@section('scripts')
    <script>
        $('#brands,#finishes,#boltPatterns,#diameter,#offset,#sizeDesc').selectpicker();

        function getResults(url){
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: $('#search').val(),
                    year : $('#year').val(),
                    make : $('#make').val(),
                    model : $('#model').val(),
                    brand_id : $('#brands').selectpicker('val'),
                    finish : $('#finishes').selectpicker('val'),
                    diameter : $('#diameter').selectpicker('val'),
                    offset : $('#offset').selectpicker('val'),
                    sizeDesc : $('#sizeDesc').selectpicker('val'),
                    boltPattern : $('#boltPatterns').selectpicker('val'),
                },
                beforeSend:function(){
                  $('.overlay-products').show();
                },
                success: function (response) {
                    $('#viewProducts').html(response.view);
                    $('.overlay-products').hide();
                }
            });
        }



        function resetAll(){
            $('#brands').selectpicker('val','');
            $('#finishes').selectpicker('val','');
            $('#diameter').selectpicker('val','');
            $('#offset').selectpicker('val','');
            $('#sizeDesc').selectpicker('val','');
            $('#boltPatterns').selectpicker('val','');
            getResults('{{route('frontend.pages.wheels')}}');
        }

        function removeFromFilter(event){
            let target = event.dataset.target;
            if(target == '#year' || target == '#search' || target == '#model'  || target == '#make'){
                $(target).val('');
                getResults('{{route('frontend.pages.wheels')}}');
            }else{
                $(target).selectpicker('val','');
                $(target).selectpicker('refresh');
                getResults('{{route('frontend.pages.wheels')}}');
            }


        }
    </script>
@endsection
