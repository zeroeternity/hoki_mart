@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')

    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Penjualan Voucher</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-3">
                <ul class="nav navbar-right panel_toolbox">
                    <a href="{{ route('voucher-sale.create') }}">
                        <button type="button" class="btn btn-info">
                            <li class="fa fa-plus"></li>&nbsp;Form penjualan
                        </button>
                    </a>
                </ul>
            </div>
            <div class=" " role="main">
                <div class="x_panel">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><small>Daftar Transaksi Penjualan Voucher</small></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Pembayaran</th>
                            <th class="column-title">Tanggal</th>
                            <th class="column-title">Nama Kasir</th>
                            <th class="column-title">Nama Member</th>
                            <th class="column-title">Total</th>
                            <th class="column-title">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataSale as $key => $data)
                            <tr class="">
                                <td>{{ $loop->iteration }}</td>
                                <td class="">
                                    @if ($data->payment_method == '2')
                                        Voucher
                                    @elseif($data->payment_method == '1')
                                        Piutang
                                    @else
                                        Cash
                                    @endif
                                </td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->cashier->name }}</td>
                                <td>{{ $data->member->name ?? 'Non Member' }}</td>
                                <td>Rp {{ number_format($data->totalVoucher, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('voucher-sale.view', [$data['id']]) }}">
                                        <button type="button" class="btn btn-info">
                                            <li class="fa fa-eye"></li>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
