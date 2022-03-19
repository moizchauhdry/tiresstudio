@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{url()->previous()}}" class="btn btn-dark">
                            Back
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
                            Orders List (Total Orders : {{$orders->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="orders">
                        <table id="orderTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Net Total</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$count ++}}</td>
                                    <td> {{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{isset($order->user->name) ? $order->user->name : ''}}</td>
                                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                    <td>
                                        @if ($order->order_status == 0) Pending
                                        @elseif ($order->order_status == 1) Processing
                                        @elseif ($order->order_status == 2) Shipped
                                        @elseif ($order->order_status == 3) Delivered
                                        @elseif ($order->order_status == 4) Cancelled
                                        @else Failed
                                        @endif
                                    </td>
                                    <td>$ {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
                                    <td>
                                        @if ($order->payment_method == 1)
                                        <span class="badge badge-primary">PAYPAL</span>
                                        @else <span class="badge badge-danger">FAILED</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 0)
                                        <span class="badge badge-warning">PENDING</span>
                                        @elseif ($order->payment_status == 1)
                                        <span class="badge badge-success">COMPLETE</span>
                                        @else
                                        <span class="badge badge-danger">FAILED</span>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <a href="{{route('orders.detail',$order->id)}}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-eye mr-1" aria-hidden="true"></i> View
                                        </a>
                                    </td> --}}
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
      $("#orderTable").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });

    var indexList = "{{$orders->count()}}";
    var restHtml;
    setInterval(function(){
        $.ajax({
            type: "get",
            url: '{{route('orders.check')}}',
            data: {_token: $('meta[name="csrf-token"]').attr('content'),indexList: indexList},
           success: function (response) {
                console.log(response.status);
                if(response.status)
                {
                    $('#orders').empty();
                    indexList = response.count;
                    $('#orders').html(response.html);
                    playSound();
                    $("#orderTable").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                    });
                }
                else{


                }
            }
        });
    }, 5000);

    function playSound()
    {
        var audio = new Audio('{{asset("public/audio/notify.mp3")}}');
        audio.play();
    }
</script>
@endsection
