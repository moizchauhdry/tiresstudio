<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,jpg,png',
            'status' => 'required',
        ]);

        $data = [
            'status' => $request->input('status'),
        ];

        $gallery = Gallery::create($data);

        $directory = 'galleryImages';
        if ($request->hasFile('image_url')) {

            $fileName = $request->file('image_url')->getClientOriginalName();

            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            $imageUrl = Storage::disk('public')->putFile($directory, new File($request->file('image_url')));
            $gallery->update(['image_url' => $imageUrl]);
        }

        return redirect()->route('gallery.index')->with('success', 'Record added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $rules = [
            'image' => 'image|mimes:jpeg,jpg,png',
        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'status' => $request->input('status'),
        ];

        $directory = 'galleryImages';
        if ($request->hasFile('image_url')) {

            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::delete('/' . $gallery->image_url);
            $imageUrl = Storage::disk('public')->putFile($directory, new File($request->file('image_url')));
            $data['image_url'] = $imageUrl;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Gallery::where('id', $request->gallery_id)->delete();
        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }
}
