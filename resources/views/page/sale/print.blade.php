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
    @if($status == 1)
        <img src="{{ asset('images/hoki-black.png') }}" class="center">
        <p class="center">{{ $outlet_address }} <br> {{ $outlet_phone }}</p>
        <p>Jenis Transaksi :
            @if( $payment_method == 0)
                Cash
            @elseif( $payment_method == 1)
                Piutang
            @elseif( $payment_method == 2)
                Voucher
            @endif
        </p>
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
                    <td align="right">{{ number_format ($item->pivot->sale_price,0,',','.') }}</td>
                    <td align="right">{{ number_format ($item->pivot->total,0,',','.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td colspan="3">-----------------------------</td>
            </tr>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">{{number_format ($total,0,',','.') }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">-----------------------------</td>
            </tr>
        </table>
        <p>-------------------------------------------------------------------------------------</p>
        <p>Cashier: {{ $cashier }}</p>
        <p>TERIMA KASIH</p>
    @elseif($status == 0)
        <p>Menunggu Validasi Member</p>
    @elseif($status == 2)
        <p>Transaksi Ditolak Member</p>
    @endif


</center>

</body>
<script type="text/javascript">
    window.print();
</script>
</html>
