@extends('layouts.frontend')

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
                                        <th><span>Product</span></th>
                                        <th><span>Quantity</span></th>
                                        {{--<th><span>Avalability</span></th>--}}
                                        <th><span>Price</span></th>
                                        <th><span>Total</span></th>
                                        <th><span>Remove</span></th>
                                    </tr>

                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="flex_item clear_fix">
                                            <img src="{{ imageURL($product->product_image) }}" alt="images"
                                                class="alignleft img-responsive">
                                            <h6 class="float_left">{{getProductName($product->id)}}</h6>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity" min="0" disabled
                                                value="{{Cart::get($product->id)->quantity}}">
                                        </td>
                                        {{--<td>
                                            <div class="icon_holder border_round">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <span class="item">Item(s) <br>Avilable Now</span>
                                        </td>--}}
                                        <td><span class="item">${{$product->price}}</span></td>
                                        <td>
                                            <span class="">
                                                ${{$product->price * Cart::get($product->id)->quantity}}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="javascript:void(0)"
                                                onclick="removeItemFromCart('{{$product->id}}')">Remove</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                            <!-- /table-responsive -->
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Enter Coupon Code..." class="coupon">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cart_update m30" style="text-align:right;">
                            <button class="btn btn-primary">Update Cart</button>
                            <button class="btn btn-primary">Proceed to Checkout</button>
                        </div> --}}
                    </div>
                    <!-- /row -->

                    <div class="row shipping_address">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 submit_form wow fadeInUp">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 wow fadeInUp m30">
                            <h4>Cart Totals</h4>
                            <div class="table-responsive">
                                <table class="table table-2">
                                    <tbody>
                                        <tr>
                                            <td><span>Cart Subtotal</span></td>
                                            <td><span>${{ number_format((float)Cart::getSubTotal(), 2, '.', '')}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Shipping and Handling</span></td>
                                            <td><span>Free Shipping</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Order Total</span></td>
                                            <td><span>${{ number_format((float)Cart::getTotal(), 2, '.', '')}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /table-responsive -->
                            <a href="{{route('frontend.pages.checkout')}}" class="btn btn-default">Proceed to
                                Checkout</a>
                        </div>
                    </div>
                </div><!-- /cart_table -->
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
