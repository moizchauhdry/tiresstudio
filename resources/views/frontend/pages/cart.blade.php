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
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
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
            <div class="col-md-12 col-sm-12">
                <div class="shop_cart_table">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-1">
                                    <tr>
                                        <th><span>Product</span></th>
                                        <th><span>Quantity</span></th>
                                        <th><span>Avalability</span></th>
                                        <th><span>Price</span></th>
                                        <th><span>Total</span></th>
                                        <th><span>Remove</span></th>
                                    </tr>

                                    <tr>
                                        <td class="flex_item clear_fix">
                                            <img src="{{asset('frontend/uploads/shop_01.jpg')}}" alt="images"
                                                class="alignleft img-responsive">
                                            <h6 class="float_left">Start From The Art</h6>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity" min="0" value="1">
                                        </td>
                                        <td>
                                            <div class="icon_holder border_round">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <span class="item">Item(s) <br>Avilable Now</span>
                                        </td>
                                        <td><span>$ 25.99</span></td>
                                        <td><span class="">$ 25.99</span></td>
                                        <td>
                                            <input type="checkbox" style="vertical-align:-2px;"> <span
                                                style="padding-left:7px;">Remove</span>
                                        </td>
                                    </tr>
                                    <!-- /tr -->

                                    <tr>
                                        <td class="flex_item clear_fix">
                                            <img src="{{asset('frontend/uploads/shop_02.jpg')}}" alt="images"
                                                class="alignleft img-responsive">
                                            <h6 class="float_left">Lords Of Strategy</h6>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity" min="0" value="2">
                                        </td>
                                        <td>
                                            <div class="icon_holder border_round">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <span class="item">Item(s) <br>Avilable Now</span>
                                        </td>
                                        <td><span>$ 34.99</span></td>
                                        <td><span class="">$ 69.98</span></td>
                                        <td>
                                            <input type="checkbox" style="vertical-align:-2px;"> <span
                                                style="padding-left:7px;">Remove</span>
                                        </td>
                                    </tr>
                                    <!-- /tr -->

                                    <tr>
                                        <td class="flex_item clear_fix">
                                            <img src="{{asset('frontend/uploads/shop_03.jpg')}}" alt="images"
                                                class="alignleft img-responsive">
                                            <h6 class="float_left">Start From The Art</h6>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity" min="0" value="1">
                                        </td>
                                        <td>
                                            <div class="icon_holder border_round">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <span class="item">Item(s) <br>Avilable Now</span>
                                        </td>
                                        <td><span>$ 29.00</span></td>
                                        <td><span class="">$ 29.00</span></td>
                                        <td>
                                            <input type="checkbox" style="vertical-align:-2px;"> <span
                                                style="padding-left:7px;">Remove</span>
                                        </td>
                                    </tr>
                                    <!-- /tr -->

                                </table>
                            </div>
                            <!-- /table-responsive -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Enter Coupon Code..." class="coupon">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cart_update m30" style="text-align:right;">
                            <button class="btn btn-primary">Update Cart</button>
                            <button class="btn btn-primary">Proceed to Checkout</button>
                        </div>
                    </div>
                    <!-- /row -->

                    <div class="row shipping_address">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 submit_form wow fadeInUp">
                            <h4>Calculate Shipping</h4>
                            <div class="row" style="margin-top:33px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <select name="orderby" class="selectpicker">
                                        <option>United States</option>
                                        <option>Select Dropdown 01</option>
                                        <option>Select Dropdown 02</option>
                                        <option>Select Dropdown 03</option>
                                        <option>Select Dropdown 04</option>
                                        <option>Select Dropdown 05</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 space-fix-right">
                                    <input type="text" placeholder="State / Country" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 space-fix-left">
                                    <input type="text" placeholder="Zip Code" required>
                                </div>
                            </div>
                            <button class="btn btn-primary">update Totals</button>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 wow fadeInUp m30">
                            <h4>Cart Totals</h4>
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
                            </div>
                            <!-- /table-responsive -->
                            <button class="btn btn-primary">Proceed to Checkout</button>
                        </div>
                    </div>
                </div><!-- /cart_table -->
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end section -->
@endsection
