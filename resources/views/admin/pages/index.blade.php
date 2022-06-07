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
                    <li class="breadcrumb-item">
                        <a href="{{route('pages.create')}}" class="btn btn-success">
                            Add Page
                        </a>
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
                            Gallery List (Total Gallery : {{$pages->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="banners" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Page Title</th>
                                    <th>Page Description</th>
                                    <th>Status</th>
                                    <th>Added By</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->id}}</td>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->description}}</td>
                                    <td>
                                        @if ($page->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        Created by: {{$page->creater->name}} <br>
                                        Updated by: {{$page->updater->name}} <br>
                                        Created at: {{$page->created_at}} <br>
                                        Updated at: {{$page->created_at}} <br>
                                    </td>
                                    <td>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                        </a>

                                        <a @if ($page->creater->role != 'SUPER-ADMIN')
                                            href="javascript:void(0);" onclick="deletePage('{{$page->id}}');"
                                            class="btn btn-sm btn-danger"
                                            @else class="btn btn-sm btn-danger disabled"
                                            @endif >
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
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
      $("#banners").DataTable({
        "responsive": true,
        "autoWidth": false,
          "order": [[ 0, "desc" ]],
          "columnDefs": [ {
              "targets"  : 'no-sort',
              "orderable": false,
          }]
      });
    });

    function deletePage(page_id) {
        var result = window.confirm('Are you sure you want to delete this Page?  This action cannot be undone. Proceed?');
        if (result == false) {
            e.preventDefault();
        } else {
            $.ajax({
                method: "POST",
                url: './pages/destroy',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'page_id': page_id
                    },
                success: function (response) {
                    location.reload();
                }
            });
        }
    };
</script>
@endsection
