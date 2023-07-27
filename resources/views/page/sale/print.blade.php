<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            margin-top: 5px;
            margin-left: 5px;
            margin-right: 5px;
        }

        h1 {
            font-weight: bold;
            font-family: "Lucida Console";
            font-size: 6px;
        }

        p {
            font-family: "Lucida Console";
            font-size: 5px;
        }

        th {
            font-weight: bold;
            font-family: "Lucida Console";
            font-size: 5px;
        }

        td {
            font-family: "Lucida Console";
            font-size: 5px;
        }

        img {
            max-width: 20%;
            height: auto;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        @media print {
            @page {
                size: 75mm;
            }
        }
    </style>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/hoki-ico.png') }}">
    <title>Cetak Struk</title>
</head>
<body>
<center>
    <img src="{{ asset('images/hoki-black.png') }}" class="center">
    <br>
    <p>Tanggal Transaksi: {{ $created_at }}</p>
    <p>-------------------------------------------------------------------------------------</p>
    <table>

        <tr style="width:100%">
            <th style="width:65%">Nama Barang</th>
            <th style="width:5%">Jml</th>
            <th style="width:15%">Harga</th>
            <th style="width:15%">Total</th>
        </tr>
        @foreach($sale_item as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td align="center">{{ $item->pivot->qty }}</td>
                <td align="right">{{ $item->pivot->sale_price }}</td>
                <td align="right">{{$item->pivot->total}}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="3">-----------------------------</td>
        </tr>
        <tr>
            <td colspan="3" align="right">Sub Total</td>
            <td align="right">{{$total}}</td>
        </tr>
        <tr>
            <td colspan="3" align="right">Voucher</td>
            <td align="right">{{$voucher}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">-----------------------------</td>
        </tr>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">{{$subtotal}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">-----------------------------</td>
        </tr>
    </table>
    <p>-------------------------------------------------------------------------------------</p>

</center>

</body>
<script type="text/javascript">
    window.print();
</script>
</html>
