@extends('layouts.template')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Jabatan</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Jabatan</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('member',['#position']) }}">Data Jabatan</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Jabatan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('member.update.position') }}" method="post"
                            enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('name')
                                    is-invalid
                                @enderror" value="{{ $name }}" required="required" name="name">
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