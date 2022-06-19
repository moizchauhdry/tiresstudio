@extends('layouts.mail')

@section('content')
<table class="w320" cellspacing="0" cellpadding="0" width="700">
    <tbody>
        <tr>
            <td class="body-padding mobile-padding">
                <table cellspacing="0" cellpadding="0" width="100%" style="padding-bottom:40px;text-align:left">
                    <tbody>
                        <tr>
                            <td class="left">Dear <b>{{$data['address']->name}}</b>,</td>
                        </tr>
                        <tr>
                            <td class="left">Thankyou, Your order have been places successfully.</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
