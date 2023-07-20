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
          aria-selected="false">Jenis PPN & Non PPN</a>
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
                <h2>Data Barang</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('item.create') }}"><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Barang</button></a>
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
                  <th class="column-title">Persen Non Margin</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataItem as $key => $item)
                <tr class="">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['code'] }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $item['group']['name'] }}</td>
                  <td>{{ $item['ppn_type']['type'] }}</td>
                  <td>{{ $item['unit']['name'] }}</td>
                  <td>{{ $item['purchase_item']['purchase_price'] ?? 0}}</td>
                  <td>{{ $item['selling_price'] }}</td>
                  <td>{{ $item['minimum_stock'] }}</td>
                  <td>{{ $item['percent_non_margin'] }}</td>
                  <td>
                    <a href="{{ route('item.edit',[$item['id']]) }}">
                      <button type="button" class="btn btn-info">
                        <li class="fa fa-edit"></li>
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
                    <li><a href="{{ route('unit') }}"><button type="button" class="btn btn-info">
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
                @foreach($dataUnit as $key => $unit)
                <tr class="">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $unit->name }}</td>
                  <td>
                    <form action="{{ route('unit.destroy', $unit->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-success">
                        <li class="fa fa-trash"></li>&nbsp;Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
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
                    <li><a href="{{ route('group') }}"><button type="button" class="btn btn-info">
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
                @foreach($dataGroup as $key => $group)
                <tr class="">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $group->code }}</td>
                  <td>{{ $group->name }}</td>
                  <td>
                    <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-success">
                        <li class="fa fa-trash"></li>&nbsp;Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
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
                <h2>Jenis PPN & Non PPN</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('ppn') }}"><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Jenis PPN & Non PPN</button></a>
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
                  <th class="column-title">Jenis</th>
                  <th class="column-title">Persen</th>
                  <th class="column-title">PPN Beli</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataPPN as $key => $ppn)
                <tr class="">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $ppn->type }}</td>
                  <td>{{ $ppn->percent }}</td>
                  <td>{{ $ppn->ppn_buy }}</td>
                  <td>
                    <form action="{{ route('ppn.destroy', $ppn->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-success">
                        <li class="fa fa-trash"></li>&nbsp;Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
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
                    <li><a href="{{ route('voucher') }}"><button type="button" class="btn btn-info">
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
                  <th class="column-title">No</th>
                  <th class="column-title">Kode Barang</th>
                  <th class="column-title">Nama Barang</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataVoucher as $key => $voucher)
                <tr class="">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $voucher->code }}</td>
                  <td>{{ $voucher->name }}</td>
                  <td>
                    <form action="{{ route('voucher.destroy', $voucher->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-success">
                        <li class="fa fa-trash"></li>&nbsp;Delete
                      </button>
                    </form>
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

@endsection