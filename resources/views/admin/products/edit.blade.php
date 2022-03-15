@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="btn btn-dark">Back</a>
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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="sku_type">SKU Type</label>
                                        <select name="sku_type" id="sku_type" class="form-control @error('sku_type') is-invalid @enderror" >
                                            <option value="">Select SKU Type</option>
                                            <option {{ $product->sku_type == 'WHEEL' ? 'selected' : '' }} value="WHEEL">Wheel</option>
                                            <option {{ $product->sku_type == 'TIRE' ? 'selected' : '' }} value="TIRE">Tire</option>
                                            <option {{ $product->sku_type == 'ACC' ? 'selected' : '' }} value="ACC">Accessories</option>
                                        </select>
                                        @error('sku_type')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6 wheels tires accessories hidden">
                                        <label for="sku">SKU</label>
                                        <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ $product->sku }}" placeholder="Enter SKU">
                                        @error('sku')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels tires accessories hidden">
                                        <label for="upc">UPC</label>
                                        <input type="text" name="upc" id="upc" class="form-control @error('upc') is-invalid @enderror" value="{{ $product->upc }}" placeholder="Enter UPC">
                                        @error('upc')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6 wheels tires accessories hidden">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title }}" placeholder="Enter Title">
                                        @error('title')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels tires accessories hidden">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option {{ $product->brand_id == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->description }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels tires  hidden">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{ $product->model }}" placeholder="Enter Model">
                                        @error('model')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels  hidden">
                                        <label for="offset">offset</label>
                                        <input type="text" name="offset" id="offset" class="form-control @error('offset') is-invalid @enderror" value="{{ $product->offset }}" placeholder="Enter offset">
                                        @error('offset')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels  hidden">
                                        <label for="boltPattern">boltPattern</label>
                                        <input type="text" name="boltPattern" id="boltPattern" class="form-control @error('boltPattern') is-invalid @enderror" value="{{ $product->boltPattern }}" placeholder="Enter boltPattern">
                                        @error('boltPattern')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels  hidden">
                                        <label for="finishCode">finishCode</label>
                                        <input type="text" name="finishCode" id="finishCode" class="form-control @error('finishCode') is-invalid @enderror" value="{{ $product->finishCode }}" placeholder="Enter finishCode">
                                        @error('finishCode')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="finish">finish</label>
                                        <input type="text" name="finish" id="finish" class="form-control @error('finish') is-invalid @enderror" value="{{ $product->finish }}" placeholder="Enter finish">
                                        @error('finish')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels tires hidden">
                                        <label for="width">width</label>
                                        <input type="text" name="width" id="width" class="form-control @error('width') is-invalid @enderror" value="{{ $product->width }}" placeholder="Enter width">
                                        @error('width')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels tires hidden">
                                        <label for="diameter">diameter</label>
                                        <input type="text" name="diameter" id="diameter" class="form-control @error('diameter') is-invalid @enderror" value="{{ $product->diameter }}" placeholder="Enter diameter">
                                        @error('diameter')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="centerbore">centerbore</label>
                                        <input type="text" name="centerbore" id="centerbore" class="form-control @error('centerbore') is-invalid @enderror" value="{{ $product->centerbore }}" placeholder="Enter centerbore">
                                        @error('centerbore')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="wheelDiameter">wheelDiameter</label>
                                        <input type="text" name="wheelDiameter" id="wheelDiameter" class="form-control @error('wheelDiameter') is-invalid @enderror" value="{{ $product->wheelDiameter }}" placeholder="Enter wheelDiameter">
                                        @error('wheelDiameter')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="tireSize">tireSize</label>
                                        <input type="text" name="tireSize" id="tireSize" class="form-control @error('tireSize') is-invalid @enderror" value="{{ $product->tireSize }}" placeholder="Enter tireSize">
                                        @error('tireSize')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="terrain">terrain</label>
                                        <input type="text" name="terrain" id="terrain" class="form-control @error('terrain') is-invalid @enderror" value="{{ $product->terrain }}" placeholder="Enter terrain">
                                        @error('terrain')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="utqg">utqg</label>
                                        <input type="text" name="utqg" id="utqg" class="form-control @error('utqg') is-invalid @enderror" value="{{ $product->utqg }}" placeholder="Enter utqg">
                                        @error('utqg')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="mileageWarranty">mileageWarranty</label>
                                        <input type="text" name="mileageWarranty" id="mileageWarranty" class="form-control @error('mileageWarranty') is-invalid @enderror" value="{{ $product->mileageWarranty }}" placeholder="Enter mileageWarranty">
                                        @error('mileageWarranty')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="series">series</label>
                                        <input type="text" name="series" id="series" class="form-control @error('series') is-invalid @enderror" value="{{ $product->series }}" placeholder="Enter series">
                                        @error('series')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="sectionWidth">sectionWidth</label>
                                        <input type="text" name="sectionWidth" id="sectionWidth" class="form-control @error('sectionWidth') is-invalid @enderror" value="{{ $product->sectionWidth }}" placeholder="Enter sectionWidth">
                                        @error('sectionWidth')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="weight">weight</label>
                                        <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ $product->weight }}" placeholder="Enter weight">
                                        @error('weight')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="speedRating">speedRating</label>
                                        <input type="text" name="speedRating" id="speedRating" class="form-control @error('speedRating') is-invalid @enderror" value="{{ $product->speedRating }}" placeholder="Enter speedRating">
                                        @error('speedRating')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="rimDiameter">rimDiameter</label>
                                        <input type="text" name="rimDiameter" id="rimDiameter" class="form-control @error('rimDiameter') is-invalid @enderror" value="{{ $product->rimDiameter }}" placeholder="Enter rimDiameter">
                                        @error('rimDiameter')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="minWidthIn">minWidthIn</label>
                                        <input type="text" name="minWidthIn" id="minWidthIn" class="form-control @error('minWidthIn') is-invalid @enderror" value="{{ $product->minWidthIn }}" placeholder="Enter minWidthIn">
                                        @error('minWidthIn')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="maxWidthIn">maxWidthIn</label>
                                        <input type="text" name="maxWidthIn" id="maxWidthIn" class="form-control @error('maxWidthIn') is-invalid @enderror" value="{{ $product->maxWidthIn }}" placeholder="Enter maxWidthIn">
                                        @error('maxWidthIn')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="loadIndex">loadIndex</label>
                                        <input type="text" name="loadIndex" id="loadIndex" class="form-control @error('loadIndex') is-invalid @enderror" value="{{ $product->loadIndex }}" placeholder="Enter loadIndex">
                                        @error('loadIndex')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="treadDepth">treadDepth</label>
                                        <input type="text" name="treadDepth" id="treadDepth" class="form-control @error('treadDepth') is-invalid @enderror" value="{{ $product->treadDepth }}" placeholder="Enter treadDepth">
                                        @error('treadDepth')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="load_pounds">load_pounds</label>
                                        <input type="text" name="load_pounds" id="load_pounds" class="form-control @error('load_pounds') is-invalid @enderror" value="{{ $product->load_pounds }}" placeholder="Enter load_pounds">
                                        @error('load_pounds')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="overall_diameter">overall_diameter</label>
                                        <input type="text" name="overall_diameter" id="overall_diameter" class="form-control @error('overall_diameter') is-invalid @enderror" value="{{ $product->overall_diameter }}" placeholder="Enter overall_diameter">
                                        @error('overall_diameter')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="productDesc">productDesc</label>
                                        <input type="text" name="productDesc" id="productDesc" class="form-control @error('productDesc') is-invalid @enderror" value="{{ $product->productDesc }}" placeholder="Enter productDesc">
                                        @error('productDesc')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 tires hidden">
                                        <label for="imageCode">imageCode</label>
                                        <input type="text" name="imageCode" id="imageCode" class="form-control @error('imageCode') is-invalid @enderror" value="{{ $product->imageCode }}" placeholder="Enter imageCode">
                                        @error('imageCode')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="backspacing">backspacing</label>
                                        <input type="text" name="backspacing" id="backspacing" class="form-control @error('backspacing') is-invalid @enderror" value="{{ $product->backspacing }}" placeholder="Enter backspacing">
                                        @error('backspacing')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="wheelWeight">wheelWeight</label>
                                        <input type="text" name="wheelWeight" id="wheelWeight" class="form-control @error('wheelWeight') is-invalid @enderror" value="{{ $product->wheelWeight }}" placeholder="Enter wheelWeight">
                                        @error('wheelWeight')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="capPartNo">capPartNo</label>
                                        <input type="text" name="capPartNo" id="capPartNo" class="form-control @error('capPartNo') is-invalid @enderror" value="{{ $product->capPartNo }}" placeholder="Enter capPartNo">
                                        @error('capPartNo')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="rivetPartNo">rivetPartNo</label>
                                        <input type="text" name="rivetPartNo" id="rivetPartNo" class="form-control @error('rivetPartNo') is-invalid @enderror" value="{{ $product->rivetPartNo }}" placeholder="Enter rivetPartNo">
                                        @error('rivetPartNo')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="tpmsCompatible">tpmsCompatible</label>
                                        <input type="text" name="tpmsCompatible" id="tpmsCompatible" class="form-control @error('tpmsCompatible') is-invalid @enderror" value="{{ $product->tpmsCompatible }}" placeholder="Enter tpmsCompatible">
                                        @error('tpmsCompatible')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="lipDepth">lipDepth</label>
                                        <input type="text" name="lipDepth" id="lipDepth" class="form-control @error('lipDepth') is-invalid @enderror" value="{{ $product->lipDepth }}" placeholder="Enter lipDepth">
                                        @error('lipDepth')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="certification">certification</label>
                                        <input type="text" name="certification" id="certification" class="form-control @error('certification') is-invalid @enderror" value="{{ $product->certification }}" placeholder="Enter certification">
                                        @error('certification')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="structuralWarranty">structuralWarranty</label>
                                        <input type="text" name="structuralWarranty" id="structuralWarranty" class="form-control @error('structuralWarranty') is-invalid @enderror" value="{{ $product->structuralWarranty }}" placeholder="Enter structuralWarranty">
                                        @error('structuralWarranty')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="finishWarranty">finishWarranty</label>
                                        <input type="text" name="finishWarranty" id="finishWarranty" class="form-control @error('finishWarranty') is-invalid @enderror" value="{{ $product->finishWarranty }}" placeholder="Enter finishWarranty">
                                        @error('finishWarranty')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="openEndCap">openEndCap</label>
                                        <input type="text" name="openEndCap" id="openEndCap" class="form-control @error('openEndCap') is-invalid @enderror" value="{{ $product->openEndCap }}" placeholder="Enter openEndCap">
                                        @error('openEndCap')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="capScrewNo">capScrewNo</label>
                                        <input type="text" name="capScrewNo" id="capScrewNo" class="form-control @error('capScrewNo') is-invalid @enderror" value="{{ $product->capScrewNo }}" placeholder="Enter capScrewNo">
                                        @error('capScrewNo')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="otherAccessories">otherAccessories</label>
                                        <input type="text" name="otherAccessories" id="otherAccessories" class="form-control @error('otherAccessories') is-invalid @enderror" value="{{ $product->otherAccessories }}" placeholder="Enter otherAccessories">
                                        @error('otherAccessories')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="additionalAccessories">additionalAccessories</label>
                                        <input type="text" name="additionalAccessories" id="additionalAccessories" class="form-control @error('additionalAccessories') is-invalid @enderror" value="{{ $product->additionalAccessories }}" placeholder="Enter additionalAccessories">
                                        @error('additionalAccessories')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="catalogPage">catalogPage</label>
                                        <input type="text" name="catalogPage" id="catalogPage" class="form-control @error('catalogPage') is-invalid @enderror" value="{{ $product->catalogPage }}" placeholder="Enter catalogPage">
                                        @error('catalogPage')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="loadRating">loadRating</label>
                                        <input type="text" name="loadRating" id="loadRating" class="form-control @error('loadRating') is-invalid @enderror" value="{{ $product->loadRating }}" placeholder="Enter loadRating">
                                        @error('loadRating')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels hidden">
                                        <label for="sizeDesc">sizeDesc</label>
                                        <input type="text" name="sizeDesc" id="sizeDesc" class="form-control @error('sizeDesc') is-invalid @enderror" value="{{ $product->sizeDesc }}" placeholder="Enter sizeDesc">
                                        @error('sizeDesc')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 wheels tires accessories hidden">
                                        <label for="images">Product Images <small>Multiple</small></label>
                                        <input type="file" name="images[]" multiple id="images" class="form-control @error('images') is-invalid @enderror" value="{{ $product->images }}" accept=".jpeg,.png,.jpg">
                                        @error('images')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


@section('scripts')
    <script>
        $('#sku_type').on('change',function(){
            var type = $(this).val();
            $('.wheels,.tires,.accessories').addClass('hidden');
            if(type == "WHEEL"){
                $('.wheels').removeClass('hidden');
            }else if(type == "TIRE"){
                $('.tires').removeClass('hidden');
            }else if(type == "ACC"){
                $('.accessories').removeClass('hidden');
            }else{
                alert('something went wrong');
            }
        })

        $('sku_type').trigger('change');
    </script>
@endsection
