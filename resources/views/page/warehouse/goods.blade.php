@extends('layouts.template')
@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Daftar Barang</h2>
    <ul class="nav navbar-right panel_toolbox">

    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">

    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
          aria-selected="true">Daftar Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="unit-tab" data-toggle="tab" href="#unit" role="tab" aria-controls="unit"
          aria-selected="false">Satuan Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="group-tab" data-toggle="tab" href="#group" role="tab" aria-controls="group"
          aria-selected="false">Group Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="type-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type"
          aria-selected="false">Jenis Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="voucher-tab" data-toggle="tab" href="#voucher" role="tab" aria-controls="voucher"
          aria-selected="false">Barang Voucher</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="home-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Data Anggota</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Anggota</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No</th>
                  <th class="column-title">Kode Barang</th>
                  <th class="column-title">Nama Barang</th>
                  <th class="column-title">Group Barang</th>
                  <th class="column-title">Jenis</th>
                  <th class="column-title">Satuan</th>
                  <th class="column-title">Harga Beli</th>
                  <th class="column-title">Harga Jual</th>
                  <th class="column-title">Stock Minimum</th>
                  <th class="column-title">Margin Karyawan</th>
                  <th class="column-title">Persen Non Margin</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="unit" role="tabpanel" aria-labelledby="unit-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Satuan Barang</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Satuan Barang</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No</th>
                  <th class="column-title">Satuan</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="group" role="tabpanel" aria-labelledby="group-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Group Barang</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Group Barang</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No</th>
                  <th class="column-title">Kode</th>
                  <th class="column-title">Nama group</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>jenis Barang</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add jenis Barang</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">Jenis</th>
                  <th class="column-title">Persen</th>
                  <th class="column-title">PPN Beli</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="voucher" role="tabpanel" aria-labelledby="voucher-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Barang Voucher</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Barang Voucher</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">Kode Barang</th>
                  <th class="column-title">Nama Barang</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
