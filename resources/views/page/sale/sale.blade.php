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

            <div class=" " role="main">
                <div class="x_panel">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><small>Penjualan Sebelumnya</small></h3>
                        </div>
{{--                        <div class="title_right">--}}
{{--                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search for...">--}}
{{--                                    <span class="input-group-btn">--}}
{{--                                      <button class="btn btn-secondary" type="button">Go!</button>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
                        @foreach($dataSale as $key => $data)
                            <tr class="">
                                <td>{{ $loop->iteration }}</td>
                                <td class="">
                                    @if($data->payment_method== '1')
                                        Piutang
                                    @else
                                        Cash
                                    @endif
                                </td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->cashier->name}}</td>
                                <td>{{ $data->member->name?? 'Non Member'}}</td>
                                <td>Rp {{number_format($data->total,0,',','.')}}</td>
                                <td>
                                    <a href="{{ route('sale.view',[$data['id']]) }}">
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
