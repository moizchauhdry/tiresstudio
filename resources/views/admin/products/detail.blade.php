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
                                Products Detail - {{$product->title}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $product->title ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>SKU</th>
                                    <td>{{ $product->sku ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>UPC</th>
                                    <td>{{ $product->upc ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>SKU Type</th>
                                    <td>{{ $product->sku_type ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{ $product->brand->description ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <td>{{ $product->model ?? "N/A" }}</td>
                                </tr>
                                @if($product->sku_type == 'WHEEL')
                                    <tr>
                                        <th>Offset</th>
                                        <td>{{ $product->offset ?? "N/A" }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bolt Pattern</th>
                                        <td>{{ $product->bolt_pattern ?? "N/A" }}</td>
                                    </tr>
                                    <tr>
                                        <th>Finish Code</th>
                                        <td>{{ $product->finish_code ?? "N/A" }}</td>
                                    </tr>
                                    <tr>
                                        <th>Finish</th>
                                        <td>{{ $product->finish ?? "N/A" }}</td>
                                    </tr>
                                    <tr>
                                        <th>Centerbore</th>
                                        <td>{{ $product->centerbore ?? "N/A" }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>Width</th>
                                    <td>{{ $product->width ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Diameter</th>
                                    <td>{{ $product->diameter ?? "N/A" }}</td>
                                </tr>
                                @if($product->sku_type == 'TIRE')
                                    <tr>
                                        <th>Wheel Diameter</th>
                                        <td>{{ $product->wheel_diameter ?? "N/A" }}</td>
                                    </tr>
                                @endif

                                <tr class="table-primary">
                                    <th colspan="2" class="text-center"><strong>INVENTORY</strong></th>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $product->inventory->type ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Local Stock</th>
                                    <td>{{ $product->inventory->local_stock ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Global Stock</th>
                                    <td>{{ $product->inventory->global_stock ?? "N/A" }}</td>
                                </tr>
                            </table>

                            @if ($product->images->count() > 0)
                                <fieldset class="border p-4 mb-4 mt-4">
                                    <legend class="w-auto">Gallery</legend>
                                    <div class="row">
                                        @foreach($product->images as $image)
                                            <div class="col-6 col-md-2">
                                                <img src="{{ asset('storage/app/'.$image->resized_image_url)}}" data-src="{{ asset('storage/app/'.$image->image_url)}}" alt="..." class="img-thumbnail img-pop">
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            @endif
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

    </script>
@endsection
