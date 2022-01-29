@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Vehicles')}}</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">
                                Vehicles List (Total Vehicles : <span id="countTotal">0</span>)
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="products" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Pro ID</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

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
    <script>
        var table;
        $(document).ready(function () {
            table = $('#products').DataTable({
                processing: true,
                serverSide: true,
                "responsive": true,
                "autoWidth": false,
                "searching": true,
                ajax: {
                    url: "{{ route('vehicle.index') }}",
                },
                order:[[1,"desc"]],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
                    {data: 'pro_id', name: 'pro_id'},
                    {data: 'make_id', name: 'make_id'},
                    {data: 'model', name: 'model'},
                    {data: 'year', name: 'year'},
                    {data: 'action', name: 'action',orderable: false, searchable: false},
                ],
                drawCallback: function (response) {

                    $('#countTotal').empty();
                    $('#countTotal').append(response['json'].recordsTotal);
                }
            });


        });
    </script>
@endsection
