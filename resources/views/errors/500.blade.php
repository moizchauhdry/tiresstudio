@extends('layouts.frontend')
@section('content')
<section class="text-center" style="padding:100px">
    <h1 style="color: red">The request could not be satisfied.</h1>
    <h4>You don't have permission to access this. There might be configuration error. <br> Try again later, or contact
        the
        support.</h4>
    <a href="{{route('frontend.pages.index')}}" class="btn btn-default">Return Home</a>
</section>
@endsection
