@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data Outlet</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <form action="{{ route('outlet.store') }}" method="post" enctype="multipart/form-data">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @csrf
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Data Outlet</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Outlet
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" required="required" name="name">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">location
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" required="required" name="location">
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Data Outlet</h2>
                    </div>
                    <div class="title_right">
                    </div>
                </div>
                <div class="clearfix"></div>
                <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Outlet</th>
                            <th class="column-title">Address</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataOutlet as $key => $outlet)
                        <tr class="">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $outlet->name }}</td>
                            <td>{{ $outlet->location }}</td>
                            <td>
                                <form action="{{ route('outlet.destroy', $outlet->id) }}" method="POST">
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

@endsection