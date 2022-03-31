<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function importProducts(Request $request)
    {
        if($request->ajax()){
            Excel::import(new ProductImport($request->type,$request->total),$request->file('import_file'));
            return response()->json(['status' => 1,'message' => 'success']);
        }else if ($request->isMethod('POST')){
            Excel::import(new ProductImport($request->type,$request->total),$request->file('import_file'));
            return response()->json(['status' => 1,'message' => 'success']);
        }
        return view('admin.imports.index');
    }

    public function importFromCRON($type,$total)
    {
        $path = null;
        if($total == 1){
            $path = 'import/products.csv';
        }elseif($total == 2){
            $path = 'import/productInventory.csv';
        }
        Excel::import(new ProductImport($type,$total),storage_path($path));
    }
}
