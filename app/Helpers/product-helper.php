<?php

use App\Product;

function getAdmin()
{
    $user = Auth::guard('admin')->user();
    return $user;
}

function getCurrency()
{
    return '$ ';
}

function getCurrencyCode()
{
    return 'USD';
}

function imageURL($url)
{

    if (Storage::disk('public')->exists($url)) {
        $url = URL::asset('storage/' . $url);
        return $url;
    } else {
        return URL::asset('images/placeholder.png');
    }
}

function getBrandNameById($id)
{
    $brand = \App\Brand::find($id);
    return $brand->description;
}

function getModelNameById($id)
{
    $model = \App\VehicleModel::find($id);
    return $model->model;
}

function getMakeNameById($id)
{
    $make = \App\Make::find($id);
    return $make->name;
}

function getProductName($id)
{
    $product = Product::find($id);
    $name = $product->brand->description . ' ' . $product->model;
    return $name;
}

function getCart()
{
    $sub_total =  number_format((float)Cart::getSubTotal(), 2, '.', '');
    $shipping = 0;
    $paypal_charges = $sub_total * 3 / 100;
    $total = $sub_total + $shipping + $paypal_charges;

    return [
        'sub_total' => $sub_total,
        'paypal_charges' => $paypal_charges,
        'total' => $total,
    ];
}
