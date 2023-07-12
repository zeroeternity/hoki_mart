@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Adjustment</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Adjustment <small> Nama / id outlet</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cari No adjust <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal adjust <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"readonly="readonly" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control" required="required" placeholder="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Info <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" required="required" id="inputSuccess2" placeholder="Harga">
                                    <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control" required="required"  id="inputSuccess3" placeholder="Stock">
                                </div>
                                <div class="col-md-2 col-sm-2  form-group has-feedback">
                                    <input type="text" class="form-control" required="required"  id="inputSuccess4" placeholder="Qty">
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
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Barang</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 offset-md-1">
                    <a class="btn btn-primary text-white"
                        onclick="addItemAdjustment(); return false">
                        Add<i class="fa fa-plus px-2"></i></a>
                </div>
                <div class="card-box table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Adjustment</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="itemListAdjustment">
                            <tr>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Theme Scripts -->
<script src="{{asset ('template/appendchild/adjustment.js')}}"></script>

@endsection
