<?php

namespace App\Http\Controllers\Frontend;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Notifications\AdminNotification;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Validator;
use App\Product;
use App\Address;
use App\Mail\InvoiceMail;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use Cart;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::guard('customer')->user();
        if (Auth::guard('customer')->check()) {
            $address = Address::where('user_id', $user->id)->first();
        } else {
            $address = $request->session()->get('address');
        }

        $products = [];
        foreach (Cart::getContent() as $key => $cart) {
            $products[] = Product::where('id', $cart->id)->first();
        }

        if ($request->isMethod('post') && $request->ajax()) {
            $checkout_as = $request->checkout_as;

            if ($checkout_as == 'signin') {

                $request->session()->forget('redirect_url');
                if (empty($request->session()->get('redirect_url'))) {
                    $request->session()->put('redirect_url', route('frontend.pages.checkout'));
                }

                return response()->json([
                    'status' => true, 'message' => 'success', 'url' => route('frontend.pages.register')
                ]);
            } else if ($checkout_as == 'guest') {
                return response()->json([
                    'status' => true, 'message' => 'success', 'url' => route('frontend.pages.checkout')
                ]);
            } else {
                return response()->json([
                    'status' => true, 'message' => 'success', 'url' => route('frontend.pages.cart')
                ]);
            }
        }

        $request->session()->forget('redirect_url');
        return view('frontend.pages.checkout', compact('user', 'products', 'address'));
    }

    public function order(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {

            $user = Auth::guard('customer')->user();

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

            $shipping_data = [
                'user_id' => $user->id ?? 0,
                'type' => 'SHIPPING',
                'name' => $request->shipping_name,
                'country' => $request->shipping_country,
                'city' => $request->shipping_city,
                'address_1' => $request->shipping_address_1,
                'address_2' => $request->shipping_address_2,
                'email' => $request->shipping_email,
                'phone' => $request->shipping_phone,
            ];

            if (Auth::guard('customer')->check()) {
                $request->session()->forget('address');
                $address = Address::where('user_id', $user->id)->where('type', 'SHIPPING')->first();
                if ($address == NULL) {
                    Address::create($shipping_data);
                } else {
                    $address->update($shipping_data);
                }
            } else {
                $request->session()->forget('address');
                $address = new Address();
                $address->fill($shipping_data);
                $request->session()->put('address', $address);
            }

            $order_data = [
                'user_id' => $user->id ?? 0,
                'tracking_id' => random_int(100000, 999999) + strtotime(Carbon::now()),
                'gross_total' => getCart()['sub_total'],
                'net_total' => getCart()['total'],
                'order_notes' => $request->order_notes,
            ];

            $request->session()->forget('order');
            $order = new Order();
            $order->fill($order_data);
            $request->session()->put('order', $order);

            return response()->json([
                'status' => 1,
                'title' => 'Payment Confirmation!',
                'icon' => 'warning',
                'message' => 'Please note that we still await your payment to complete the process',
            ]);
        }
    }

    public function payment(Request $request)
    {
        $request->session()->forget('payment');
        $request->session()->put('payment', json_encode($request->payment_data));

        $url = route('frontend.customer.payment-success');

        return response()->json([
            'status' => 1,
            'message' => 'success',
            'url' => $url,
        ]);
    }

    public function paymentSuccess()
    {
        if (Auth::guard('customer')->check()) {
            $address = Address::where('user_id', Auth::guard('customer')->user()->id)->first();
        } else {
            $address = FacadesSession::get('address');
            $address->save();
        }

        $order = FacadesSession::get('order');
        $order->save();

        $order->update([
            'address_id' => $address->id,
            'address_id' => $address->id,
            'payment_status' => true,
            'payment_method' => 1,
            'payment_data' => FacadesSession::get('payment'),
        ]);

        foreach (Cart::getContent() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
            ]);
        }

        Cart::clear();

        try {
            $admins = Admin::whereNotNull('device_token')->get();
            $data = [
                'name' => $address->name . ' has Placed an Order',
                'message' => "Order Id is " . $order->id,
                'url' => \URL::route('orders.detail', $order->id)
            ];
            $firebase = new FirebaseService();
            foreach ($admins as $admin) {
                $admin->notify(new AdminNotification($data));
                $firebase->notifyAdmin($data, $admin->device_token);
            }

            Mail::to($address->email)->send(new InvoiceMail(['order' => $order, 'address' => $address]));
        } catch (\Throwable $th) {
            //throw $th;
        }

        return view('frontend.pages.payment-success', compact('order'));
    }
}
