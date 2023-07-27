@extends('layouts.template')
@section('content')

<div class="" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Log Activity</h3>
            </div>
        </div>
        <div class=" " role="main">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Data User Log Activity</h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dataUser as $key => $user)
                        <tr class="">
                            <td class=" ">{{ $loop->iteration }}</td>
                            <td class=" ">{{ $user->name }} </td>
                            <td class=" ">{{ $user->email }} </td>
                            <td class=" last">
                                <a href="{{ route('log-activity.detail',[$user->id]) }}">
                                    <button type="button" class="btn btn-info">
                                        <li class="fa fa-eye"> Detail</li>
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

@endsection
