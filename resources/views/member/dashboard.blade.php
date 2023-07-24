@extends('layouts.template')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="tile_count">
                <div class=" col-sm-6  tile_stats_count">
                    <span class="count_top d-flex justify-content-center"><i class="fa fa-cubes px-2"></i> Jumlah Pembelian</span>
                    <div class="count d-flex justify-content-center"></div>
                </div>
                <div class="col-sm-6  tile_stats_count">
                    <span class="count_top d-flex justify-content-center"><i class="fa fa-table px-2"></i> Jumlah Pembelian Per Bulan</span>
                    <div class="count d-flex justify-content-center"></div>
                </div>
            </div>
            <div class="x_panel">

                <div class="x_title">
                    <h2>Approve Pembelian</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Transaksi</th>
                                        <th>Nama WBP</th>
                                        <th>Blok Kamar</th>
                                        <th>Kasus</th>
                                        <th>Hubungan</th>
                                        <th>Tanggal Penitipan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

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
