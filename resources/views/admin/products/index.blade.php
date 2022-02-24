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
                        <div class="card-header">
                            <h3 class="card-title">
                                Products List (Total Products : <span id="countTotal">0</span>)
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="sku_type">Type</label>
                                    <select class="form-control" name="sku_type" id="sku_type">
                                        <option value="">Choose ..</option>
                                        <option value="WHEEL">Wheel</option>
                                        <option value="TIRE">Tire</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="sku_type">Brands</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="">Choose ..</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <table id="products" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>SKU</th>
                                    <th>UPC</th>
                                    <th>SKU Type</th>
                                    <th>Title</th>
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
                    url: "{{ route('products.index') }}",
                    data: function (d) {
                        d.sku_type = $('#sku_type').val(),
                        d.brand_id = $('#brand_id').val(),
                        d.search = $('input[type="search"]').val()
                    }
                },
                order:[[1,"desc"]],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
                    {data: 'sku', name: 'sku'},
                    {data: 'upc', name: 'upc'},
                    {data: 'sku_type', name: 'sku_type'},
                    {data: 'title', name: 'title'},
                    {data: 'action', name: 'action',orderable: false, searchable: false},
                ],
                drawCallback: function (response) {

                    $('#countTotal').empty();
                    $('#countTotal').append(response['json'].recordsTotal);
                }
            });

            $('#sku_type,#brand_id').change(function(){
                table.draw();
            });


        });
    </script>
@endsection
