<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\group;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $data = [
            'dataUnit'   => Unit::orderBy('created_at', 'desc')->get()
        ];

        $dataG = [
            'dataGroup'   => Group::orderBy('created_at', 'desc')->get()
        ];

        return view('page.warehouse.goods.goods', $data, $dataG);
    }

    public function create()
    {
        $data = [
            'dataUnit'   => Unit::all(['id', 'name'])
        ];

        $dataG = [
            'dataGroup'   => Group::all(['id', 'name'])
        ];

        return view('page.warehouse.goods.input-goods', $data, $dataG);
    }
}
