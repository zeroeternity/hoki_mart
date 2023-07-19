@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')


<div class="" role="main">
    <div class="">
        <form action="{{ route('purchase.store') }}" method="post" enctype="multipart/form-data">
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
                            <h2>Form Pembelian <small>Nama / id outlet</small></h2>
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
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No Faktur
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <input type="text" class="form-control" name="invoice_number">
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Supllier
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 has-feedback-left">
                                    <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                        name="supllier_id">
                                        <option value=""></option>
                                        @foreach($dataSupplier as $key => $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
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
                                        onmouseout="timeFunctionLong(this)">
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
                                        onmouseout="timeFunctionLong(this)">
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
                                    <th>Total</th>
                                    <th>Harga Beli</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="itemListPurchase">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ln_solid"></div>

                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
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
        var total = document.createElement("td");
        var purchase_price = document.createElement("td");
        var action = document.createElement("td");
        // make append element
        itemlist.appendChild(row);
        row.appendChild(code);
        row.appendChild(name);
        row.appendChild(unit);
        row.appendChild(ppn);
        row.appendChild(qty);
        row.appendChild(total);
        row.appendChild(purchase_price);
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
        input_name.setAttribute("disabled",true);

        // make element input unit
        var input_unit = document.createElement("input");
        input_unit.setAttribute("name", 'items[' + i + '][unit]');
        input_unit.setAttribute("id", 'items[' + i + '][unit]');
        input_unit.setAttribute("class", "form-control");
        input_unit.setAttribute("disabled",true);

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

         // make element input total
         var input_total = document.createElement("input");
        input_total.setAttribute("type", "number");
        input_total.setAttribute("name", 'items[' + i + '][total]');
        input_total.setAttribute("id", 'items[' + i + '][total]');
        input_total.setAttribute("class", "form-control");

        // make element input number
        var input_purchase_price = document.createElement("input");
        input_purchase_price.setAttribute("type", "number");
        input_purchase_price.setAttribute("name", 'items[' + i + '][purchase_price]');
        input_purchase_price.setAttribute("id", 'items[' + i + '][purchase_price]');
        input_purchase_price.setAttribute("class", "form-control");

        // ajax get data item
        input_code.oninput=function(){
            var item_code=input_code.value
            $.ajax({
                type:"POST",
                url:"{{ route('purchase.getitemdata') }}",
                data:{
                    "code":item_code,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(response){
                    input_id.value=response.id??''
                    input_name.value=response.name??''
                    input_unit.value=response.unit?.name??''
                    input_ppn.value=response.ppn_type?.type??''
                }

            })
        }
        
        // make oninput qty
        input_qty.oninput=function(){
            var qty =input_qty.value;
            var price = input_purchase_price.value;

            if(price > 0){
            input_total.value= qty * price;
            }
        }
        // make oninput price
        input_purchase_price.oninput=function(){
            var qty =input_qty.value;
            var price = input_purchase_price.value;
            input_total.value= qty * price;
        }
        // make oninput total
        input_total.oninput=function(){
            var qty =input_qty.value;
            var total = input_total.value;
            input_purchase_price.value= total / qty;
        }

        // make element hapus
        var hapus = document.createElement("a");
        // function appendchild
        code.appendChild(input_code);
        name.appendChild(input_name);
        unit.appendChild(input_unit);
        ppn.appendChild(input_ppn);
        qty.appendChild(input_qty);
        total.appendChild(input_total);
        purchase_price.appendChild(input_purchase_price);
        action.appendChild(hapus);
        //hapus inner html
        hapus.innerHTML =
        '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
        // Action hapus
        hapus.onclick = function () {
            row.parentNode.removeChild(row);
        };
        i++;
    }
</script>

@endsection