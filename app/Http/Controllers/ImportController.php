<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Excel;

class ImportController extends Controller
{
    public function importProducts(Request $request)
    {
        if($request->ajax()){
            Excel::import(new ProductImport($request->type,1),$request->file('import_file'));
            return response()->json(['status' => 1,'message' => 'success']);
        }else if ($request->isMethod('POST')){
            Excel::import(new ProductImport($request->type,1),$request->file('import_file'));
            return response()->json(['status' => 1,'message' => 'success']);
        }
        return view('admin.imports.index');
    }
}
