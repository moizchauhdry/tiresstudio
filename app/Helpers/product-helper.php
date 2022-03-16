<?php
use App\Product;

function getCurrency(){
    return '$ ';
}

function getCurrencyCode(){
    return 'USD';
}

function imageURL($url){

    if(!empty($url)){
        $url = URL::asset('storage/'.$url);
        return $url;
    }else{
        return URL::asset('images/placeholder.png');
    }

}

function getBrandNameById($id){
    $brand = \App\Brand::find($id);
    return $brand->description;
}

function getModelNameById($id){
    $model = \App\VehicleModel::find($id);
    return $model->model;
}

function getMakeNameById($id){
    $make = \App\Make::find($id);
    return $make->name;
}

function getProductName($id)
{
    $product = Product::find($id);
    $name = $product->brand->description.' '.$product->model;
    return $name;
}
