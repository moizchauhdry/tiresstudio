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
                            </div>
                            <form action="#" id="login_form" method="post"> @csrf
                                <div class="form_group">
                                    <label>Email</label>
                                    <div class="input_group">
                                        <input type="text" name="login_email">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>

                                <div class="form_group">
                                    <label>Password</label>
                                    <div class="input_group">
                                        <input type="password" name="login_password">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                </div>

                                <div class="clear_fix">
                                    <div class="single_checkbox float_left">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">Remember me</label>
                                    </div> <!-- End .single_checkbox -->
                                </div>
                                <button type="submit" class="btn btn-primary" id="login_btn">Login now</button>
                                <button class="btn btn-primary hidden" id="login_loading_btn" type="button" disabled>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </form>
                        </div> <!-- End of .login_form -->

                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 register_form m30">
                            <div class="section-title clearfix">
                                <h5>Register Here</h5>
                                <hr class="custom">
                            </div>
                            <form action="#" id="register_form" method="post"> @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Name</label>
                                            <div class="input_group">
                                                <input type="text" name="name">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="form_group">
                                            <label>Password</label>
                                            <div class="input_group">
                                                <input type="password" name="password">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="form_group">
                                            <label>Phone Number</label>
                                            <div class="input_group">
                                                <input type="text" name="phone">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Email Address</label>
                                            <div class="input_group">
                                                <input type="email" name="email">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="form_group">
                                            <label>Confirm Password</label>
                                            <div class="input_group">
                                                <input type="password" name="password_confirmation">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        {{-- <div class="form_group">
                                            <label>Location</label>
                                            <div class="input_group">
                                                <input type="text" name="location">
                                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="clear_fix">
                                    <div class="single_checkbox float_left">
                                        <input type="checkbox" name="terms" id="terms">
                                        <label for="terms">I agree the term’s & conditions</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" id="register_btn">Create Account</button>
                                <button class="btn btn-primary hidden" id="register_loading_btn" type="button" disabled>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $("#register_form").on("submit", function(event){
        event.preventDefault();
        $('span.text-success').remove();
        $('span.text-danger').remove();
        $('input.is-invalid').removeClass('is-invalid');
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            data: formData,
            url: '{{route('frontend.pages.register')}}',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $("#register_btn").addClass('hidden');
                $("#register_loading_btn").removeClass('hidden');
            },
            success: function (response) {
                if (response.status == 1) {
                   Swal.fire( response.title, response.message, response.icon );
                    $("#register_form")[0].reset();
                    $("#register_btn").removeClass('hidden');
                    $("#register_loading_btn").addClass('hidden');
                }
            },
            error : function (errors) {
                errorsGet(errors.responseJSON.errors)
                $("#register_btn").removeClass('hidden');
                $("#register_loading_btn").addClass('hidden');
            }
        });
    });

    $("#login_form").on("submit", function(event){
        event.preventDefault();
        $('span.text-success').remove();
        $('span.text-danger').remove();
        $('input.is-invalid').removeClass('is-invalid');
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            data: formData,
            url: '{{route('frontend.pages.login')}}',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $("#login_btn").addClass('hidden');
                $("#login_loading_btn").removeClass('hidden');
            },
            success: function (response) {
                if (response.status == 1) {
                    // Swal.fire( response.title, response.message, response.icon );
                    // $("#login_form")[0].reset();
                    $("#login_btn").removeClass('hidden');
                    $("#login_loading_btn").addClass('hidden');
                    window.location.href = response.redirect_url;
                }
            },
            error : function (errors) {
                errorsGet(errors.responseJSON.errors)
                $("#login_btn").removeClass('hidden');
                $("#login_loading_btn").addClass('hidden');
            }
        });
    });
</script>
@endsection