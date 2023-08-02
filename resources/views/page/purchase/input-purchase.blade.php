@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')

    <div class="" role="main">
        <div class="">
            <form id="purchase-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="page-title">
                    <div class="title_left">
                        <h3>Pembelian</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Pembelian</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="alert alert-danger d-none">
                                    <ul class="text-white" id="error-list">
                                    </ul>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">No
                                        Faktur
                                    </label>
                                    <div class="col-md-6 col-sm-6 has-feedback-left">
                                        <input type="text" class="form-control" name="invoice_number"
                                            value="{{ old('invoice_number') }}">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Supplier
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 has-feedback-left">
                                        <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger" style="width: 100%;"
                                            name="supplier_id">
                                            <option value=""></option>
                                            @foreach ($dataSupplier as $key => $supplier)
                                                <option
                                                    value="{{ $supplier->id }}"{{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                    {{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">TGL.Faktur
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="invoice_date" class="date-picker form-control" name="invoice_date"
                                            placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                            onfocus="this.type='date'" onmouseover="this.type='date'"
                                            onclick="this.type='date'" onblur="this.type='text'"
                                            onmouseout="timeFunctionLong(this) " value="{{ old('invoice_date') }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">TGL.J Tempo
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="due_date" class="date-picker form-control" name="due_date"
                                            placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                            onfocus="this.type='date'" onmouseover="this.type='date'"
                                            onclick="this.type='date'" onblur="this.type='text'"
                                            onmouseout="timeFunctionLong(this)" value="{{ old('due_date') }}">
                                    </div>
                                </div>
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
                        <div class="col-md-3 col-sm-3">
                            <a class="btn btn-primary text-white" onclick="addItemPurchase(); return false">
                                <i class="fa fa-plus px-2"></i>Add</a>
                            <!-- Search barang -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bs-example-modal-lg"><i class="fa fa-search px-2"></i> Search Barang
                            </button>
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Barang
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <select class="form-control select2 select2-danger"
                                                        id="modal_select_item" data-dropdown-css-class="select2-danger"
                                                        style="width: 100%;" name=""
                                                        data-item='{{ json_encode($items_outlet) }}'>
                                                        <option value=""></option>
                                                        @foreach ($items_outlet as $key => $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button id="add_item" type="button" class="btn btn-success">Add +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <th>Harga Beli</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="itemListPurchase">
                                    <tr>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-right">Total</th>
                                        <th id="grand_total"></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="ln_solid"></div>

                        <div class="item form-group">
                            <button type="submit" class='btn btn-block btn-success text-white'>
                                <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                <i class="fa fa-save px-2"></i>
                                Submit Pembelian
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Purchase Appendchild JS --}}
    <script>
        // Appandchild Purchase
        var i = 1;

        function addItemPurchase() {
            var itemlist = document.getElementById("itemListPurchase");
            // make element
            var row = document.createElement("tr");
            var code = document.createElement("td");
            var name = document.createElement("td");
            var unit = document.createElement("td");
            var ppn = document.createElement("td");
            var qty = document.createElement("td");
            var purchase_price = document.createElement("td");
            var total = document.createElement("td");
            var action = document.createElement("td");
            // make append element
            itemlist.appendChild(row);
            row.appendChild(code);
            row.appendChild(name);
            row.appendChild(unit);
            row.appendChild(ppn);
            row.appendChild(qty);
            row.appendChild(purchase_price);
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
            input_code.setAttribute("name", 'items[' + i + '][code]');
            input_code.setAttribute("id", 'items[' + i + '][code]');
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

            // make element input purchase_price
            var input_purchase_price = document.createElement("input");
            input_purchase_price.setAttribute("type", "number");
            input_purchase_price.setAttribute("name", 'items[' + i + '][purchase_price]');
            input_purchase_price.setAttribute("id", 'items[' + i + '][purchase_price]');
            input_purchase_price.setAttribute("class", "form-control");

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

            // make oninput qty
            input_qty.oninput = function() {
                var qty = input_qty.value;
                var price = input_purchase_price.value;

                if (price > 0) {
                    input_total.value = qty * price;
                }
                calculateTotal(input_total);
            }
            // make oninput price
            input_purchase_price.oninput = function() {
                var qty = input_qty.value;
                var price = input_purchase_price.value;
                input_total.value = qty * price;
                calculateTotal(input_total);
            }
            // make oninput total
            input_total.oninput = function() {
                var qty = input_qty.value;
                var total = input_total.value;
                input_purchase_price.value = total / qty;
                calculateTotal(input_total);
            }

            // make element hapus
            var hapus = document.createElement("a");
            // function appendchild
            code.appendChild(input_code);
            name.appendChild(input_name);
            unit.appendChild(input_unit);
            ppn.appendChild(input_ppn);
            qty.appendChild(input_qty);
            purchase_price.appendChild(input_purchase_price);
            total.appendChild(input_total);
            action.appendChild(hapus);
            //hapus inner html
            hapus.innerHTML =
                '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
            // Action hapus
            hapus.onclick = function() {


                row.parentNode.removeChild(row);
                input_total.value = 0;
                calculateTotal(input_total);
            };
            i++;
        }

        function calculateTotal(inputElement) {
            var row = inputElement.closest("tr");
            var qty = parseFloat(row.querySelector("input[name^='items'][name$='[qty]']").value) || 0;
            var price = parseFloat(row.querySelector("input[name^='items'][name$='[purchase_price]']").value) || 0;
            var total = qty * price;
            row.querySelector("input[name^='items'][name$='[total]']").value = total;

            calculateGrandTotal();
        }

        // Function to calculate and display the Grand Total
        function calculateGrandTotal() {
            var grandTotal = 0;
            var totalInputs = document.querySelectorAll("input[name^='items'][name$='[total]']");
            totalInputs.forEach(function(input) {
                grandTotal += parseFloat(input.value) || 0;
            });
            document.getElementById("grand_total").textContent = "Rp. " + grandTotal;
        }
    </script>
    @push('addon-script')
        <script>
            //Form Handler
            $('#purchase-form').submit(function(event) {
                event.preventDefault();
                $('#purchase-form button[type="submit"]').prop('disabled', true);
                $('#spinner').removeClass('d-none');

                $.ajax({
                    url: '/purchase/store',
                    type: 'POST',
                    data: $('#purchase-form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.href = '/purchase';
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        $('#purchase-form button[type="submit"]').prop('disabled', false);
                        $('#spinner').addClass('d-none');

                        var errors = xhr.responseJSON.errors;

                        // Select the error div and the list element
                        var errorDiv = $('.alert.alert-danger');
                        var errorList = $('#error-list');

                        // Clear any previous error messages
                        errorList.empty();

                        // Add the new error messages to the list
                        for (var field in errors) {
                            errors[field].forEach(function(message) {
                                errorList.append('<li>' + message + '</li>');

                            });
                        }

                        // Show the error div if it was hidden
                        errorDiv.removeClass('d-none');

                        // Scroll to the top of the form to display the error messages
                        $('html, body').animate({
                            scrollTop: $('#purchase-form').offset().top
                        }, 'slow');

                    }
                });
            });
            // Parse the JSON data from the data-member attribute and store it in a variable
            // Event listener for the member_id input field

            // Modal Handler
            $("#add_item").on('click', function() {
                var id = $("#modal_select_item").val();
                var data_item = JSON.parse($('#modal_select_item').attr('data-item'));
                var foundData = data_item.find(item => item.id == id);
                if(!foundData){
                    return null;
                }
                var itemlist = document.getElementById("itemListPurchase");
                // make element
                var row = document.createElement("tr");
                var code = document.createElement("td");
                var name = document.createElement("td");
                var unit = document.createElement("td");
                var ppn = document.createElement("td");
                var qty = document.createElement("td");
                var purchase_price = document.createElement("td");
                var total = document.createElement("td");
                var action = document.createElement("td");
                // make append element
                itemlist.appendChild(row);
                row.appendChild(code);
                row.appendChild(name);
                row.appendChild(unit);
                row.appendChild(ppn);
                row.appendChild(qty);
                row.appendChild(purchase_price);
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
                input_code.setAttribute("name", 'items[' + i + '][code]');
                input_code.setAttribute("id", 'items[' + i + '][code]');
                input_code.setAttribute("class", "form-control");
                input_code.setAttribute("value", foundData.code);

                // make element input name
                var input_name = document.createElement("input");
                input_name.setAttribute("name", 'items[' + i + '][name]');
                input_name.setAttribute("id", 'items[' + i + '][name]');
                input_name.setAttribute("class", "form-control");
                input_name.setAttribute("disabled", true);
                input_name.setAttribute("value", foundData.name);

                // make element input unit
                var input_unit = document.createElement("input");
                input_unit.setAttribute("name", 'items[' + i + '][unit]');
                input_unit.setAttribute("id", 'items[' + i + '][unit]');
                input_unit.setAttribute("class", "form-control");
                input_unit.setAttribute("disabled", true);
                input_unit.setAttribute("value", foundData.unit.name);

                // make element input ppn
                var input_ppn = document.createElement("input");
                input_ppn.setAttribute("name", 'items[' + i + '][ppn]');
                input_ppn.setAttribute("id", 'items[' + i + '][ppn]');
                input_ppn.setAttribute("class", "form-control");
                input_ppn.setAttribute("disabled", true);
                input_ppn.setAttribute("value", foundData.ppn_type.type);

                // make element input qty
                var input_qty = document.createElement("input");
                input_qty.setAttribute("type", "number");
                input_qty.setAttribute("name", 'items[' + i + '][qty]');
                input_qty.setAttribute("id", 'items[' + i + '][qty]');
                input_qty.setAttribute("class", "form-control");

                // make element input purchase_price
                var input_purchase_price = document.createElement("input");
                input_purchase_price.setAttribute("type", "number");
                input_purchase_price.setAttribute("name", 'items[' + i + '][purchase_price]');
                input_purchase_price.setAttribute("id", 'items[' + i + '][purchase_price]');
                input_purchase_price.setAttribute("class", "form-control");

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

                // make oninput qty
                input_qty.oninput = function() {
                    var qty = input_qty.value;
                    var price = input_purchase_price.value;

                    if (price > 0) {
                        input_total.value = qty * price;
                    }
                    calculateTotal(input_total);

                }
                // make oninput price
                input_purchase_price.oninput = function() {
                    var qty = input_qty.value;
                    var price = input_purchase_price.value;
                    input_total.value = qty * price;
                    calculateTotal(input_total);

                }
                // make oninput total
                input_total.oninput = function() {
                    var qty = input_qty.value;
                    var total = input_total.value;
                    input_purchase_price.value = total / qty;
                    calculateTotal(input_total);

                }

                // make element hapus
                var hapus = document.createElement("a");
                // function appendchild
                code.appendChild(input_code);
                name.appendChild(input_name);
                unit.appendChild(input_unit);
                ppn.appendChild(input_ppn);
                qty.appendChild(input_qty);
                purchase_price.appendChild(input_purchase_price);
                total.appendChild(input_total);
                action.appendChild(hapus);
                //hapus inner html
                hapus.innerHTML =
                    '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
                // Action hapus
                hapus.onclick = function() {
                    input_total.value = 0;
                    calculateTotal(input_total);

                    row.parentNode.removeChild(row);
                };
                i++;
            });
        </script>
    @endpush
@endsection
