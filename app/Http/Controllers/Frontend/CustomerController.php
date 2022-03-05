<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('frontend.customer.dashboard');
    }

    public function profile(Request $request)
    {
        $user = Auth::guard('customer')->user();

        if ($request->isMethod('post') && $request->ajax()) {

            $user = Auth::guard('customer')->user();

            $rules = [
                'name' => 'required|string|max:255',
                'phone' => 'required|unique:users,phone,'.$user->id,
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ],400);
            }

            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
            ];

            $user->update($data);

            return response()->json([
                'status' => 1,
                'title' => 'Profile Updated Successfully',
                'icon' => 'success',
                'message' => 'Thankyou, Your profile have been updated successfully.',
            ]);
        }

        return view('frontend.customer.profile',compact('user'));
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('frontend.pages.register');
    }
}
