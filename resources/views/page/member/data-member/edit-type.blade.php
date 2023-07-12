@extends('layouts.template')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Jenis Anggota</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Jenis Anggota</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('member',['#type']) }}">Data Jenis Anggota</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Jenis Anggota</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('member.update.type') }}" method="post" enctype="multipart/form-data">
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
                            @method('PUT')
                            <input type="text" class="form-control 
                                        @error('id')
                                            is-invalid
                                        @enderror" value="{{ $id }}" name="id" id="id" readonly hidden />
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status SHU
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="state">
                                        <option value="1" @php if($state=="1" ){echo "selected" ;} @endphp>SHU</option>
                                        <option value="0" @php if($state=="0" ){echo "selected" ;} @endphp>Non SHU
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('type')
                                    is-invalid
                                @enderror" value="{{ $type }}" required="required" name="type">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kredit Limit
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('credit_limit')
                                    is-invalid
                                @enderror" value="{{ $credit_limit }}" required="required" id="rupiah"
                                        name="credit_limit">
                                    <span class="form-control-feedback right" aria-hidden="true">Rp</span>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Margin
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" step="any" class="form-control
                                    @error('margin')
                                    is-invalid
                                @enderror" value="{{ $margin }}" required="required" name="margin">
                                    <span class="form-control-feedback right" aria-hidden="true">%</span>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Range Tanggal
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('range_date')
                                    is-invalid
                                @enderror" value="{{ $range_date }}" required="required" name="range_date">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">S/D
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('up_to')
                                    is-invalid
                                @enderror" value="{{ $up_to }}" required="required" name="up_to">
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Update</button>
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