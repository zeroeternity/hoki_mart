@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')

    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Pembelian</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form pembelian </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{ route('purchase.create') }}">
                                        <button type="button" class="btn btn-info">
                                <li class="fa fa-plus"></li>&nbsp;Form Pembelian</button></a>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                               required="required"
                                               type="text" onfocus="this.type='date'" onmouseover="this.type='date'"
                                               onclick="this.type='date'"
                                               onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                               required="required"
                                               type="text" onfocus="this.type='date'" onmouseover="this.type='date'"
                                               onclick="this.type='date'"
                                               onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" " role="main">
                <div class="x_panel">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><small>Pembelian Sebelumnya</small></h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">No Faktur</th>
                            <th class="column-title">Tanggal</th>
                            <th class="column-title">Nama Supplier</th>
                            <th class="column-title">Nama Kasir</th>
                            <th class="column-title">Total Item</th>
                            <th class="column-title">Total Harga</th>
                            <th class="column-title">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataPurchase as $data)
                            <tr class="">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->invoice_number }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->supplier->name }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->purchaseItem->count() }}</td>
                                <td>Rp {{number_format($data->total,0,',','.')}}</td>
                                <td>
                                    <a href="{{ route('purchase.view',[$data->id]) }}">
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
