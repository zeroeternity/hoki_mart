<!DOCTYPE html>
<html>
<head>
    <style>
        @page  {
            margin-top: 5px;
            margin-left: 5px;
            margin-right: 5px;
        }
        h1{
            font-weight:bold;
            font-family: "Lucida Console";
            font-size: 6px;
        }
        p{
            font-family: "Lucida Console";
            font-size: 5px;
        }
        th{
            font-weight:bold;
            font-family: "Lucida Console";
            font-size: 5px;
        }
        td{
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
<img src="{{ asset('images/hoki-black.png') }}" class="center">
<h1>Date</h1>
<p>-------------------------------------------------------------------------------------</p>
<table>
    <tr style="width:100%">
        <th style="width:65%">Nama Barang</th>
        <th style="width:5%">Jml</th>
        <th style="width:15%">Harga</th>
        <th style="width:15%">Total</th>
    </tr>
    <tr>
        <td>Beras Kita 20 Kg</td>
        <td align="center">1</td>
        <td align="right">120000</td>
        <td align="right">120000</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3">-----------------------------</td>
    </tr>
    <tr>
        <td colspan="3" align="right">Sub Total</td>
        <td align="right">120000</td>
    </tr>
    <tr>
        <td colspan="3" align="right">Voucher</td>
        <td align="right">0</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3">-----------------------------</td>
    </tr>
    <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">120000</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3">-----------------------------</td>
    </tr>
</table>
<p>-------------------------------------------------------------------------------------</p>

</body>
<script type="text/javascript">
    window.print();
</script>
</html>
