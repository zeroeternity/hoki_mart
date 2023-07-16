@extends('layouts.template')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Anggota</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Data Anggota</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('member',['#type']) }}">Data Data Anggota</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Data Anggota</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('member.update.data') }}" method="post" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Anggota
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                        name="member_type_id">
                                        @foreach($dataMemberType as $key => $memberType)
                                        <option value="{{ $memberType->id }}" {{ $memberType->id == $member_type_id ?
                                            'selected' : '' }}>{{ $memberType->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Estate
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="estate_id">
                                        @foreach($dataEstate as $key => $estate)
                                        <option value="{{ $estate->id }}" {{ $estate->id == $estate_id ?
                                            'selected' : '' }}>{{ $estate->estate }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('name')
                                    is-invalid
                                @enderror" value="{{ $name }}" required="required" name="name">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Email
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('email')
                                    is-invalid
                                @enderror" value="{{ $email }}" required="required" name="email">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Telephone
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('phone')
                                    is-invalid
                                @enderror" value="{{ $phone }}" required="required" name="phone">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">KTP
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                        @error('ktp')
                                        is-invalid
                                    @enderror" value="{{ $ktp }}" data-inputmask="'mask' : '9999-9999-9999-9999'"
                                        name="ktp">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="gender">
                                        <option value="Laki-Laki" @php if($state=="Laki-Laki" ){echo "selected" ;}
                                            @endphp>Laki-Laki
                                        </option>
                                        <option value="Perempuan" @php if($state=="Perempuan" ){echo "selected" ;}
                                            @endphp>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="date" class="form-control
                                    @error('birthdate')
                                    is-invalid
                                @enderror" value="{{ $birthdate }}" required="required" name="birthdate">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Position
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                        name="position_id">
                                        @foreach($dataPosition as $key => $position)
                                        <option value="{{ $position->id }}" {{ $position->id == $position_id ?
                                            'selected' : '' }}>{{ $position->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="date" class="form-control
                                    @error('entry_date')
                                    is-invalid
                                @enderror" value="{{ $entry_date }}" required="required" name="entry_date">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status
                                    Aktifasi Akun
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select name="state" class="custom-select" id="state">
                                        <option @php if($state=="1" ){echo "selected" ;} @endphp>Aktif</option>
                                        <option @php if($state=="0" ){echo "selected" ;} @endphp>Tidak Aktif</option>
                                    </select>
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