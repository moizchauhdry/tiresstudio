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
                                Products List (Total Products : {{$products->count()}})
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                <tbody>
                                @php $count=1; @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$product->sku}}</td>
                                        <td>{{$product->upc}}</td>
                                        <td>{{$product->sku_type}}</td>
                                        <td>{{$product->title}}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)">
                                                <i class="far fa-edit" aria-hidden="true"></i>
                                            </a>
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
    <script>
        $(function () {
            $("#products").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
