@extends('layouts.template')
@section('content')

    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Voucher Barang</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <form action="{{ route('voucher-item.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Voucer Barang</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Anggota
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 has-feedback-left">
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger" name="item_id"
                                                data-item='{{ json_encode($items) }}'>
                                            <option value=""></option>
                                            @foreach ($items as $key => $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Beli
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="purchase_price" required="required"
                                               class="form-control" name="purchase_price"
                                               oninput="calculateLaba()" disabled>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Jual
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="selling_price" required="required" class="form-control"
                                               name="selling_price"
                                               oninput="calculateLaba()">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Persen non margin
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step="any" id="percent_non_margin" required="required"
                                               class="form-control" name="percent_non_margin"
                                               oninput="calculateSellingPrice()">
                                        <span class="form-control-feedback right" aria-hidden="true">%</span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success" id="submit-btn">
                                            <span class="spinner-border spinner-border-sm d-none" role="status"
                                                  aria-hidden="true"></span>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" " role="main">
                <div class="x_panel">
                    <div class="page-title">
                        <div class="title_left">
                            <h2>Data Voucher Anggota</h2>
                        </div>
                        <div class="title_right">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">No.</th>
                            <th class="column-title">Nama Karyawan</th>
                            <th class="column-title">Estate/OU</th>
                            <th class="column-title">Tangungan (KG)</th>
                            <th class="column-title">Total (KG)</th>
                            <th class="column-title">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        @foreach ($member_vouchers as $key => $member_voucher)--}}
                        {{--                            <tr class="">--}}
                        {{--                                <td>{{ $loop->iteration }}</td>--}}
                        {{--                                <td>{{ $member_voucher->users->name }}</td>--}}
                        {{--                                <td>{{ $member_voucher->users->estate->estate }}</td>--}}
                        {{--                                <td>Istri : {{ $member_voucher->wife }}, Anak : {{ $member_voucher->child }}</td>--}}
                        {{--                                <td>{{ $member_voucher->total}}</td>--}}
                        {{--                                <td>--}}
                        {{--                                    <a href="{{ route('voucher-member.edit', [$member_voucher['id']]) }}">--}}
                        {{--                                        <button type="button" class="btn btn-info">--}}
                        {{--                                            <li class="fa fa-edit"></li> Edit--}}
                        {{--                                        </button>--}}
                        {{--                                    </a>--}}
                        {{--                                </td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endforeach--}}
                        </tbody>
                    </table>
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
