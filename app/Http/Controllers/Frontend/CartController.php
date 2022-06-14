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

            $product = Product::where('id', $request->product_id)->first();
            $cart = Cart::add(
                array(
                    'id' => $product->id,
                    'name' => $product->title,
                    'quantity' => 1,
                    'price' => $product->price,
                )
            );

            $count = Cart::getContent()->count();

            return response()->json(['status' => 1, 'message' => 'success', 'cart_count' => $count]);
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
