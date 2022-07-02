<?php

namespace App\Http\Controllers;

use App\Mail\SendUpdatesMail;
use App\NewsSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsSubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = NewsSubscribe::orderBy('id', 'desc')->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {

            $rules = [
                'message' => ['required', 'string', 'min:25'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }


            $subscribers = NewsSubscribe::orderBy('id', 'asc')->get();

            try {
                foreach ($subscribers as $key => $subs) {
                    Mail::to($subs->email)->send(new SendUpdatesMail(['message' => $request->message]));
                }
            } catch (\Throwable $th) {
                throw $th;
            }

            return response()->json([
                'status' => 1,
                'title' => 'Updates Sent Successfully',
                'icon' => 'success',
                'message' => 'The updates have been sent successfully to all subscribers of tiresstudio.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
