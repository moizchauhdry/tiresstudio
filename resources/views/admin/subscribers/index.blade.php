@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('Subscribers List')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#subscriberModal">
                            <i class="fas fa-envelope mr-1"></i> Send Updates To Subsribers</button>

                        <div class="modal fade" id="subscriberModal" tabindex="-1"
                            aria-labelledby="subscriberModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="#" method="POST" id="subscriber_form"> @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="subscriberModalLabel">Send Updates To Subsribers
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <textarea name="message" id="message" cols="30" rows="10"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Subscribers List (Total Subscribers : {{$subscribers->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $sub)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$sub->email}}</td>
                                    <td>
                                        <span class="badge badge-{{$sub->status == 1 ? 'success' : 'danger'}}">
                                            {{$sub->status == 1 ? 'Active' : 'Inactive'}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('scripts')
<script src="{{asset('js/errors.js')}}"></script>
<script>
    $(function () {
        $("#table").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    jQuery(document).ready(function () {
        App.init();
    });

    $("#subscriber_form").on("submit", function(event){
        event.preventDefault();
        $('span.text-success').remove();
        $('span.text-danger').remove();
        $('input.is-invalid').removeClass('is-invalid');
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            data: formData,
            url: '{{route('subscribers.update')}}',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $("button[type=submit]").attr("disabled", true);
            },
            success: function (response) {
                if (response.status == 1) {
                    Swal.fire( response.title, response.message, response.icon );
                    $("#subscriber_form")[0].reset();
                    $("button[type=submit]").attr("disabled", false);
                    $('#subscriberModal').modal('toggle');
                }
            },
            error : function (errors) {
                errorsGet(errors.responseJSON.errors)
                $("button[type=submit]").attr("disabled", false);
            }
        });
    });
</script>
@endsection
