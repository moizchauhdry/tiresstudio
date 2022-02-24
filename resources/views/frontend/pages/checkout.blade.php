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
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 submit_form">
                            <div class="section-title clearfix">
                                <h5>Billing Address</h5>
                                <hr class="custom">
                            </div><!-- end section-title -->
                            <form action="#" class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Country *</span>
                                    <input type="text">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <span>First Name *</span>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <span>Last Name *</span>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Address</span>
                                    <input type="text" placeholder="">
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Town / City *</span>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Contact Info *</span>
                                    <input type="email" placeholder="Email Address">
                                    <input type="text" placeholder="Phone Number">
                                </div>
                            </form>
                        </div> <!-- /submit_form -->

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 submit_form shipping_address">
                            <div class="section-title clearfix">
                                <h5>Shipping Address</h5>
                                <hr class="custom">
                            </div><!-- end section-title -->
                            <form action="#" class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Country *</span>
                                    <input type="text">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <span>First Name *</span>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <span>Last Name *</span>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Address</span>
                                    <input type="text" placeholder="">
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Town / City *</span>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>Other Notes</span>
                                    <textarea></textarea>
                                </div>
                            </form>
                        </div> <!-- /submit_form -->
                    </div> <!-- /row -->
                </div> <!-- /check_out_form -->

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
                                <a href="#" class="btn btn-primary">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- /cart_table -->
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end section -->
@endsection
