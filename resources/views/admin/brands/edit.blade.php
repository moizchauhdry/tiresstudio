@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
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
                            <h3 class="card-title">Edit Brand</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control  @error('type') is-invalid @enderror" {{ $brand->submitted_by != null ? '': 'readonly' }} >
                                            <option value="">Select SKU Type</option>
                                            <option {{ $brand->type == 'WHEEL' ? 'selected' : '' }} value="WHEEL">Wheel</option>
                                            <option {{ $brand->type == 'TIRE' ? 'selected' : '' }} value="TIRE">Tire</option>
                                            <option {{ $brand->type == 'ACC' ? 'selected' : '' }} value="ACC">Accessories</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" id="code" class="form-control  @error('code') is-invalid @enderror" {{ $brand->submitted_by != null ? '': 'readonly' }} value="{{ $brand->code }}" placeholder="Enter Title">
                                        @error('code')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" class="form-control  @error('description') is-invalid @enderror" {{ $brand->submitted_by != null ? '': 'readonly' }} value="{{ $brand->description }}" placeholder="Enter Title">
                                        @error('description')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label for="parent">Parent</label>
                                        <input type="text" name="parent" id="parent" class="form-control  @error('parent') is-invalid @enderror" {{ $brand->submitted_by != null ? '': 'readonly' }} value="{{ $brand->parent }}" placeholder="Enter Title">
                                        @error('parent')
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

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


@section('scripts')

@endsection
