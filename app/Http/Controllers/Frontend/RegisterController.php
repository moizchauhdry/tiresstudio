<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {
            // dd($request->all());

            $data = [
                'name' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ];

            $user = User::create($data);

            return response()->json(['status' => 1, 'message' => 'success']);
        }

        return view('frontend.pages.register');
    }
}
