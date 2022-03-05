@extends('layouts.frontend')

@section('content')

<div class="section page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="title-area pull-left">
                    <h2>Dashboard</h2>
                </div>
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="account_page">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                            @include('frontend.customer.sidebar')
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <div class="section-title clearfix">
                                <h5>Update Profile</h5>
                                <hr class="custom">
                            </div>
                            <form action="#" id="profile_update_form" method="post"> @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Name</label>
                                            <div class="input_group">
                                                <input type="text" name="name" value="{{$user->name}}">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->

                                        <div class="form_group">
                                            <label>Phone Number</label>
                                            <div class="input_group">
                                                <input type="text" name="phone" value="{{$user->phone}}">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_group">
                                            <label>Email Address</label>
                                            <div class="input_group">
                                                <input type="email" name="email" value="{{$user->email}}" disabled>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </div> <!-- End of .input_group -->
                                        </div> <!-- End of .form_group -->
                                    </div>
                                </div> <!-- End of .row -->
                                <button class="btn btn-primary" type="submit" id="update_btn">Update Profile</button>
                                <button class="btn btn-primary hidden" id="loading_btn" type="button" disabled>
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
    $("#profile_update_form").on("submit", function(event){
        event.preventDefault();
        $('span.text-success').remove();
        $('span.text-danger').remove();
        $('input.is-invalid').removeClass('is-invalid');
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            data: formData,
            url: '{{route('frontend.customer.profile')}}',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $("#update_btn").addClass('hidden');
                $("#loading_btn").removeClass('hidden');
            },
            success: function (response) {
                if (response.status == 1) {
                    $("#update_btn").removeClass('hidden');
                    $("#loading_btn").addClass('hidden');
                    Swal.fire( response.title, response.message, response.icon );
                }
            },
            error : function (errors) {
                errorsGet(errors.responseJSON.errors)
                $("#update_btn").removeClass('hidden');
                $("#loading_btn").addClass('hidden');
            }
        });
    });
</script>
@endsection
