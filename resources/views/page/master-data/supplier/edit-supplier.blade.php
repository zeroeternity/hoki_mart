@extends('layouts.template')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Supplier</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Supplier</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('supplier') }}">Data Supplier</a></li>
                            <li class="breadcrumb-item active">Edit Supplier</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('supplier.update') }}" method="post" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Code
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('code')
                                    is-invalid
                                @enderror" value="{{ $code }}" required="required" name="code">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Address
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <textarea class="form-control
                                    @error('address')
                                    is-invalid
                                @enderror" rows="3" placeholder="" name="address">{{ $address }}</textarea>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                    Rekening
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('account_number')
                                    is-invalid
                                @enderror" value="{{ $account_number }}" required="required" name="account_number">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pemilik
                                    Rekening
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('account_owner')
                                    is-invalid
                                @enderror" value="{{ $account_owner }}" required="required" name="account_owner">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Bank
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('bank_name')
                                    is-invalid
                                @enderror" value="{{ $bank_name }}" required="required" name="bank_name">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">NPWP
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('npwp')
                                    is-invalid
                                @enderror" value="{{ $npwp }}" required="required" name="npwp">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                    Telepon
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('telephone')
                                    is-invalid
                                @enderror" value="{{ $telephone }}" required="required" name="telephone">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Email
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="email" class="form-control
                                    @error('email')
                                    is-invalid
                                @enderror" value="{{ $email }}" required="required" name="email">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status
                                    Aktifasi Akun
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select name="state" class="custom-select" id="state">
                                        <option value="1" @php if($state=="1" ){echo "selected" ;} @endphp>Aktif
                                        </option>
                                        <option value="0" @php if($state=="0" ){echo "selected" ;} @endphp>Tidak Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success" id="submit-btn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        Update
                                    </button>
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
