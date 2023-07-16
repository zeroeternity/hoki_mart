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
                        <h2>Edit Daftar Barang</h2>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('goods') }}">Data barang</a></li>
                            <li class="breadcrumb-item active">Edit Data Barang</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('goods.update') }}" method="post" enctype="multipart/form-data">
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
                            @method('put')
                            <input type="text" class="form-control 
                                        @error('id')
                                            is-invalid
                                        @enderror" value="{{ $id }}" name="id" id="id" readonly hidden />

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="code" required="required" class="form-control 
                                    @error('code')
                                            is-invalid
                                        @enderror" value="{{ $code }}" name="code">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" required="required" class="form-control 
                                    @error('name')
                                            is-invalid
                                        @enderror" value="{{ $name }}" name="name">
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
                                        <option value="{{ $group->id }}" {{ $group->id = $group_id ? 'selected' : ''
                                            }}>{{ $group->name }}</option>
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
                                        <option value="{{ $ppntype->id }}" {{ $ppntype->id = $ppn_type_id ? 'selected' :
                                            '' }}>{{ $ppntype->type }}</option>
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
                                        <option value="{{ $unit->id }}" {{ $unit->id = $unit_id ? 'selected' : '' }}>{{
                                            $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Beli <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="purchase_price" required="required" class="form-control 
                                    @error('purchase_price')
                                            is-invalid
                                        @enderror" value="{{ $purchase_price }}" name="purchase_price"
                                        oninput="calculateLaba()">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Jual <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="selling_price" required="required" class="form-control 
                                    @error('selling_price')
                                            is-invalid
                                        @enderror" value="{{ $selling_price }}" name="selling_price"
                                        oninput="calculateLaba()">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Stock Minimum <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="minimum_stock" required="required" class="form-control 
                                    @error('minimum_stock')
                                            is-invalid
                                        @enderror" value="{{ $minimum_stock }}" name="minimum_stock">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Margin Karyawan <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                        name="margin_member">
                                        <option value="0" @php if($margin_member=="0" ){echo "selected" ;} @endphp>Tidak
                                            Aktif
                                        </option>
                                        <option value="1" @php if($margin_member=="1" ){echo "selected" ;} @endphp>Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Persen non margin <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" step="any" id="percent_non_margin" required="required" class="form-control 
                                        @error('percent_non_margin')
                                            is-invalid
                                        @enderror" value="{{ $percent_non_margin }}" name="percent_non_margin"
                                        oninput="calculateSellingPrice()">
                                    <span class="form-control-feedback right" aria-hidden="true">%</span>
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

<script>
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
</script>

@endsection