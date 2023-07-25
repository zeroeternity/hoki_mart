@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')

    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Penjualan</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Penjualan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{ route('sale.create') }}">
                                    <button type="button" class="btn btn-info">
                                        <li class="fa fa-plus"></li>&nbsp;Form penjualan
                                    </button>
                                </a>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                               required="required" type="text" onfocus="this.type='date'"
                                               onmouseover="this.type='date'" onclick="this.type='date'"
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
                                               required="required" type="text" onfocus="this.type='date'"
                                               onmouseover="this.type='date'" onclick="this.type='date'"
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
            <div class="x_panel">
                <div class="x_title">
                    <h2>History Kunjungan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">No</th>
                                        <th class="column-title">Nama Barang</th>
                                        <th class="column-title">Nama Member</th>
                                        <th class="column-title">Total Pembelian</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataSale as $key => $data)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->cashier_id}}</td>
                                            <td>{{ $data->member_id}}</td>
                                            @foreach($dataSaleItem as $key => $data)
                                            @endforeach
                                            <td>{{ $totalAmount = $data->groupBy('sale_id')->sum('sale_price')}}</td>
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

@endsection
