<?php

namespace App\Http\Controllers;

use App\Make;
use App\VehicleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = VehicleModel::orderBy('id','DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('make_id', function(VehicleModel $data){
                    $btn1 = $data->make->name;
                    return $btn1;
                })
                ->addColumn('action', function(VehicleModel $data){
                    $btn1 = '<a href="'.route('vehicle.show', $data->id).'"><i class="fas fa-eye"></i></a>';
                    return $btn1;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.vehicles.index');
    }

    public function show($id)
    {
        $vehicle = VehicleModel::find($id);
        return view('admin.vehicles.show',compact('vehicle'));
    }

    public function indexMake(Request $request)
    {
        if ($request->ajax()) {
            $data = Make::orderBy('id','DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('vehicles', function(Make $data){
                    $btn1 = $data->vehicles->count();
                    return $btn1;
                })
                ->make(true);
        }
        return view('admin.vehicles.index-makes');
    }
}
