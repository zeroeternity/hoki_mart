@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Penjualan Cicilan</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Penjualan Cicilan <small>Nama / id outlet</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >NO.Anggota <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 form-group">
                                    <input type="text" id="first-name" required="required" class="form-control" placeholder="Kode anggota">
                                </div>
                                <div class="col-md-4 col-sm-4 form-group">
                                    <input type="text" id="first-name" readonly="readonly" class="form-control" placeholder="Nama anggota">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Outlet <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 form-group">
                                    <input type="text" id="first-name" required="required" class="form-control" placeholder="Kode Outlet">
                                </div>
                                <div class="col-md-4 col-sm-4 form-group">
                                    <input type="text" id="first-name" readonly="readonly" class="form-control" placeholder="Nama Outlet">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >NO.Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 form-group">
                                    <input type="text" id="first-name" required="required" class="form-control" placeholder="Kode Barang">
                                </div>
                                <div class="col-md-4 col-sm-4 form-group">
                                    <input type="text" id="first-name" readonly="readonly" class="form-control" placeholder="Nama Barang">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"  >Harga  <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" required="required" id="inputSuccess2" placeholder="Harga">
                                    <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control" required="required"  id="inputSuccess3" placeholder="PPN">
                                </div>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control" required="required"  id="inputSuccess4" placeholder="Qty">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"  >Uang Muka  <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control" required="required"  id="inputSuccess3" placeholder="Uang Muka">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">New</button>
                                    <button class="btn btn-info" type="button">Edit</button>
                                    <button class="btn btn-danger" type="reset">Delete</button>
                                    <button class="btn btn-warning" type="button">Search</button>
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

<!-- Custom Theme Scripts -->
<script src="{{asset ('template/appendchild/sale.js')}}"></script>

@endsection
