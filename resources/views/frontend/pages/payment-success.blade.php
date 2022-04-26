@extends('layouts.frontend')

@section('styles')
    <style>
        .car-title h4{
            height: 50px;
        }
    </style>
@endsection

@section('content')
    <div class="section">
        <div class="container text-center p-5">
            <img class="mt-2 mr-auto ml-auto mb-5" style="max-width:400px;margin: 0 auto" src="{{ asset('images/payment-success.png') }}">
            <h2 style="margin: 18px auto;">Your payment is successfully completed.</h2>
            <h3>your order id is "{{ $order->id }}"</h3>
        </div>
    </div>
@endsection


