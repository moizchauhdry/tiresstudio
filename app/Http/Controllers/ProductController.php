<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => 'Bearer eyJraWQiOiJTekpBRlFHbnY3QWQzS3BBOEJnc2RJa2tONzJrTnNyZ2lMUUF0TFwvb09oST0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI5MTQ5ZWZmNC04YTViLTQ2ZGUtYmUwYi0xZmYwZDA4ZjliMDAiLCJjb2duaXRvOmdyb3VwcyI6WyJ3cC1hcGktY29yZS12ZWhpY2xlIiwid3AtYXBpLWNvcmUtcHJpY2luZyIsIm5vbkFkbWluVXNlciIsIndwLWFwaS1jb3JlLXByb2R1Y3QiLCJ3cC1hcGktY29yZS1pbnZlbnRvcnkiXSwiZXZlbnRfaWQiOiJiZGZjZWNiMi0xNTBmLTQyMjQtOGZiMC0zM2E3NzhhMTA5ZmUiLCJ0b2tlbl91c2UiOiJhY2Nlc3MiLCJzY29wZSI6ImF3cy5jb2duaXRvLnNpZ25pbi51c2VyLmFkbWluIiwiYXV0aF90aW1lIjoxNjQyMzQxMTE2LCJpc3MiOiJodHRwczpcL1wvY29nbml0by1pZHAudXMtd2VzdC0yLmFtYXpvbmF3cy5jb21cL3VzLXdlc3QtMl9nVmxqQlo1ZGIiLCJleHAiOjE2NDIzNDQ3MTYsImlhdCI6MTY0MjM0MTExNiwianRpIjoiMGUzYTgxYTMtNmQ0Mi00YWZiLTllMWQtNjFmNjc0OWRjODE0IiwiY2xpZW50X2lkIjoiNGxxOWgzaThhNnRoZG5paG9razU2OTJiYjMiLCJ1c2VybmFtZSI6ImF1Lmhhc2VlYkBnbWFpbC5jb20ifQ.kSr97zi75Iso4va-MqEVCBONBok20ZlYz1w2qgcPz1G-El66ewlVZdz0nWF4jzvl6TqpK0tMvAjcqFLxJ3MdTJ8LR9BgsihY3lT7hUpUZEN3iXwR2IK4sXMl0C7djrJ1uBaoCeokZDQSDa6j_h_S2JFpMHtMHgu85_LhghASxY0HxGtRgyiCC8qT0BpDoa5xB0u-o5eSJrgKbVtdc-j7eQm8m5bTuKkB0ezmkbHf2fMla32FGpjyiIVunAm7QoEHHTj2zKmwbMYSRAYRSNOLYzaZoXq0sKMYpsSl-CTYcCCesIEOEUEim2wRU3WX7wh6K2U2rdqGoB3u_s3SfGPUKw',
            'Content-Type' => 'application/json',
            ]]);

        $res = $client->request('GET','https://api.wheelpros.com/products/v1/search/wheel?pageSize=100&page=3');
        $data = json_decode($res->getBody()->getContents(), true);

        $products = $data['results'];

        foreach ($products as $key => $product) {
            $data = [
                'sku' => $product['sku'],
                'upc' => $product['sku'],
                'sku_type' => $product['skuType'],
                'title' => $product['title'],
            ];

            $product = Product::firstOrCreate($data);
            $product->save();
        }

        dd('success');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
