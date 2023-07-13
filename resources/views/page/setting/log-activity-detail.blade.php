@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Log Activity by User</h3>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="page-title">
                    <h2>Data Log Activity by User</h2>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('log-activity') }}">Data Kasir</a></li>
                        <li class="breadcrumb-item active">Detail Log Activity</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Status</th>
                            <th class="column-title">Waktu</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dataLogActivity as $key => $logActivity)
                        <tr class="">
                            <td class=" ">{{ $loop->iteration }}</td>
                            <td class=" ">{{ $logActivity->user->name }} </td>
                            <td class="">
                                @if($logActivity->state== '1')
                                Logout
                                @else
                                Clockin
                                @endif
                            </td>
                            <td class=" ">{{ $logActivity->created_at }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection