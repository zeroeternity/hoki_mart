<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\group;
use App\Models\PPNType;
use App\Models\Voucher;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $data = [
            'dataUnit'      => Unit::orderBy('created_at', 'desc')->get(),
            'dataGroup'     => Group::orderBy('created_at', 'desc')->get(),
            'dataPPN'       => PPNType::orderBy('created_at', 'desc')->get(),
            'dataVoucher'   => Voucher::orderBy('created_at', 'desc')->get(),
        ];

        return view('page.warehouse.goods.goods', $data);
    }

    public function create()
    {
        $data = [
            'dataUnit'   => Unit::all(['id', 'name']),
            'dataGroup'   => Group::all(['id', 'name']),
            'dataPPN'   => PPNType::all(['id', 'type'])
        ];


        return view('page.warehouse.goods.input-goods', $data);
    }
}
