<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        return view('page.warehouse.goods.goods');
    }

    public function create()
    {
        $data = [
            'dataUnit'   => Unit::all(['id', 'name'])
        ];
        return view('page.warehouse.goods.input-goods', $data);
    }
}
