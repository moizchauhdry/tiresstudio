@extends('layouts.mail')

@section('content')
<table class="w320" cellspacing="0" cellpadding="0" width="700">
    <tbody>
        <tr>
            <td class="body-padding mobile-padding">
                <table cellspacing="0" cellpadding="0" width="100%" style="padding-bottom:40px;text-align:left">
                    @if ($data['is_admin'] == 1)
                    <tbody>
                        <tr>
                            <td class="left" colspan="2">To <b>Tiresstudio.com</b>,</td>
                        </tr>
                        <tr>
                            <td class="left" colspan="2"><br></td>
                        </tr>
                        <tr>
                            <th>Subject:</th>
                            <td>{{$data['data']['subject']}}</td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{$data['data']['name']}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$data['data']['email']}}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{$data['data']['phone']}}</td>
                        </tr>
                        <tr>
                            <th>Message:</th>
                            <td>{{$data['data']['message']}}</td>
                        </tr>
                    </tbody>

                    @else

                    <tbody>
                        <tr>
                            <td class="left">Dear <b>{{$data['data']['name']}}</b>,</td>
                        </tr>
                        <tr>
                            <td class="left">Thankyou, Your inquiry have been sent successfully. We will contact you as
                                soon as possible</td>
                        </tr>
                    </tbody>

                    @endif
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
