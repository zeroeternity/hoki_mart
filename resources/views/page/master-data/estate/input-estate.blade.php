@extends('layouts.template')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Estate</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Estate</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('estate') }}">Data Estate</a></li>
                            <li class="breadcrumb-item active">Tambah Estate</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('estate.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kode
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" required="required" name="code">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Estate
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" required="required" name="estate">
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection