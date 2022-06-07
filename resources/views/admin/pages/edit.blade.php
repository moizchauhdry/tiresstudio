@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Pages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('pages.index')}}" class="btn btn-dark">Back</a>
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
                        <h3 class="card-title">Edit Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('pages.update', $page->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Page Title <span class="required-star">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{$page->title}}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Meta Title <span class="required-star">*</span></label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                        value="{{$page->meta_title}}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Page Description <span class="required-star">*</span></label>
                                    <textarea type="text" name="description" id="description" class="form-control"
                                        rows="10">{{$page->description}}</textarea>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Meta Description <span class="required-star">*</span></label>
                                    <textarea type="text" name="meta_description" id="meta_description"
                                        class="form-control" rows="10">{{$page->meta_description}}</textarea>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Meta Keywords <span class="required-star">*</span> <small>(Keywords must be
                                            comma seprated e.g: wheels, tires, accessories)</small></label>
                                    <textarea type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                        rows="10">{{$page->meta_keywords}}</textarea>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Status <span class="required-star">*</span></label>
                                    <select class="form-control" name="status" id="status">
                                        <option {{ (Request::input("status")=="1" ? "selected" :"") }} value="1">Active
                                        </option>
                                        <option {{ (Request::input("status")=="0" ? "selected" :"") }} value="0">In
                                            Active
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
    //
</script>
@endsection
