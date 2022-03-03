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
                            <form action="#">
                                <div class="form_group">
                                    <label>Username or Email</label>
                                    <div class="input_group">
                                        <input type="text" placeholder="iamsteelthemes@gmail.com">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>

                                <div class="form_group">
                                    <label>Password</label>
                                    <div class="input_group">
                                        <input type="password" placeholder="********">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                </div>

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
                            </div>
                            <form action="#" id="register" method="post"> @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Username</label>
                                            <div class="input_group">
                                                <input type="text" name="username">
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
                                                <input type="password" name="confirm_password">
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
                                        <input type="checkbox" id="terms">
                                        <label for="terms">I agree the term’s & conditions</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Create Account</button>
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
    $("#register").on("submit", function(event){
        event.preventDefault();
        $('span.text-success').remove();
        $('span.invalid-feedback').remove();
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
                $(".register_btn").addClass('hidden');
                $(".loading_btn").removeClass('hidden');
                $(".errors").addClass('hidden');
            },
            success: function (response) {
                if (response.status == 1) {
                    alert('success');
                }
            },
            error : function (errors) {
                errorsGet(errors.responseJSON.errors)
                $(".register_btn").removeClass('hidden');
                $(".loading_btn").addClass('hidden');
            }
        });
    });
</script>
@endsection
