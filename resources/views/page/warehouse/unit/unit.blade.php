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
                            <h2>Form Data Unit</h2>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('item') }}">Data Unit</a></li>
                                <li class="breadcrumb-item active">Tambah Data Unit</li>
                            </ol>
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
                                    <button type="submit" class="btn btn-success" id="submit-btn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
