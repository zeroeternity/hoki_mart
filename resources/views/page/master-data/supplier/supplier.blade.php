@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data Supplier</h3>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Data Supplier</h2>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="{{ route('supplier.create') }}"><button type="button" class="btn btn-info">
                                <li class="fa fa-plus"></li>&nbsp; Add Supplier</button></a>
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
                            <th class="column-title">Code</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Alamat</th>
                            <th class="column-title">No Rekening</th>
                            <th class="column-title">Nama Pemilik Rekening</th>
                            <th class="column-title">Nama Bank</th>
                            <th class="column-title">NPWP</th>
                            <th class="column-title">No Telepon</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Status</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dataSupplier as $key => $supplier)
                        <tr class="">
                            <td class=" ">{{ $loop->iteration }}</td>
                            <td class=" ">{{ $supplier->code }} </td>
                            <td class=" ">{{ $supplier->name }} </td>
                            <td class=" ">{{ $supplier->address }}</td>
                            <td class=" ">{{ $supplier->account_number }}</td>
                            <td class=" ">{{ $supplier->account_owner }}</td>
                            <td class=" ">{{ $supplier->bank_name }}</td>
                            <td class=" ">{{ $supplier->npwp }}</td>
                            <td class=" ">{{ $supplier->telephone }}</td>
                            <td class="">{{ $supplier->email }}</td>
                            <td class="">
                                @if($supplier->state== '1')
                                Aktif
                                @else
                                Non Aktif
                                @endif
                            </td>
                            <td class=" last"><a href=""><button type="button" class="btn btn-info">
                                        <li class="fa fa-edit"></li>
                                    </button></a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection