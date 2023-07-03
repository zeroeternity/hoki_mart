@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data Unit</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <form action="{{ route('unit.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Data Unit</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Unit
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" required="required" name="name">
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
                        <h2>Data Unit</h2>
                    </div>

                    <div class="title_right">

                    </div>
                </div>
                <div class="clearfix"></div>
                <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Unit</th>
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
</div>



@endsection