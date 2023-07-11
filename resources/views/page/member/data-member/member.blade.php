@extends('layouts.template')
@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Daftar Anggota</h2>
    <ul class="nav navbar-right panel_toolbox">

    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">

    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
          aria-selected="true">Data Anggota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type"
          aria-selected="false">Jenis Anggota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="position-tab" data-toggle="tab" href="#position" role="tab" aria-controls="position"
          aria-selected="false">Jabatan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="import-voucher-tab" data-toggle="tab" href="#import-voucher" role="tab"
          aria-controls="import-voucher" aria-selected="false">Import Voucher Beras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="import-tab" data-toggle="tab" href="#import" role="tab" aria-controls="import"
          aria-selected="false">Import Data Anggota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="saving-tab" data-toggle="tab" href="#saving" role="tab" aria-controls="saving"
          aria-selected="false">Import Simpanan Wajib</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="shu-tab" data-toggle="tab" href="#shu" role="tab" aria-controls="shu"
          aria-selected="false">Pembagian SHU </a>
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
                    <li><a href="{{ route('member.create.data') }}"><button type="button" class="btn btn-info">
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
                  <th class="column-title">Jenis Anggota</th>
                  <th class="column-title">Estate</th>
                  <th class="column-title">Nama Anggota</th>
                  <th class="column-title">No KTP</th>
                  <th class="column-title">Jabatan</th>
                  <th class="column-title">Tanggal Lahir</th>
                  <th class="column-title">Gender</th>
                  <th class="column-title">Tanggal Masuk</th>
                  <th class="column-title">Status</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataMember as $key => $member)
                <tr class="">
                  <td class=" ">{{ $loop->iteration }}</td>
                  <td class=" ">{{ $member->memberType->type }} </td>
                  <td class=" ">{{ $member->estate->estate }} </td>
                  <td class=" ">{{ $member->name }}</td>
                  <td class=" ">{{ $member->ktp }}</td>
                  <td class=" ">{{ $member->position->name }}</td>
                  <td class=" ">{{ $member->birthdate }}</td>
                  <td class=" ">{{ $member->gender }}</td>
                  <td class=" ">{{ $member->entry_date }}</td>
                  <td class="">
                    @if($member->state== '1')
                    Aktif
                    @else
                    Non Aktif
                    @endif
                  </td>
                  <td class=" last">
                    <a href="{{ route('supplier.edit',[$member->id]) }}">
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
      <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="profile-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Jenis Anggota</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('member.create.type') }}"><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Jenis Anggota</button></a>
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
                  <th class="column-title">Kredit Limit</th>
                  <th class="column-title">Margin</th>
                  <th class="column-title">Range Tanggal</th>
                  <th class="column-title">S/D</th>
                  <th class="column-title">Status</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataMemberType as $key => $memberType)
                <tr class="">
                  <td class=" ">{{ $loop->iteration }}</td>
                  <td class=" ">{{ $memberType->type }}</td>
                  <td class=" ">{{ $memberType->credit_limit }}</td>
                  <td class=" ">{{ $memberType->margin }}</td>
                  <td class=" ">{{ $memberType->range_date }}</td>
                  <td class=" ">{{ $memberType->up_to }}</td>
                  <td class="">
                    @if($memberType->state== '1')
                    SHU
                    @else
                    Non SHU
                    @endif
                  </td>
                  <td class=" last">
                    <a href="{{ route('supplier.edit',[$memberType->id]) }}">
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
      <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Jabatan</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('member.create.position') }}"><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Jabatan</button></a>
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
                  <th class="column-title">Jabatan</th>
                  <th class="column-title">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataPosition as $key => $position)
                <tr class="">
                  <td class=" ">{{ $loop->iteration }}</td>
                  <td class=" ">{{ $position->name }}</td>
                  <td class=" last">
                    <a href="{{ route('supplier.edit',[$position->id]) }}">
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
      <div class="tab-pane fade" id="import-voucher" role="tabpanel" aria-labelledby="import-voucher-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Import Voucher Beras</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Import Voucher Beras</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No.Register</th>
                  <th class="column-title">Nama karyawan</th>
                  <th class="column-title">Estate/OU</th>
                  <th class="column-title">Tangungan</th>
                  <th class="column-title">KG</th>
                  <th class="column-title">Rupiah</th>
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
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="import" role="tabpanel" aria-labelledby="import-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Import Data Anggota</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Import Data Anggota</button></a>
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
                  <th class="column-title">Jenis Anggota</th>
                  <th class="column-title">Estate</th>
                  <th class="column-title">Nama Anggota</th>
                  <th class="column-title">No KTP</th>
                  <th class="column-title">Jabatan</th>
                  <th class="column-title">Tanggal Lahir</th>
                  <th class="column-title">Gender</th>
                  <th class="column-title">Tanggal Masuk</th>
                  <th class="column-title">Status</th>
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
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="saving" role="tabpanel" aria-labelledby="saving-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Import Simpanan Wajib</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Import Simpanan Wajib</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No.Register</th>
                  <th class="column-title">Nama Karyawan</th>
                  <th class="column-title">Estate/OU</th>
                  <th class="column-title">Simpanan Wajib</th>
                  <th class="column-title">Simpanan Sukarela</th>
                  <th class="column-title">Total</th>
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
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="shu" role="tabpanel" aria-labelledby="shu-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Pembagian SHU</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
                    <li class="fa fa-plus"></li>&nbsp; Add Pembagian SHU</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">Tahun</th>
                  <th class="column-title">Waserda Dana Cadangan</th>
                  <th class="column-title">Waserda Dana Sosial</th>
                  <th class="column-title">Waserda Dana Pendidikan</th>
                  <th class="column-title">Waserda Dana Pengurus</th>
                  <th class="column-title">Waserda Dana Pengawas</th>
                  <th class="column-title">Waserda Dana Karyawan</th>
                  <th class="column-title">Waserda Jasa Usaha</th>
                  <th class="column-title">Upkeep Dana Cadangan</th>
                  <th class="column-title">Upkeep Dana Sosial</th>
                  <th class="column-title">Upkeep Dana Pendidikan</th>
                  <th class="column-title">Upkeep Dana Pengurus</th>
                  <th class="column-title">Upkeep Dana Pengawas</th>
                  <th class="column-title">Upkeep Dana Karyawan</th>
                  <th class="column-title">Upkeep Jasa Usaha</th>
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
    </div>
  </div>
</div>

@endsection