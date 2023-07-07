@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data Estate</h3>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Data Estate</h2>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="{{ route('estate.create') }}"><button type="button" class="btn btn-info">
                                <li class="fa fa-plus"></li>&nbsp; Add Estate</button></a>
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
                            <th class="column-title">Estate</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dataEstate as $key => $estate)
                        <tr class="">
                            <td class=" ">{{ $loop->iteration }}</td>
                            <td class=" ">{{ $estate->code }} </td>
                            <td class=" ">{{ $estate->estate }}</td>
                            <td class=" last"><a href="{{ route('estate.edit',[$estate->id]) }}"><button type="button"
                                        class="btn btn-info">
                                        <li class="fa fa-edit"></li>&nbsp;Edit
                                    </button></a>
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