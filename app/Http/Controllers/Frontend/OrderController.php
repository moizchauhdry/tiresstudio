<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Product;
use App\Address;
use App\Order;
use App\OrderItem;
use Cart;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = Auth::guard('customer')->user();

        $products = [];
        foreach (Cart::getContent() as $key => $cart) {
            $products[] = Product::where('id', $cart->id)->first();
        }

        return view('frontend.pages.checkout',compact('user','products'));
    }

    public function order(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {
            // dd($request->all());
            $user = Auth::guard('customer')->user();

            // $rules = [
            //     'billing_name' => ['required', 'string', 'max:255'],
            //     'billing_country' => ['required', 'string', 'max:255'],
            //     'billing_city' => ['required', 'string', 'max:255'],
            //     'billing_address_1' => ['required', 'string', 'max:255'],
            //     'billing_address_2' => ['nullable', 'string', 'max:255'],
            //     'billing_email' => ['required', 'string', 'email', 'max:255'],
            //     'billing_phone' => ['required'],

            //     'shipping_name' => ['required', 'string', 'max:255'],
            //     'shipping_country' => ['required', 'string', 'max:255'],
            //     'shipping_city' => ['required', 'string', 'max:255'],
            //     'shipping_address_1' => ['required', 'string', 'max:255'],
            //     'shipping_address_2' => ['nullable', 'string', 'max:255'],

            //     'order_notes' => ['required', 'string', 'max:255'],
            // ];

            // $validator = Validator::make($request->all(), $rules);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'errors' => $validator->errors(),
            //     ],400);
            // }

            // $billingAddress = Address::where('user_id', $user->id)->where('type', 'BILLING')->first();
            // $shippingAddress = Address::where('user_id', $user->id)->where('type', 'SHIPPING')->first();

            // $billingData = [
            //     'user_id' => $user->id,
            //     'type' => 'BILLING',
            //     'name' => $request->billing_name,
            //     'country' => $request->billing_country,
            //     'city' => $request->billing_city,
            //     'address_1' => $request->billing_address_1,
            //     'address_2' => $request->billing_address_2,
            //     'email' => $request->billing_email,
            //     'phone' => $request->billing_phone,
            // ];

            // $shippingData = [
            //     'user_id' => $user->id,
            //     'type' => 'SHIPPING',
            //     'name' => $request->shipping_name,
            //     'country' => $request->shipping_country,
            //     'city' => $request->shipping_city,
            //     'address_1' => $request->shipping_address_1,
            //     'address_2' => $request->shipping_address_2,
            //     'email' => $user->email,
            //     'phone' => $user->phone,
            // ];

            // isset($billingAddress) ? $billingAddress->update($billingData) : Address::create($billingData);
            // isset($shippingAddress) ? $shippingAddress->update($shippingData) : Address::create($shippingData);

            $grossTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
            $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');

            $orderData = [
                'user_id' => $user->id,
                'tracking_id' => '123456',
                'gross_total' => $grossTotal,
                'net_total' => $netTotal,
                // 'order_notes' => $request->order_notes,
                'payment_method' => 1,
                'payment_status' => true,
            ];

            $order = Order::create($orderData);

            foreach(Cart::getContent() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                ]);
            }

            Cart::clear();

            return response()->json([
                'status' => 1,
                'title' => 'Order Placed!',
                'icon' => 'success',
                'message' => 'Thankyou, Your order have been placed successfully.',
            ]);
        }
    }
}
