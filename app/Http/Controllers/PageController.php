<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::with('creater')->orderBy('id', 'desc')->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $data = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:5000',
            'meta_title' => 'nullable|max:100',
            'meta_description' => 'nullable|max:5000',
            'meta_keywords' => 'nullable|max:5000',
            'status' => 'required|in:0,1',
        ]);

        $page = Page::create($data);

        $page->update([
            'created_by' => $admin->id,
            'updated_by' => $admin->id,
        ]);

        return redirect()->route('pages.index')->with('success', 'Record added successfully.');
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
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
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
        $admin = Auth::guard('admin')->user();

        $page = Page::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:5000',
            'meta_title' => 'nullable|max:100',
            'meta_description' => 'nullable|max:5000',
            'meta_keywords' => 'nullable|max:5000',
            'status' => 'required|in:0,1',
        ]);

        $page->update($data);

        $page->update([
            'updated_by' => $admin->id,
        ]);


        return redirect()->route('pages.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Page::where('id', $request->page_id)->delete();
        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }
}
