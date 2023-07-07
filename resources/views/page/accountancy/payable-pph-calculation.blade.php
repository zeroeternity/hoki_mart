@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')
<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Laporan Perhitungan pph terhutang</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row no-print">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Laporan Perhitungan pph terhutang <small>Nama / id outlet</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Periode <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 input-prepend input-group form-group has-feedback">
                                <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016" />
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
