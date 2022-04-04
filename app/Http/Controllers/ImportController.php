<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Jobs\ImportProductJob;
use App\Notifications\NotifyAdmin;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function importProducts(Request $request)
    {
        if($request->ajax()){
            $validate = $request->validate([
                'import_file' => 'required|file'
            ]);

            Excel::queueImport(new ProductImport($request->type,$request->request_type),$request->file('import_file'));return response()->json(['status' => 1,'message' => 'success']);
        }else if ($request->isMethod('POST')){

            $validate = $request->validate([
                'import_file' => 'required|file'
            ]);

            Excel::queueImport(new ProductImport($request->type,$request->request_type),$request->file('import_file'));

            return redirect()->back()->with('success','Importing is in process. You will be notified on completion');

            /*$data = [];
            $directory = 'import';
            if(!Storage::disk('public')->exists($directory)){
                Storage::disk('public')->makeDirectory($directory);
            }
            $name = $request->import_file->getClientOriginalName();
            $content = file_get_contents($request->file('import_file'));
            $path = $directory . '/' . strtolower($name);
            Storage::disk('public')->put($path, $content);
            $data['path'] = $path;
            $data['type'] = $request->type;
            $data['request_type'] = $request->request_type;

            dispatch(new ImportProductJob($data));

            return response()->json(['status' => 1,'message' => 'File import has started']);*/
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
