<?php

namespace App\Http\Controllers\Frontend;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Notifications\AdminNotification;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Product;
use App\Address;
use App\Order;
use App\OrderItem;
use App\User;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = Auth::guard('customer')->user();

        $products = [];
        foreach (Cart::getContent() as $key => $cart) {
            $products[] = Product::where('id', $cart->id)->first();
        }

        return view('frontend.pages.checkout', compact('user', 'products'));
    }

    public function order(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {


            $rules = [
                'shipping_name' => ['required', 'string', 'max:255'],
                'shipping_country' => ['required', 'string', 'max:255'],
                'shipping_city' => ['required', 'string', 'max:255'],
                'shipping_address_1' => ['required', 'string', 'max:255'],
                'shipping_address_2' => ['nullable', 'string', 'max:255'],
                'shipping_phone' => ['required', 'string', 'max:255'],
                'shipping_email' => ['required', 'string', 'max:255'],
                'order_notes' => ['nullable', 'string', 'max:255'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }

            if (!Auth::guard('customer')->user()) {
                $user = User::create([
                    'name' => $request->shipping_name,
                    'email' => $request->shipping_email,
                    'phone' => $request->shipping_phone,
                    'password' => Hash::make('guest_user_password'),
                ]);
            } else {
                $user = Auth::guard('customer')->user();
            }

            Address::where('user_id', $user->id)->where('type', 'SHIPPING')->first();

            $shipping_data = [
                'user_id' => $user->id,
                'type' => 'SHIPPING',
                'name' => $request->shipping_name,
                'country' => $request->shipping_country,
                'city' => $request->shipping_city,
                'address_1' => $request->shipping_address_1,
                'address_2' => $request->shipping_address_2,
                'email' => $user->email,
                'phone' => $user->phone,
            ];

            Address::updateOrCreate(['user_id' => $user->id], $shipping_data);

            $grossTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
            $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');

            $orderData = [
                'user_id' => $user->id,
                'tracking_id' => random_int(100000, 999999) + strtotime(Carbon::now()),
                'gross_total' => $grossTotal,
                'net_total' => $netTotal,
                'order_notes' => $request->order_notes,
                'payment_method' => 1,
                'payment_data' => json_encode($request->payment_data),
                'payment_status' => false,
            ];

            $order = Order::updateOrCreate($orderData);

            foreach (Cart::getContent() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                ]);
            }

            // Cart::clear();

            $admins = Admin::whereNotNull('device_token')->get();
            $data = [
                'name' => $user->name . ' has Placed an Order',
                'message' => "Order Id is " . $order->id,
                'url' => \URL::route('orders.detail', $order->id)
            ];
            $firebase = new FirebaseService();
            foreach ($admins as $admin) {
                $admin->notify(new AdminNotification($data));
                $firebase->notifyAdmin($data, $admin->device_token);
            }


            $url = \URL::route('frontend.customer.payment-success', $order->id);

            return response()->json([
                'status' => 1,
                'title' => 'Order Placed!',
                'icon' => 'warning',
                'message' => 'Thankyou, Your order have been placed successfully. Please note that we still await your payment to complete the process',
                'url' => $url,
            ]);
        }
    }

    public function paymentSuccess($id)
    {
        $order = Order::find($id);
        return view('frontend.pages.payment-success', compact('order'));
    }
}
