@extends('layouts.frontend')

@section('styles')
<style>
    span.text-danger {
        color: red !important;
        font-size: 12px !important;
    }

    .check_out_form form input {
        margin-bottom: 5px;
    }

    .cart_table .table-1 tbody tr td.flex_item h6 {
        font-size: 14px;
        padding: 20px 0 0 27px;
    }
</style>
@endsection
@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Checkout</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.pages.index') }}">Home</a></li>
                            <li><a href="{{ route('frontend.cart') }}">Cart</a></li>
                            <li class="active">Checkout</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div><!-- end col -->
        </div>
    </div>
</div>

<div class="section check_out_form">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form action="#" method="post" id="checkout_form"> @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 submit_form">
                            <div class="section-title clearfix">
                                <h5>Shipping Address</h5>
                                <hr class="custom">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
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
                                <span>Country *</span>
                                <input type="text" name="shipping_country"
                                    value="{{isset($user->shipping->country) ? $user->shipping->country: ''}}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Town / City *</span>
                                <input type="text" name="shipping_city"
                                    value="{{isset($user->shipping->city) ? $user->shipping->city: ''}}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Phone *</span>
                                <input type="text" name="shipping_phone"
                                    value="{{isset($user->phone) ? $user->phone: ''}}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Email *</span>
                                <input type="email" name="shipping_email"
                                    value="{{isset($user->email) ? $user->email: ''}}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Order Notes</span>
                                <textarea name="order_notes" rows="5"></textarea>
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 submit_form shipping_address">
                            <div class="section-title clearfix">
                                <h5>Shipping Address</h5>
                                <hr class="custom">
                            </div>
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
                                <textarea name="order_notes"></textarea>
                            </div>
                        </div> --}}

                        <div class="cart_table">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-1">
                                        <thead>
                                            <tr>
                                                <th><span>Product</span></th>
                                                <th><span>Total</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($products as $product)
                                            <tr>
                                                <td class="flex_item clear_fix">
                                                    <img src="{{ imageURL($product->product_image) }}" alt="images"
                                                        class="alignleft img-responsive">
                                                    <h6 class="float_left">
                                                        <a href="{{route('frontend.pages.product', $product->id)}}">
                                                            {{getProductName($product->id)}}</a> <br>
                                                    </h6>
                                                    <h5><b>Quantity:</b> x {{Cart::get($product->id)->quantity}} <br>
                                                        <b>Price:</b> {{$product->price}} $
                                                    </h5>
                                                </td>
                                                <td><span>${{$product->price *
                                                        Cart::get($product->id)->quantity}}</span></td>
                                            </tr>
                                            @endforeach

                                        </tbody> <!-- /tbody -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h3>Checkout & Cart Totals</h3>
                                <div class="table-responsive">
                                    <table class="table table-2">
                                        <tbody>
                                            <tr>
                                                <td><span>Cart Subtotal</span></td>
                                                <td><span>${{ number_format((float)Cart::getSubTotal(), 2, '.',
                                                        '')}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Shipping and Handling</span></td>
                                                <td><span>Free Shipping</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>Order Total</span></td>
                                                <td><span>${{ number_format((float)Cart::getTotal(), 2, '.',
                                                        '')}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="payment_system">
                                    <button class="btn btn-block btn-default" type="submit" id="order_btn">Proceed to
                                        Payment</button>
                                    <div class="pay1 hidden">
                                        <div id="paypal-button-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end section -->
@endsection

@section('scripts')
<script>
    $("#checkout_form").on("submit", function (event) {
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
        beforeSend: function () {
            $("#order_btn").attr("disabled", "disabled");
        },
        success: function (response) {
            if (response.status == 1) {
                Swal.fire(response.title, response.message, response.icon);
                // $("#checkout_form")[0].reset();
                $("input").attr("disabled", "disabled");
                $("textarea").attr("disabled", "disabled");
                $("#order_btn").addClass('hidden');
                $(".pay1").removeClass('hidden');
            }
        },
        error: function (errors) {
            errorsGet(errors.responseJSON.errors)
           $("#order_btn").attr("disabled", false);
            $(".pay1").addClass('hidden');
        }
    });
    });
</script>

<script
    src="https://www.paypal.com/sdk/js?client-id=AZKXMPfJscqaryDzTCEnfpzP7CUT6rXYvS6EdQiX2FkCcSodMhqjYBmgBZvJLbRLonXetJ4BQClbYsJM&enable-funding=venmo&currency=USD"
    data-sdk-integration-source="button-factory"></script>

<script>
    function getPaypal(event) {
            if ($(event).is(':checked')) {
                $('#paypal-button-container').show();
            } else {
                $('#paypal-button-container').hide();
            }
        }

        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{ number_format((float)Cart::getTotal(), 2, '.','')}} // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];

                    var element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    $.ajax({
                        method: "POST",
                        url: '{{route('frontend.customer.order')}}',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            payment_data: orderData,
                        },
                        success: function (response) {
                            notifyBlackToastWithRedirect('Payment Success',response.url)
                        }
                    });

                });
            },

            onError: function (err) {
                // alert('PAYPAL ERROR');
                // For example, redirect to a specific error page
                console.log(err)
                // notifyBlackToast('something went wrong');
            }

        }).render('#paypal-button-container');

</script>

@endsection