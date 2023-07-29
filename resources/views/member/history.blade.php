@extends('layouts.template')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>History</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>History Pembelian</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">No</th>
                                        <th class="column-title">Pembayaran</th>
                                        <th class="column-title">Status</th>
                                        <th class="column-title">Tanggal</th>
                                        <th class="column-title">Nama Kasir</th>
                                        <th class="column-title">Nama Member</th>
                                        <th class="column-title">Total</th>
                                        <th class="column-title">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataTransaksi as $key => $data)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="">
                                                @if($data->payment_method== '1')
                                                    Piutang
                                                @else
                                                    Cash
                                                @endif
                                            </td>
                                            <td class="">
                                                @if($data->status== '1')
                                                    Approve
                                                @elseif($data->status== '2')
                                                    Cash
                                                @endif
                                            </td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->cashier->name}}</td>
                                            <td>{{ $data->member->name?? 'Non Member'}}</td>
                                            <td>Rp {{number_format($data->total,0,',','.')}}</td>
                                            <td>
                                                <a href="{{ route('member.history.view',[$data['id']]) }}">
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
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
