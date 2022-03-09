@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Products')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            {{--<a href="{{route('admins.create')}}" class="btn btn-success">
                                Add Admin
                            </a>--}}
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
                        <form action="" id="importForm">
                        <div class="card-header">
                            <h3 class="card-title">
                                Products List (Total Products : <span id="countTotal">0</span>)
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row">
                            @csrf
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="WHEEL">Wheels</option>
                                    <option value="TYRE">Tyre</option>
                                    <option value="ACC">Accessories</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="customFile">File</label>
                                <input type="file" class="form-control custom-image-upload" name="import_file" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-danger float-right import_btn btn-sm">Import</button>
                                <button class="btn btn-outline-danger float-right hidden loading_btn btn-sm" type="button" disabled><span
                                        class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Importing...</button>
                            </div>
                        </form>
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
    <script>
        $("#importForm").on("submit", function(event){
            event.preventDefault();
            $('input.is-invalid').removeClass('is-invalid');
            var formData = new FormData(this);
            $.ajax({
                method: "POST",
                data: formData,
                url: '{{route('import.importProducts')}}',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    $('.import_btn').addClass('hidden');
                    $('.loading_btn').removeClass('hidden');
                },
                success: function (response) {
                    $('.import_btn').removeClass('hidden');
                    $('.loading_btn').addClass('hidden');

                    alert('Success Fully Imported')
                },
                error : function (errors) {
                    console.log(errors.responseJSON.errors);
                    $('.import_btn').removeClass('hidden');
                    $('.loading_btn').addClass('hidden');
                    alert('Error .... please check console log');
                }
            });
        });
    </script>
@endsection
