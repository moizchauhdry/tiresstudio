<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\VehicleModel;
use App\Brand;
use Session;
use Cart;

class FrontendController extends Controller
{
    public function index()
    {
        $response['popular_wheels'] = Product::take(9)->where('sku_type','Wheel')->get();
        return view('frontend.pages.index',compact('response'));
    }

    public function shop()
    {
        $response['products'] = Product::paginate(12);
        return view('frontend.pages.shop',compact('response'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        return view('frontend.pages.product',compact('product'));
    }

    public function cart(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {

            $product = Product::where('id',$request->product_id)->first();
            $cart = Cart::add(
                array(
                    'id' => $product->id,
                    'name' => $product->title,
                    'quantity' => 1,
                    'price' => '10',
                    // 'image' => $product->image_url
                ));

            $count = Cart::getContent()->count();

            return response()->json(['status' => 1, 'message' => 'success', 'cart_count' => $count]);
        }

        $products = [];
        foreach (Cart::getContent() as $key => $cart) {
            $products[] = Product::where('id', $cart->id)->first();
        }

        return view('frontend.pages.cart',compact('products'));
    }

    public function destroyCart(Request $request) {
        $id = $request->product_id;
        Cart::remove($id);
    }

    public function checkout()
    {
        return view('frontend.pages.checkout');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function gallery()
    {
        return view('frontend.pages.gallery');
    }
}
