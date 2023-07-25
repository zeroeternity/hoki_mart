@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Mutasi</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Mutasi <small>Nama / id outlet</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('mutation.update') }}" method="get" enctype="multipart/form-data">
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="item_id">
                                        <option value=""></option>
                                        @foreach ($dataOutletItem as $outlet_item)
                                        @foreach ($datItem as $data_item)
                                        <option value="{{ $outlet_item->item_id }}" {{ old('item_id') == $outlet_item->id ? "selected" : "" }}></option>
                                            
                                        @endforeach
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('item_id') }}</small>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Mutasi ke Outlet <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="receiver_id">
                                        <option value=""></option>
                                        @foreach ($dataOutlet as $outlet)
                                        <option value="{{ $outlet->id }}" {{ old('receiver_id') == $outlet->id ? "selected" : "" }}>{{ $outlet->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('receiver_id') }}</small>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jumlah
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input type="number" class="form-control" required="required" id="qty"
                                        name="qty" placeholder="Qty">
                                        <small class="text-danger">{{ $errors->first('qty') }}</small>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success" id="submit-btn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        Submit
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

