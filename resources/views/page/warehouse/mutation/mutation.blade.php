@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')

<div class="" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Mutasi</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Mutasi <small>Nama / id outlet</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a href="{{ route('mutation.create') }}"><button type="button" class="btn btn-info">Form
                    mutasi</button></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group row">
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required"
                    type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                    onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <script>
                    function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                  </script>
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                  <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required"
                    type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                    onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <script>
                    function timeFunctionLong(input) {
                                            setTimeout(function() {
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
            <h3><small>Mutasi yang dilakukan</small></h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr class="headings">
                <th class="column-title">No</th>
                <th class="column-title">Nama Barang</th>
                <th class="column-title">Dikirim dari outlet</th>
                <th class="column-title">Diterima di outlet</th>
                <th class="column-title">Sebanyak</th>
                <th class="column-title">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dataMutation as $key => $data)
              <tr class="">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->outlet_item->item->name }}</td>
                <td>{{ $data->outlet_item->outlet->name  }}</td>
                <td>{{ $data->outlet_item->outlet->name }}</td>
                <td>{{ $data->qty}}</td>
                <td>
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
</div>

@endsection
