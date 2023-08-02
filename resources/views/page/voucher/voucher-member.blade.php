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
                    <form action="{{ route('voucher-member.store') }}" method="post" enctype="multipart/form-data">
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
                                <h2>Add Voucer Anggota</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"  >Anggota
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 has-feedback-left">
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger" name="member_id"
                                                data-member='{{ json_encode($users) }}'>
                                            <option value=""></option>
                                            @foreach ($users as $key => $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    >Estate
                                    </label>
                                    <div class="col-md-3 col-sm-3  form-group has-feedback">
                                        <input name="estate_name" type="text" class="form-control" readonly="readonly"
                                               placeholder="">
                                    </div>
                                    <div class="col-md-3 col-sm-3  form-group has-feedback">
                                        <div class="item form-group col-md-6 col-sm-6">
                                            <label class="col-form-label label-align col-md-6 col-sm-6"
                                            >Istri :
                                            </label>
                                            <select name="wife" class="form-control">--}}
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                        <div class="item form-group col-md-6 col-sm-6">
                                            <label class="col-form-label label-align col-md-6 col-sm-6"
                                            >Anak :
                                            </label>
                                            <select name="child" class="form-control">--}}
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
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
                        @foreach ($member_vouchers as $key => $member_voucher)
                            <tr class="">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member_voucher->users->name }}</td>
                                <td>{{ $member_voucher->users->estate->estate }}</td>
                                <td>Istri : {{ $member_voucher->wife }}, Anak : {{ $member_voucher->child }}</td>
                                <td>{{ $member_voucher->total}}</td>
                                <td>
                                    <a href="{{ route('voucher-member.edit', [$member_voucher['id']]) }}">
                                        <button type="button" class="btn btn-info">
                                            <li class="fa fa-edit"></li> Edit
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('addon-script')
        <script>
            const membersData = JSON.parse($('select[name=member_id]').attr('data-member'));
            // Event listener for the member_id input field
            $("select[name=member_id]").on('change', function () {
                var id = $(this).val();
                // Find the corresponding member in the data based on the entered id
                var foundData = membersData.find(member => member.id == id);
                if (foundData) {
                    // Select the corresponding option in the member_id select element
                    $('input[name=member_id]').val(foundData.id);
                    $('input[name=estate_name]').val(foundData.estate.estate);
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