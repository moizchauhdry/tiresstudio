<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //

    public function index()
    {
        $brands = Brand::all();
        $response['brand'] = $brands;
        return view('admin.brands.index')->with($response);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'code' => 'nullable',
            'description' => 'nullable',
            'parent' => 'nullable',
        ]);


        $brand =  Brand::create([
            'type' => $validated['type'],
            'code' => $validated['code'],
            'description' => $validated['description'],
            'parent' => $validated['parent'],
            'submitted_by'=> \Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('brands.index')->with('success','Brand Added successfully');
    }

    public function edit($id)
    {
        $response['brand'] = Brand::find($id);

        if($response['brand'] == null){
            return redirect()->back()->with('error','brand not found');
        }
        return view('admin.brands.edit')->with($response);
    }

    public function update(Request $request,$id)
    {
        $brand = Brand::find($id);

        if($brand == null){
            return redirect()->back()->with('error','brand not found');
        }

        $validated = $request->validate([
            'type' => 'required',
            'code' => 'nullable',
            'description' => 'nullable',
            'parent' => 'nullable',
        ]);

        $brand->update([
            'type' => $validated['type'],
            'code' => $validated['code'],
            'description' => $validated['description'],
            'parent' => $validated['parent'],
            'submitted_by'=> \Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('brands.index')->with('success','Brand Updated successfully');

    }
}
