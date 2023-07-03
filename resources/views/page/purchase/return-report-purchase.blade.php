@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')
<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Laporan Retur pembelian</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row no-print">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Laporan Retur Pembelian <small>Nama / id outlet</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Supllier <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" required="required" placeholder="">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Jenis Laporan <span class="required">*</span>
                                </label>
                                <div class="col-md-1 col-sm-1 ">
                                    <select class="form-control">
                                        <option>Detail</option>
                                        <option>Rekap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Periode <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                </div>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="row no-print">
                                <div class=" ">
                                  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                  <button class="btn btn-success pull-right"> Preview</button>
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
