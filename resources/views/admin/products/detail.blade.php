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

                            @if($product->sku_type == 'WHEEL')
                            <tr>
                                <th colspan="2" class="bg-gradient-cyan text-center">Properties</th>
                            </tr>
                            <tr>
                                <th>model</th>
                                <td>{{ $product->model ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>offset</th>
                                <td>{{ $product->offset ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>boltPattern</th>
                                <td>{{ $product->boltPattern ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>finishCode</th>
                                <td>{{ $product->finishCode ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>finish</th>
                                <td>{{ $product->finish ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>width</th>
                                <td>{{ $product->width ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>diameter</th>
                                <td>{{ $product->diameter ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>centerbore</th>
                                <td>{{ $product->centerbore ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>backspacing</th>
                                <td>{{ $product->backspacing ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>wheelWeight</th>
                                <td>{{ $product->wheelWeight ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>capPartNo</th>
                                <td>{{ $product->capPartNo ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>rivetPartNo</th>
                                <td>{{ $product->rivetPartNo ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>tpmsCompatible</th>
                                <td>{{ $product->tpmsCompatible ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>lipDepth</th>
                                <td>{{ $product->lipDepth ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>certification</th>
                                <td>{{ $product->certification ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>structuralWarranty</th>
                                <td>{{ $product->structuralWarranty ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>finishWarranty</th>
                                <td>{{ $product->finishWarranty ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>openEndCap</th>
                                <td>{{ $product->openEndCap ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>capScrewNo</th>
                                <td>{{ $product->capScrewNo ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>otherAccessories</th>
                                <td>{{ $product->otherAccessories ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>additionalAccessories</th>
                                <td>{{ $product->additionalAccessories ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>catalogPage</th>
                                <td>{{ $product->catalogPage ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>loadRating</th>
                                <td>{{ $product->loadRating ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>sizeDesc</th>
                                <td>{{ $product->sizeDesc ?? "N/A" }}</td>
                            </tr>


                            @endif
                            @if($product->sku_type == 'TIRE')
                            <tr>
                                <th>model</th>
                                <td>{{ $product->model ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>width</th>
                                <td>{{ $product->width ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>diameter</th>
                                <td>{{ $product->diameter ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>wheelDiameter</th>
                                <td>{{ $product->wheelDiameter ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>tireSize</th>
                                <td>{{ $product->tireSize ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>terrain</th>
                                <td>{{ $product->terrain ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>utqg</th>
                                <td>{{ $product->utqg ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>mileageWarranty</th>
                                <td>{{ $product->mileageWarranty ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>series</th>
                                <td>{{ $product->series ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>sectionWidth</th>
                                <td>{{ $product->sectionWidth ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>weight</th>
                                <td>{{ $product->weight ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>speedRating</th>
                                <td>{{ $product->speedRating ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>rimDiameter</th>
                                <td>{{ $product->rimDiameter ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>minWidthIn</th>
                                <td>{{ $product->minWidthIn ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>maxWidthIn</th>
                                <td>{{ $product->maxWidthIn ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>loadIndex</th>
                                <td>{{ $product->loadIndex ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>treadDepth</th>
                                <td>{{ $product->treadDepth ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>upc</th>
                                <td>{{ $product->upc ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>load_pounds</th>
                                <td>{{ $product->load_pounds ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>overall_diameter</th>
                                <td>{{ $product->overall_diameter ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>productDesc</th>
                                <td>{{ $product->productDesc ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>sizeDesc</th>
                                <td>{{ $product->sizeDesc ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <th>imageCode</th>
                                <td>{{ $product->imageCode ?? "N/A" }}</td>
                            </tr>


                            @endif

                            <tr class="table-primary">
                                <th colspan="2" class="bg-gradient-cyan text-center"><strong>INVENTORY</strong></th>
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
                                    <img src="{{ '../../../storage/'.$image->resized_image_url}}"
                                        data-src="{{ '../../../storage/'.$image->image_url}}" alt="..."
                                        class="img-thumbnail img-pop">
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
