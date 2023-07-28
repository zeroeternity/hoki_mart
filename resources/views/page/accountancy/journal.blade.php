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
                        <form action="" enctype="multipart/form-data">
                            <br />
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >No tranksaksi <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-4 form-group">
                                    <input type="text" id="first-name" readonly="readonly" class="form-control" placeholder="AUTOMATIS">
                                </div>
                                <div class="col-md-2 col-sm-2 form-group">
                                    <input type="text" id="first-name" required="required" class="form-control" placeholder="Cari No">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Tanggal
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="" class="date-picker form-control" name="invoice_date"
                                            placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                            onfocus="this.type='date'" onmouseover="this.type='date'"
                                            onclick="this.type='date'" onblur="this.type='text'"
                                            onmouseout="timeFunctionLong(this)">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jurnal/Cash/Bank <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 ">
                                    <select name="payment_method" class="form-control">
                                        <option value="0">Jurnal</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Bank</option>
                                    </select>
                                </div>
                                <label class="  ">Jenis <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 ">
                                    <select name="method" class="form-control">
                                        <option value="0">Penerimaan</option>
                                        <option value="1">Pengeluran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Diterima / Keterangan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <textarea id="" required="required" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Nama Akun <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-4 form-group">
                                    <input type="text" id="first-name" readonly="readonly" class="form-control" placeholder="Nama Akun">
                                </div>
                                <div class="col-md-2 col-sm-2 form-group">
                                    <input type="text" id="first-name" required="required" class="form-control" placeholder="Kode Akun">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Keterangan Akun
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <textarea id="" required="required" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Debet / Kredit <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 ">
                                    <select name="method" class="form-control">
                                        <option value="0">Debet</option>
                                        <option value="1">Kredit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Jumlah RP <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <input type="number" id="first-name" required="required" class="form-control" placeholder="jumlah">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="" class="btn btn-success" id="submit-btn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="clearfix"></div>
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">No</th>
                        <th class="column-title">No Akun</th>
                        <th class="column-title">Keterangan</th>
                        <th class="column-title">Jenis</th>
                        <th class="column-title">Jumlah</th>
                        <th class="column-title">Nama Akun</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <thead>
                        <th class="column-title">Debit</th>
                        <th class="column-title">Kredit</th>
                    </thead>

                </table>
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success" id="submit-btn">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

