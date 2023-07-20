@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Barang</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Daftar Barang</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('item') }}">Data barang</a></li>
                            <li class="breadcrumb-item active">Tambah Data Barang</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
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
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="code" required="required" class="form-control " name="code">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" required="required" class="form-control " name="name">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Group Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="group_id">
                                        <option value=""></option>
                                        @foreach($dataGroup as $key => $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                        name="ppn_type_id">
                                        <option value=""></option>
                                        @foreach($dataPPN as $key => $ppntype)
                                        <option value="{{ $ppntype->id }}">{{ $ppntype->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Satuan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="unit_id">
                                        <option value=""></option>
                                        @foreach($dataUnit as $key => $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Jual
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="selling_price" class="form-control " name="selling_price"
                                        oninput="calculateLaba()">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Stock Minimum
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="minimum_stock" class="form-control " name="minimum_stock">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Persen non margin
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" step="any" id="percent_non_margin" class="form-control "
                                        name="percent_non_margin" oninput="calculateSellingPrice()">
                                    <span class="form-control-feedback right" aria-hidden="true">%</span>
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

{{-- Script calculate --}}
{{-- <script>
    const calculateLaba = () => {
        var purchasePrice       = $("#purchase_price").val()
        var sellingPrice        = $("#selling_price").val()
        var percentNonMargin    = $("#percent_non_margin").val()

        if (purchasePrice > 0 && sellingPrice > 0 ){
            var result = ((sellingPrice - purchasePrice) / purchasePrice) * 100

            $("#percent_non_margin").val(result.toFixed(2))
        }
    }
    const calculateSellingPrice = () => {
        var purchasePrice       = $("#purchase_price").val()
        var sellingPrice        = $("#selling_price").val()
        var percentNonMargin    = $("#percent_non_margin").val()

        if (purchasePrice > 0 && percentNonMargin > 0 ){
            var result = Number((purchasePrice*percentNonMargin)/100) + Number(purchasePrice)

            $("#selling_price").val(Math.floor(result))
        }
    }
</script> --}}

@endsection
