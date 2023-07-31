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

            <div class="col-md-12 col-sm-12 mb-3">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{ route('mutation.create') }}">
                            <button type="button" class="btn btn-info">Form
                                Mutasi
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
            <div class=" " role="main">
                <div class="x_panel">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><small>Mutasi yang dilakukan</small></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">No</th>
                                <th class="column-title">Nama Barang</th>
                                <th class="column-title">Dikirim dari outlet</th>
                                <th class="column-title">Mutasi ke outlet</th>
                                <th class="column-title">Sebanyak</th>
                                <th class="column-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMutation as $key => $data)
                                <tr class="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->outlet_item->item->name }}</td>
                                    <td>{{ $data->outlet_item->outlet->name }}</td>
                                    <td>{{ $data->outlet->name }}</td>
                                    <td>{{ $data->qty }}</td>
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
