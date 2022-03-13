<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = Auth::guard('customer')->user();
        return view('frontend.pages.checkout',compact('user'));
    }

    public function order(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {
            $user = Auth::guard('customer')->user();

            $rules = [
                'billing_name' => ['required', 'string', 'max:255'],
                'billing_country' => ['required', 'string', 'max:255'],
                'billing_city' => ['required', 'string', 'max:255'],
                'billing_address_1' => ['required', 'string', 'max:255'],
                'billing_address_2' => ['nullable', 'string', 'max:255'],
                'shipping_name' => ['required', 'string', 'max:255'],
                'shipping_country' => ['required', 'string', 'max:255'],
                'shipping_city' => ['required', 'string', 'max:255'],
                'shipping_address_1' => ['required', 'string', 'max:255'],
                'shipping_address_2' => ['nullable', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required','unique:users'],
                'notes' => ['required', 'string', 'max:255'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ],400);
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ];

            return response()->json([
                'status' => 1,
                'title' => 'Order Placed!',
                'icon' => 'success',
                'message' => 'Thankyou, Your order have been placed successfully.',
            ]);
        }
    }
}
