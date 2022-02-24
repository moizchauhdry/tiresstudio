@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Shop Account</h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li class="active">Shop Account</li>
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
            <div class="col-md-12">
                <div class="account_page">

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 login_form">
                            <div class="section-title clearfix">
                                <h5>Login Now</h5>
                                <hr class="custom">
                            </div><!-- end section-title -->
                            <form action="#">
                                <div class="form_group">
                                    <label>Username or Email</label>
                                    <div class="input_group">
                                        <input type="text" placeholder="iamsteelthemes@gmail.com">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div> <!-- End of .input_group -->
                                </div> <!-- End of .form_group -->

                                <div class="form_group">
                                    <label>Password</label>
                                    <div class="input_group">
                                        <input type="password" placeholder="********">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div> <!-- End of .input_group -->
                                </div> <!-- End of .form_group -->

                                <div class="clear_fix">
                                    <div class="single_checkbox float_left">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">Remember me</label>
                                    </div> <!-- End .single_checkbox -->
                                </div>
                                <button class="btn btn-primary">Login now</button>
                            </form>
                        </div> <!-- End of .login_form -->

                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 register_form m30">
                            <div class="section-title clearfix">
                                <h5>Register Here</h5>
                                <hr class="custom">
                            </div><!-- end section-title -->
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Username</label>
                                            <div class="input_group">
                                                <input type="text">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->

                                        <div class="form_group">
                                            <label>Password</label>
                                            <div class="input_group">
                                                <input type="password">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->

                                        <div class="form_group">
                                            <label>Phone Number</label>
                                            <div class="input_group">
                                                <input type="text">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Email Address</label>
                                            <div class="input_group">
                                                <input type="email">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->

                                        <div class="form_group">
                                            <label>Confirm Password</label>
                                            <div class="input_group">
                                                <input type="password">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->

                                        <div class="form_group">
                                            <label>Location</label>
                                            <div class="input_group">
                                                <input type="text">
                                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->
                                    </div>
                                </div> <!-- End of .row -->

                                <div class="clear_fix">
                                    <div class="single_checkbox float_left">
                                        <input type="checkbox" id="terms">
                                        <label for="terms">I agree the term’s & conditions</label>
                                    </div> <!-- End .single_checkbox -->
                                </div>
                                <button class="btn btn-primary">Create Account</button>
                            </form>
                        </div> <!-- End of .register_form -->
                    </div> <!-- End of .row -->

                </div> <!-- End of .account_page -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

@endsection
