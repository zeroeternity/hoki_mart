@extends('layouts.template')
@section('content')


    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>History Pembelian</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>History Pembelian</h2>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('member.history') }}">History</a></li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">No</th>
                                <th class="column-title">Kode Barang</th>
                                <th class="column-title">Nama Barang</th>
                                <th class="column-title">Jumlah</th>
                                <th class="column-title">Harga</th>
                                <th class="column-title">Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data->saleItem as $ta)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ta->outletItem->item->code}}</td>
                                    <td>{{$ta->outletItem->item->name}}</td>
                                    <td>{{$ta->qty}}</td>
                                    <td>Rp {{number_format($ta->sale_price,0,',','.')}}</td>
                                    <td>Rp {{number_format($ta->subtotal,0,',','.')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <thead>
                            <tr class="headings">
                                <th colspan="6">Total : Rp {{number_format($data->total,0,',','.')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
