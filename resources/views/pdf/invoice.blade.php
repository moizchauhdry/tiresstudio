<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #{{$data['order']->id}} </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        h5,
        table,
        th,
        td {
            font-family: 'Archivo Narrow', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            vertical-align: top;
            border: 1px solid #8a8a8a;
            /* border-collapse: collapse; */
            padding: 0.3em;
            caption-side: bottom;
            font-size: 9px;
            text-wrap: inherit;
        }

        th {
            font-weight: bolder;
            text-align: center;
        }



        caption {
            padding: 0.3em;
        }
    </style>
</head>

<body>
    <h5 style="text-align:center;"> ORDER INVOICE </h5>
    <table style="margin-bottom: 30px;">
        <tr>
            <td style="padding: 5px" width="50%">
                <strong>SHIP TO</strong> : <br> <br>
                <strong>Contact Name</strong> : {{ $data['address']->name}}<br>
                <strong>Phone No.</strong> : {{ $data['address']->phone}}<br>
                <strong>Email</strong> : {{ $data['address']->email}}<br>
                <strong>Address</strong> : {{ $data['address']->address_1}}, {{ $data['address']->address_2}}
                {{$data['address']->city }},State, 12345, {{$data['address']->country }}
            </td>
            <td style="padding: 5px" width="50%">
                <strong>Order Date</strong> : {{ $data['order']->created_at }} <br> <br>
                <strong>Tracking No.</strong>: {{ $data['order']->tracking_id}} <br>
                <strong>Invoice No.</strong> : {{$data['order']->id}}
            </td>
        </tr>
    </table>
    <table style="width:100%;" style="margin-top:5px;">
        <tr>
            <td colspan="4" style="text-align: center;">
                <h3>Order Items</h3>
            </td>
        </tr>
        <tr class="header-row">
            <th><strong>Product</strong></th>
            <th><strong>Price per Unit (USD)</strong></th>
            <th><strong>No. of Units</strong></th>
            <th><strong>Total Value(USD)</strong></th>
        </tr>

        @foreach($data['order']->items as $item)
        <tr>
            <td style="text-align: center;">{{getProductName($item->product_id)}} <br> {{$item->product->title}}</td>
            <td style="text-align: center;">{{ $item->product->getPriceAttribute()}}</td>
            <td style="text-align: center;">x {{ $item->quantity}}</td>
            <td style="text-align: center;">{{ $item->product->getPriceAttribute() * $item->quantity}}</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="2"><strong>Total Number items</strong>: {{ $data['order']->items->count()}}</td>
            <td colspan="1"><strong>Sub Total</strong></td>
            <td colspan="1">${{ $data['order']->gross_total}}</td>
        </tr>

        <tr>
            <td colspan="2"></td>
            <td colspan="1"><strong>Total</strong></td>
            <td colspan="1">${{ $data['order']->net_total}}</td>
        </tr>

        <tr style="height:80px;">
            <td colspan="2">These comodities, technology
                or software, were exported from us in accordance with exports administration regulations.
                Diversion contrary to US law is prohebited. I admit that all information contained in this invoice are
                true and correct.
            </td>
            <td colspan="1"> <strong>Currency Code</strong></td>
            <td colspan="1"> USD</td>
        </tr>

        <tr>
            <td colspan="4" style="height:40px; padding: 10px;">
                <strong>Signature:</strong>
            </td>
        </tr>
    </table>
</body>

</html>
