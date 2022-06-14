@extends('layouts.frontend')

@section('styles')
<style>
    .cart .shipping_address {
        padding-top: 14px;
        padding-right: 10px;
        float: right;
    }

    .cart .shop_cart_table .table-1 tr td.flex_item {
        padding: 0px 0 0px 16px;
    }

    .cart .shop_cart_table .table-1 tr td.flex_item h6 {
        font-size: 16px;
        margin: 15px 0 0 21px;
    }

    .cart .shop_cart_table .table-1 tr td {
        padding-top: 89px;
    }
</style>
@endsection

@section('content')
<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Shop Cart</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.pages.index') }}">Home</a></li>
                            <li class="active">Shop Cart</li>
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
            @if (count($products) > 0)
            <div class="col-md-12 col-sm-12">
                <div class="shop_cart_table">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-1">
                                    <tr>
                                        <th colspan="2">
                                            <span>Tiresstudio.com Shopping Cart</span>
                                        </th>
                                    </tr>

                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="flex_item clear_fix">
                                            <img src="{{ imageURL($product->product_image) }}" alt="images"
                                                class="alignleft img-responsive">
                                            <h6 class="float_left">
                                                <a href="{{route('frontend.pages.product', $product->id)}}">
                                                    {{getProductName($product->id)}} <br> {{$product->title}}</a> <br>
                                            </h6>
                                            <h5><b>Quantity:</b> x {{Cart::get($product->id)->quantity}} <br>
                                                <b>Price:</b> {{$product->price}} $
                                            </h5>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="javascript:void(0)"
                                                onclick="removeItemFromCart('{{$product->id}}')">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row shipping_address">
                        <a href="{{route('frontend.pages.checkout')}}" class="btn btn-default">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="text-center">
                <img src="{{asset('frontend/images/logo.png')}}" style="width:300px;margin:25px" alt="">
                <h4>There are no items in the cart.</h4>
                <a href="{{route('frontend.pages.wheels')}}" class="btn btn-default">SHOP NOW</a>
            </div>
        </div>
        @endif

    </div>
</div><!-- end container -->
</div><!-- end section -->
@endsection

@section('scripts')
<script>
    function removeItemFromCart(product_id) {
        confirmDialog
            .fire({
                title: "Are you sure ?",
                text: "You want to remove item from cart",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, remove item!",
            })
            .then((result) => {
                if (result.value == true) {
                    $.ajax({
                        method: "POST",
                        url: '{{route('frontend.cart.destroy')}}',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            'product_id': product_id,
                        },
                        success: function (response) {
                            location.reload();
                        }
                    });
                }
            });

    }
</script>
@endsection
