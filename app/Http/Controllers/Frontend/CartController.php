<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {
            try {
                $product = Product::where('id', $request->product_id)->first();

                $cart = Cart::add(
                    array(
                        'id' => $product->id,
                        'name' => $product->title,
                        'quantity' => $request->cart_qty,
                        'price' => $product->price,
                    )
                );

                $count = Cart::getContent()->count();

                return response()->json([
                    'status' => 1,
                    'cart_count' => $count,
                    'message' => $product->title . '-' . getProductName($product->id),
                ]);
            } catch (\Throwable $th) {
                return response()->json(['status' => 1, 'message' => 'invalid'], 401);
            }
        }

        $products = [];
        foreach (Cart::getContent() as $key => $cart) {
            $products[] = Product::where('id', $cart->id)->first();
        }

        return view('frontend.pages.cart', compact('products'));
    }

    public function increment(Request $request)
    {

        $id = $request->product_id;
        $cart = Cart::update($id, array('quantity' => 1));
        $quantity = Cart::get($id)->quantity;
        return $quantity;
    }

    public function decrement(Request $request)
    {
        $id = $request->product_id;
        Cart::update($id, array('quantity' => -1));
        $quantity = Cart::get($id)->quantity;
        return $quantity;
    }

    public function destroy(Request $request)
    {
        Cart::remove($request->product_id);
    }
}
