@extends('layouts.template')
@section('content')

    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Voucher Anggota</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Voucher Anggota</h2>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('voucher-item') }}">Data Voucher
                                        Anggota</a></li>
                                <li class="breadcrumb-item active">Edit Voucher Anggota</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{ route('voucher-item.update') }}" method="post"
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
                                        @enderror" value="{{ $id }}" name="id" id="id" readonly hidden/>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Kode barang
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="code_name" required="required"
                                               class="form-control
                                               @error('code_name')
                                            is-invalid
                                        @enderror" value="{{ $code_name }}" name="code_name" disabled>
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang
                                    </label>
                                    <div class="col-md-6 col-sm-6 has-feedback-left">
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger" name="item_id"
                                                data-item='{{ json_encode($items) }}' disabled>
                                            <option value=""></option>
                                            @foreach ($items as $key => $item)
                                                <option value="{{ $item['id'] }}" {{ $item_id==$item['id'] ?
                                            'selected="selected"' : ''}}>{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Beli
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="purchase_price" required="required"
                                               class="form-control
                                               @error('purchase_price')
                                            is-invalid
                                        @enderror" value="{{ $purchase_price }}" name="purchase_price"
                                               oninput="calculateLaba()" disabled>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Jual
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="selling_price" required="required" class="form-control
                                        @error('sale_price')
                                            is-invalid
                                        @enderror" value="{{ $sale_price }}"
                                               name="selling_price"
                                               oninput="calculateLaba()">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Persen non margin
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step="any" id="percent_non_margin" required="required"
                                               class="form-control
                                               @error('margin')
                                            is-invalid
                                        @enderror" value="{{ $margin }}" name="percent_non_margin"
                                               oninput="calculateSellingPrice()">
                                        <span class="form-control-feedback right" aria-hidden="true">%</span>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success" id="submit-btn">
                                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                                  aria-hidden="true"></span>
                                            Update
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
    @push('addon-script')
        <script>
            const itemsData = JSON.parse($('select[name=item_id]').attr('data-item'));
            $("select[name=item_id]").on('change', function () {
                var id = $(this).val();
                var foundData = itemsData.find(item => item.id == id);
                if (foundData) {
                    $('input[name=item_id]').val(foundData.id);
                    $('input[name=purchase_price]').val(foundData.purchase_item.purchase_price);
                    console.log(foundData);
                } else {
                    $('input[name=item_id]').val('');
                    console.log("not found");
                }
            });

            const calculateLaba = () => {
                var purchasePrice = $("#purchase_price").val()
                var sellingPrice = $("#selling_price").val()
                var percentNonMargin = $("#percent_non_margin").val()

                if (purchasePrice > 0 && sellingPrice > 0) {
                    var result = ((sellingPrice - purchasePrice) / purchasePrice) * 100

                    $("#percent_non_margin").val(result.toFixed(2))
                }
            }
            const calculateSellingPrice = () => {
                var purchasePrice = $("#purchase_price").val()
                var sellingPrice = $("#selling_price").val()
                var percentNonMargin = $("#percent_non_margin").val()

                if (purchasePrice > 0 && percentNonMargin > 0) {
                    var result = Number((purchasePrice * percentNonMargin) / 100) + Number(purchasePrice)

                    $("#selling_price").val(Math.floor(result))
                }
            }
        </script>
    @endpush
@endsection
