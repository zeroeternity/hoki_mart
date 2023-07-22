@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


    <div class="" role="main">
        <div class="">
            <form action="{{ route('sale.store') }}" method="post" id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">
                @csrf

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

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">NO.Anggota <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input name="member_id" readonly="readyonly" type="text" id="member_id" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Anggota <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger" style="width: 100%;" name="member_name"
                                            data-member='{{ json_encode($user) }}'>
                                            <option value=""></option>
                                            @foreach ($user as $key => $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Cara Bayar <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-1 ">
                                        <select name="payment_method" class="form-control">
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
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                {{-- <button class="btn btn-primary" type="button">New</button>
                                <button class="btn btn-info" type="button">Edit</button>
                                <button class="btn btn-danger" type="reset">Delete</button>
                                <button class="btn btn-warning" type="button">Search</button> --}}
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
            input_sale_price.setAttribute("readonly", true);

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
                    url: "{{ route('sale.getData') }}",
                    data: {
                        "code": item_code,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        input_id.value = response.id ?? ''
                        input_name.value = response.name ?? ''
                        input_unit.value = response.unit?.name ?? ''
                        input_ppn.value = response.ppn_type?.type ?? ''
                        input_sale_price.value = response.outlet_item[0]?.selling_price ?? ''
                    }

                })
            }
            // make oninput qty
            input_qty.oninput = function() {
                var qty = input_qty.value;
                var price = input_sale_price.value;

                if (price > 0) {
                    input_total.value = qty * price;
                }
            }
            // make oninput price
            input_sale_price.oninput = function() {
                var qty = input_qty.value;
                var price = input_sale_price.value;
                input_total.value = qty * price;
            }
            // make oninput total
            input_total.oninput = function() {
                var qty = input_qty.value;
                var total = input_total.value;
                input_sale_price.value = total / qty;
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
    @push('addon-script')
        <script>
            // // Parse the JSON data from the data-member attribute and store it in a variable
            const membersData = JSON.parse($('select[name=member_name]').attr('data-member'));
            
            // // Event listener for the member_id input field
            // $("input[name=member_id]").on('input', function() {
            //     var id = $(this).val();
            //     // Find the corresponding member in the data based on the entered id
            //     var foundData = membersData.find(member => member.id == id);
            //     if (foundData) {
            //         // Select the corresponding option in the member_name select element
            //         $('select[name=member_name]').val(foundData.id).trigger('change');
            //     } else {
            //         // If the member is not found, reset the member_name select element
            //         $('select[name=member_name]').val('').trigger('change');
            //     }
            // });

            // Event listener for the member_id input field
            $("select[name=member_name]").on('change', function() {
                var id = $(this).val();
                console.log("ch");
                // Find the corresponding member in the data based on the entered id
                var foundData = membersData.find(member => member.id == id);
                if (foundData) {
                    // Select the corresponding option in the member_id select element
                    $('input[name=member_id]').val(foundData.id);
                    console.log(foundData);
                } else {
                    // If the member is not found, reset the member_id input element
                    $('input[name=member_id]').val('');
                    console.log("not found");

                }
            });
        </script>
    @endpush
@endsection
