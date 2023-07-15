<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Goods;
use App\Models\Adjustment;
use Illuminate\Http\Request;

class AdjustmentController extends Controller
{
    public function index()
    {
        $data = [
            'dataOutlet'  => Outlet::all(['id', 'name']),
            'dataGoods'  => Goods::all(['id', 'code', 'name', 'selling_price', 'minimum_stock']),
        ];
        return view('page.warehouse.adjustment', $data);
    }
    public function getData()
    {
        $goods = Goods::orderBy('id')->get();
        return response()->json($goods);
    }
}
