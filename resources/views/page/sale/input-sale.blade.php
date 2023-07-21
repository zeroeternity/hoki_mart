@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Penjualan</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Penjualan <small>Nama / id outlet</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">NO.Anggota <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Anggota <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" readonly="readonly" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Cara Bayar <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-1 ">
                                        <select class="form-control">
                                            <option>Cash</option>
                                            <option>Piutang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Piutang <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" readonly="readonly"
                                            id="inputSuccess2" placeholder="Piutang">
                                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-3  form-group has-feedback">
                                        <input type="text" class="form-control"readonly="readonly" id="inputSuccess3"
                                            placeholder="Tanggungan">
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
                        <a class="btn btn-primary text-white" onclick="addItemSale(); return false">
                            Add<i class="fa fa-plus px-2"></i></a>
                    </div>
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>PPN</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="itemListSale">
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
    <script src="{{ asset('template/appendchild/sale.js') }}"></script>
    <script>
        // Appandchild Sale
        var i = 1;

        function addItemSale() {
            var itemlist = document.getElementById("itemListSale");
            // make element
            var row = document.createElement("tr");
            var code = document.createElement("td");
            var name = document.createElement("td");
            var unit = document.createElement("td");
            var ppn = document.createElement("td");
            var qty = document.createElement("td");
            var sale_price = document.createElement("td");
            var total = document.createElement("td");
            var action = document.createElement("td");
            // make append element
            itemlist.appendChild(row);
            row.appendChild(code);
            row.appendChild(name);
            row.appendChild(unit);
            row.appendChild(ppn);
            row.appendChild(qty);
            row.appendChild(sale_price);
            row.appendChild(total);
            row.appendChild(action);

            // make element input id
            var input_id = document.createElement("input");
            input_id.setAttribute("name", 'items[' + i + '][id]');
            input_id.setAttribute("id", 'items[' + i + '][id]');
            input_id.setAttribute("class", "form-control");
            input_id.setAttribute("readonly", true);

            // make element input code
            var input_code = document.createElement("input");
            input_code.setAttribute("name", "items[" + i + "][code]");
            input_code.setAttribute("class", "form-control");
            // make element input name
            var input_name = document.createElement("input");
            input_name.setAttribute("name", 'items[' + i + '][name]');
            input_name.setAttribute("id", 'items[' + i + '][name]');
            input_name.setAttribute("class", "form-control");
            input_name.setAttribute("disabled", true);

            // make element input unit
            var input_unit = document.createElement("input");
            input_unit.setAttribute("name", 'items[' + i + '][unit]');
            input_unit.setAttribute("id", 'items[' + i + '][unit]');
            input_unit.setAttribute("class", "form-control");
            input_unit.setAttribute("disabled", true);

            // make element input ppn
            var input_ppn = document.createElement("input");
            input_ppn.setAttribute("name", 'items[' + i + '][ppn]');
            input_ppn.setAttribute("id", 'items[' + i + '][ppn]');
            input_ppn.setAttribute("class", "form-control");
            input_ppn.setAttribute("disabled", true);

            // make element input qty
            var input_qty = document.createElement("input");
            input_qty.setAttribute("type", "number");
            input_qty.setAttribute("name", 'items[' + i + '][qty]');
            input_qty.setAttribute("id", 'items[' + i + '][qty]');
            input_qty.setAttribute("class", "form-control");

            // make element input number
            var input_sale_price = document.createElement("input");
            input_sale_price.setAttribute("type", "number");
            input_sale_price.setAttribute("name", 'items[' + i + '][purchase_price]');
            input_sale_price.setAttribute("id", 'items[' + i + '][purchase_price]');
            input_sale_price.setAttribute("class", "form-control");
            // make element input total
            var input_total = document.createElement("input");
            input_total.setAttribute("type", "number");
            input_total.setAttribute("name", 'items[' + i + '][total]');
            input_total.setAttribute("id", 'items[' + i + '][total]');
            input_total.setAttribute("class", "form-control");
            
            // ajax get data item
            input_code.oninput = function() {
                var item_code = input_code.value
                $.ajax({
                    type: "POST",
                    url: "{{ route('purchase.getitemdata') }}",
                    data: {
                        "code": item_code,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        input_id.value = response.id ?? ''
                        input_name.value = response.name ?? ''
                        input_unit.value = response.unit?.name ?? ''
                        input_ppn.value = response.ppn_type?.type ?? ''
                    }

                })
            }
            // make element hapus
            var hapus = document.createElement("a");
            // function appendchild
            code.appendChild(input_code);
            name.appendChild(input_name);
            unit.appendChild(input_unit);
            ppn.appendChild(input_ppn);
            qty.appendChild(input_qty);
            sale_price.appendChild(input_sale_price);
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
@endsection
