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
                                Vehicle Detail - {{$vehicle->model}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Pro ID</th>
                                    <td>{{ $vehicle->pro_id ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Make</th>
                                    <td>{{ $vehicle->make->name ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <td>{{ $vehicle->model ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Sub Model</th>
                                    <td>{{ $vehicle->subModel ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <td>{{ $vehicle->year ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>Staggered</th>
                                    <td>{{ $vehicle->staggered ?? "N/A" }}</td>
                                </tr>
                                <tr class="table-primary">
                                    <th colspan="2" class="text-center"><strong>AXLES</strong></th>
                                </tr>
                                @foreach($vehicle->axles as $axle)
                                   <tr class="table-warning">
                                       <th colspan="2" class="text-center">Placement - {{ ucfirst($axle->placement) ?? "N/A" }}</th>
                                   </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div  class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">Axle Property</div>
                                                        <div class="card-body">
                                                            <ul class="list-unstyled">
                                                                <li><strong>code :</strong>{{ $axle->code ?? "N/A" }}</li>
                                                                <li><strong>vehiclePressureSensor :</strong>{{ $axle->vehiclePressureSensor ?? "N/A" }}</li>
                                                                <li><strong>boltPatternMm :</strong>{{ $axle->boltPatternMm ?? "N/A" }}</li>
                                                                <li><strong>oeWidthIn :</strong>{{ $axle->oeWidthIn ?? "N/A" }}</li>
                                                                <li><strong>maxWidthIn :</strong>{{ $axle->maxWidthIn ?? "N/A" }}</li>
                                                                <li><strong>oeTireTx :</strong>{{ $axle->oeTireTx ?? "N/A" }}</li>
                                                                <li><strong>oeHexTx :</strong>{{ $axle->oeHexTx ?? "N/A" }}</li>
                                                                <li><strong>nutBolt :</strong>{{ $axle->nutBolt ?? "N/A" }}</li>
                                                                <li><strong>centerBoreMm :</strong>{{ $axle->centerBoreMm ?? "N/A" }}</li>
                                                                <li><strong>minWheelLoad :</strong>{{ $axle->minWheelLoad ?? "N/A" }}</li>
                                                                <li><strong>sensorPartNumberOe :</strong>{{ $axle->sensorPartNumberOe ?? "N/A" }}</li>
                                                                <li><strong>hubCode :</strong>{{ $axle->hubCode ?? "N/A" }}</li>
                                                                <li><strong>maxBs :</strong>{{ $axle->maxBs ?? "N/A" }}</li>
                                                                <li><strong>maxFs :</strong>{{ $axle->maxFs ?? "N/A" }}</li>
                                                                <li><strong>hubClearanceMm :</strong>{{ $axle->hubClearanceMm ?? "N/A" }}</li>
                                                                <li><strong>yFactor :</strong>{{ $axle->yFactor ?? "N/A" }}</li>
                                                                <li><strong>yFactor25 :</strong>{{ $axle->yFactor25 ?? "N/A" }}</li>
                                                                <li><strong>yFactor50 :</strong>{{ $axle->yFactor50 ?? "N/A" }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">Diameter</div>
                                                        <div class="card-body">
                                                            <ul class="list-unstyled">
                                                                <li><strong>oeDiameterIn :</strong>{{ $axle->oeDiameterIn ?? "N/A" }}</li>
                                                                <li><strong>minDiameterIn :</strong>{{ $axle->minDiameterIn ?? "N/A" }}</li>
                                                                <li><strong>maxDiameterIn :</strong>{{ $axle->maxDiameterIn ?? "N/A" }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">Caliper</div>
                                                        <div class="card-body">
                                                            <ul class="list-unstyled">
                                                                <li><strong>peakDepth :</strong>{{ $axle->peakDepth ?? "N/A" }}</li>
                                                                <li><strong>depth100mm :</strong>{{ $axle->depth100mm ?? "N/A" }}</li>
                                                                <li><strong>depth106mm :</strong>{{ $axle->depth106mm ?? "N/A" }}</li>
                                                                <li><strong>depth119mm :</strong>{{ $axle->depth119mm ?? "N/A" }}</li>
                                                                <li><strong>depth134mm :</strong>{{ $axle->depth134mm ?? "N/A" }}</li>
                                                                <li><strong>depth160mm :</strong>{{ $axle->depth160mm ?? "N/A" }}</li>
                                                                <li><strong>depth90mm :</strong>{{ $axle->depth90mm ?? "N/A" }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">Offset</div>
                                                        <div class="card-body">
                                                            <ul class="list-unstyled">
                                                                <li><strong>oeOffset :</strong>{{ $axle->oeOffset ?? "N/A" }}</li>
                                                                <li><strong>offsetMaxMm :</strong>{{ $axle->offsetMaxMm ?? "N/A" }}</li>
                                                                <li><strong>offsetMinMm :</strong>{{ $axle->offsetMinMm ?? "N/A" }}</li>
                                                                <li><strong>liftOffsetMaxMm :</strong>{{ $axle->liftOffsetMaxMm ?? "N/A" }}</li>
                                                                <li><strong>liftOffsetMinMm :</strong>{{ $axle->liftOffsetMinMm ?? "N/A" }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">Lug</div>
                                                        <div class="card-body">
                                                            <ul class="list-unstyled">
                                                                <li><strong>amLugStyle :</strong>{{ $axle->amLugStyle ?? "N/A" }}</li>
                                                                <li><strong>lugNutSizeTx :</strong>{{ $axle->lugNutSizeTx ?? "N/A" }}</li>
                                                                <li><strong>lugCnt :</strong>{{ $axle->lugCnt ?? "N/A" }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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

    </script>
@endsection
