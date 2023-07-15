@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar User</h3>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Data Admin dan Kasir</h2>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="{{ route('user-account.create') }}"><button type="button"
                                            class="btn btn-info">
                                <li class="fa fa-plus"></li>&nbsp; Add User</button></a>
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
                            <th class="column-title">Nama</th>
                            <th class="column-title">Outlet</th>
                            <th class="column-title">Role</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dataUser as $key => $user)
                        <tr class="">
                            <td class=" ">{{ $loop->iteration }}</td>
                            <td class=" ">{{ $user->name }} </td>
                            <td class=" ">{{ $user->outlet->name }} </td>
                            <td class=" ">{{ $user->role->name }} </td>
                            <td class=" last">
                                <a href="{{ route('user-account.edit',[$user->id]) }}">
                                    <button type="button" class="btn btn-info">
                                        <li class="fa fa-edit"> Edit</li>
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