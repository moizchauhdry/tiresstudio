@extends('layouts.frontend')

@section('content')
<!-- ******************************************
        PAGE TITLE
        ********************************************** -->

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Shop Checkout</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li class="active">Shop Checkout</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end col -->
        </div><!-- end page-title -->
    </div><!-- end container -->
</div><!-- end section -->

<!-- ******************************************
        PAGE WRAPPER
        ********************************************** -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="check_out_form">
                    <form action="#" method="post" id="checkout_form"> @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 submit_form">
                                <div class="section-title clearfix">
                                    <h5>Billing Address</h5>
                                    <hr class="custom">
                                </div>
                                {{-- <form action="#" class="row"> --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Country *</span>
                                        <input type="text" name="billing_country"
                                            value="{{isset($user->billing->country) ? $user->billing->country: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                        <span>Name *</span>
                                        <input type="text" name="billing_name"
                                            value="{{isset($user->name) ? $user->name: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Address</span>
                                        <input type="text" name="billing_address_1"
                                            value="{{isset($user->billing->address_1) ? $user->billing->address_1: ''}}">
                                        <input type="text" name="billing_address_2"
                                            value="{{isset($user->billing->address_2) ? $user->billing->address_2: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Town / City *</span>
                                        <input type="text" name="billing_city"
                                            value="{{isset($user->billing->city) ? $user->billing->city: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Contact Info *</span>
                                        <input type="email" name="billing_email"
                                            value="{{isset($user->email) ? $user->email: ''}}">
                                        <input type="text" name="billing_phone"
                                            value="{{isset($user->phone) ? $user->phone: ''}}">
                                    </div>
                                    {{--
                                </form> --}}
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 submit_form shipping_address">
                                <div class="section-title clearfix">
                                    <h5>Shipping Address</h5>
                                    <hr class="custom">
                                </div>
                                {{-- <form action="#" class="row"> --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Country *</span>
                                        <input type="text" name="shipping_country"
                                            value="{{isset($user->shipping->country) ? $user->shipping->country: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <span>Name *</span>
                                        <input type="text" name="shipping_name"
                                            value="{{isset($user->name) ? $user->name: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Address</span>
                                        <input type="text" name="shipping_address_1"
                                            value="{{isset($user->shipping->address_1) ? $user->shipping->address_1: ''}}">
                                        <input type="text" name="shipping_address_2"
                                            value="{{isset($user->shipping->address_2) ? $user->shipping->address_2: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Town / City *</span>
                                        <input type="text" name="shipping_city"
                                            value="{{isset($user->shipping->city) ? $user->shipping->city: ''}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span>Other Notes</span>
                                        <textarea name="notes"></textarea>
                                    </div>
                                    {{--
                                </form> --}}
                            </div>
                        </div>
                        <button type="submit">place order</button>
                    </form>
                </div>

                <div class="cart_table">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-1">
                                    <thead>
                                        <tr>
                                            <th><span>Product</span></th>
                                            <th style="padding-left:0"><span>Quantity</span></th>
                                            <th><span style="margin-left: 9px;">Total</span></th>
                                        </tr>
                                    </thead> <!-- /thead -->
                                    <tbody>

                                        <tr>
                                            <td class="flex_item clear_fix">
                                                <img src="{{asset('frontend/uploads/shop_01.jpg')}}" alt="images"
                                                    class="alignleft img-responsive">
                                                <h6 class="float_left">Start From The Art</h6>
                                            </td>
                                            <td><input type="number" name="quantity" min="0" value="1"></td>
                                            <td><span>$25.00</span></td>
                                        </tr> <!-- /tr -->

                                        <tr>
                                            <td class="flex_item clear_fix">
                                                <img src="{{asset('frontend/uploads/shop_02.jpg')}}" alt="images"
                                                    class="alignleft img-responsive">
                                                <h6 class="float_left">Lords Of Strategy</h6>
                                            </td>
                                            <td><input type="number" name="quantity" min="0" value="3"></td>
                                            <td><span>$69.00</span></td>
                                        </tr> <!-- /tr -->

                                        <tr>
                                            <td class="flex_item clear_fix">
                                                <img src="{{asset('frontend/uploads/shop_03.jpg')}}" alt="images"
                                                    class="alignleft img-responsive">
                                                <h6 class="float_left">Start From The Art</h6>
                                            </td>
                                            <td><input type="number" name="quantity" min="0" value="2"></td>
                                            <td><span>$29.00</span></td>
                                        </tr> <!-- /tr -->

                                    </tbody> <!-- /tbody -->
                                </table>
                            </div> <!-- /table-responsive -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table table-2">
                                    <tbody>
                                        <tr>
                                            <td><span>Cart Subtotal</span></td>
                                            <td><span>$146.00</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Shipping and Handling</span></td>
                                            <td><span>Free Shipping</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Order Total</span></td>
                                            <td><span>$146.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- /table-responsive -->
                            <div class="payment_system">
                                <div class="pay1">
                                    <input type="checkbox">
                                    <span>Direct Bank Transfer</span>
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference.order won’t be shipped until the funds have cleared.</p>
                                </div>
                                <div class="pay1">
                                    <input type="checkbox">
                                    <span>Cheque Payment</span>
                                </div>
                                <div class="pay1">
                                    <input type="checkbox">
                                    <span>Credit Card</span>
                                    <img src="{{asset('frontend/images/1.jpg')}}" alt="image" class="hidden-xs">
                                </div>
                                <div class="pay1">
                                    <input type="checkbox">
                                    <span>Paypal</span>
                                    <img src="{{asset('frontend/images/2.jpg')}}" alt="image" class="hidden-xs">
                                </div>
                                <a href="#" class="btn btn-primary" onclick="placeOrder()">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end section -->
@endsection

@section('scripts')
<script>
    $("#checkout_form").on("submit", function(event){
        event.preventDefault();
        $('span.text-success').remove();
        $('span.text-danger').remove();
        $('input.is-invalid').removeClass('is-invalid');
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            data: formData,
            url: '{{route('frontend.customer.order')}}',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $("#order_btn").addClass('hidden');
                $("#loading_btn").removeClass('hidden');
            },
            success: function (response) {
                if (response.status == 1) {
                    Swal.fire( response.title, response.message, response.icon );
                    $("#checkout_form")[0].reset();
                    $("#order_btn").removeClass('hidden');
                    $("#loading_btn").addClass('hidden');
                }
            },
            error : function (errors) {
                errorsGet(errors.responseJSON.errors)
                $("#order_btn").removeClass('hidden');
                $("#loading_btn").addClass('hidden');
            }
        });
    });
</script>
@endsection
