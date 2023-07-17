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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Toko /
                                    Outlet <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="outlet_id">
                                        <option value=""></option>
                                        @foreach ($dataOutlet as $key => $outlet)
                                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Barang
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;" name="item_id">
                                        <option value=""></option>
                                        @foreach ($dataItem as $key => $item)
                                        <option data-item='{{ json_encode($item) }}' value="{{ $item->id }}">
                                            {{ $item->code }} - {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Info <span
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Barang
                                    Rusak / Hilang
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3  form-group has-feedback">
                                    <input type="text" class="form-control" required="required" id="qty"
                                        name="adjustment" placeholder="Qty">
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
                    <a class="btn btn-primary text-white" onclick="addItemAdjustment(); return false">
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

{{-- Adjustment Appendchild JS --}}
<script>
    // Appandchild Adjustment
        var i = 1;

        function addItemAdjustment() {
            var itemlist = document.getElementById("itemListAdjustment");
            // make element
            var row = document.createElement("tr");
            var code = document.createElement("td");
            var name = document.createElement("td");
            var adjust = document.createElement("td");
            var price = document.createElement("td");
            var total = document.createElement("td");
            var action = document.createElement("td");
            // make append element
            itemlist.appendChild(row);
            row.appendChild(code);
            row.appendChild(name);
            row.appendChild(adjust);
            row.appendChild(price);
            row.appendChild(total);
            row.appendChild(action);
            // make element input code
            var input_code = document.createElement("input");
            input_code.setAttribute("name", "items[" + i + "][code]");
            input_code.setAttribute("class", "form-control");
            // make element input name
            var input_name = document.createElement("input");
            input_name.setAttribute("name", "items[" + i + "][name]");
            input_name.setAttribute("class", "form-control");
            // make element input adjust
            var input_adjust = document.createElement("input");
            input_adjust.setAttribute("name", "items[" + i + "][adjust]");
            input_adjust.setAttribute("class", "form-control");
            // make element input price
            var input_price = document.createElement("input");
            input_price.setAttribute("name", "items[" + i + "][price]");
            input_price.setAttribute("class", "form-control");
            // make element input total
            var input_total = document.createElement("input");
            input_total.setAttribute("type", "number");
            input_total.setAttribute("name", "items[" + i + "][total]");
            input_total.setAttribute("class", "form-control");
            // make element hapus
            var hapus = document.createElement("a");
            // function appendchild
            code.appendChild(input_code);
            name.appendChild(input_name);
            adjust.appendChild(input_adjust);
            price.appendChild(input_price);
            total.appendChild(input_total);
            action.appendChild(hapus);
            //hapus inner html
            hapus.innerHTML =
                '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
            // Action hapus
            hapus.onclick = function() {
                row.parentNode.removeChild(row);
            };
            i++;
        }
</script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('template/appendchild/adjustment.js') }}"></script>

@endsection

@push('addon-script')
<script>
    $("select[name=item_id]").on('change', function() {
            const item = $('select[name=item_id]').find("option:selected").data('item')
            $("input#price").val(item.selling_price)
            $("input#stock").val(item.minimum_stock)
        })

        $('#qty').on('input', function() {
            const item = $('select[name=item_id]').find("option:selected").data('item')
            var totalStock = parseInt(item.minimum_stock) || 0;;
            var quantity = parseInt($(this).val()) || 0;
             totalStock += quantity;
            $('#stock').val(totalStock);
        });
</script>
@endpush