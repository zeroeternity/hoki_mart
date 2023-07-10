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
          aria-selected="true">Daftar Anggota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type"
          aria-selected="false">Jenis Anggota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#position" role="tab" aria-controls="position"
          aria-selected="false">Jabatan</a>
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
                    <li><a href=""><button type="button" class="btn btn-info">
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
      <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="contact-tab">
        <div class=" " role="main">
          <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h2>Jabatan</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href=""><button type="button" class="btn btn-info">
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