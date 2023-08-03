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
                        <form action="{{ route('adjustment.update') }}" method="get" enctype="multipart/form-data">
                            <br />
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Tanggal
                                    adjust <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                        readonly="readonly" type="text" onfocus="this.type='date'"
                                        onmouseover="this.type='date'" onclick="this.type='date'"
                                        onblur="this.type='text'" onmouseout="timeFunctionLong(this)"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Barang
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="outlet_item_id">
                                        <option value=""></option>
                                        @foreach ($dataOutletItem as $key => $outlet_item)
                                        <option data-outlet_item='{{ json_encode($outlet_item) }}' value="{{ $outlet_item->id }}">
                                            {{ $outlet_item->item->code }} - {{ $outlet_item->item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Info <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" readonly="readonly"
                                        id="price" placeholder="Harga">
                                    <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input type="text" class="form-control" readonly="readonly" id="stock"
                                        placeholder="Stock">
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Barang
                                    Rusak / Hilang
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input type="text" class="form-control" required="required" id="qty"
                                        name="qty" placeholder="Qty">
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

@push('addon-script')
<script>
    $("select[name=outlet_item_id]").on('change', function() {
            const outlet_item = $('select[name=outlet_item_id]').find("option:selected").data('outlet_item')
            $("input#price").val(outlet_item.selling_price)
            $("input#stock").val(outlet_item.minimum_stock)
        })

        $('#qty').on('input', function() {
            const outlet_item = $('select[name=outlet_item_id]').find("option:selected").data('outlet_item')
            var totalStock = parseInt(outlet_item.minimum_stock) || 0;;
            var quantity = parseInt($(this).val()) || 0;
             totalStock += quantity;
            $('#stock').val(totalStock);
        });
</script>
@endpush
