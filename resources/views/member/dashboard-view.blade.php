@extends('layouts.template')
@section('content')

    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Detail Pembelian</h3>
                </div>
                <div class="title_right">
                    <div class="form-group pull-right">
                        <form id="approved" action="{{ route('member.dashboard.approved', ['id'=> request('id')]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-success" style="width: 120px">
                                <li class="fa fa-check"></li>&nbsp;Approved
                            </button>
                        </form>
                        <form id="reject" action="{{ route('member.dashboard.reject', ['id'=> request('id')]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="width: 120px">
                                <li class="fa fa-close"></li>&nbsp;Reject
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Detail Pembelian</h2>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}">Dashboard</a></li>
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
    <script>
        //rejecr
        var reject = document.getElementById('reject');
        reject.addEventListener('submit', function (event) {
            event.preventDefault();
            if (confirm('Are you sure you want to submit this form?')) {
                reject.submit();
            } else {
            }
        });
        //approved
        var approved = document.getElementById('approved');
        approved.addEventListener('submit', function (event) {
            event.preventDefault();
            if (confirm('Are you sure you want to submit this form?')) {
                approved.submit();
            } else {
            }
        });
    </script>
@endsection
