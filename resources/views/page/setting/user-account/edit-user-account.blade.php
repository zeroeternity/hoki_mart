@extends('layouts.template')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit User</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('user-account') }}">Data User</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('user-account.update') }}" method="post" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Role
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="role_id">
                                        <option value=""></option>
                                        @foreach($dataRole as $key => $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $role_id ?
                                            'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Outlet
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="outlet_id">
                                        <option value=""></option>
                                        @foreach($dataOutlet as $key => $outlet)
                                        <option value="{{ $outlet->id }}" {{ $outlet->id == $outlet_id ?
                                            'selected' : '' }}>{{ $outlet->name }}</option>
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
                                    <input type="email" class="form-control
                                    @error('email')
                                            is-invalid
                                        @enderror" value="{{ $email }}" required="required" name="email">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                    Telepon
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="number" class="form-control
                                    @error('phone')
                                            is-invalid
                                        @enderror" value="{{ $phone }}" required="required" name="phone">
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