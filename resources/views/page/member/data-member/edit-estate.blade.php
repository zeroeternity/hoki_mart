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
                        <h2>Edit Estate</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('member',['#estate']) }}">Data Estate</a></li>
                            <li class="breadcrumb-item active">Edit Estate</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('estate.update') }}" method="post" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kode
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Estate
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control
                                    @error('estate')
                                            is-invalid
                                        @enderror" value="{{ $estate }}" required="required" name="estate">
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