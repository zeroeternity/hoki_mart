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

    public function update(Request $request){
        $request->validate([
            'goods_id'              => 'required',
        ]);

        $goods_id           = $request->goods_id;

        $data = Goods::find($goods_id);
        $minimum_stock             = $data->minimum_stock;
        $adjustment                = $request->adjustment;
        $data->minimum_stock       = $minimum_stock + $adjustment;
        $data->save();

        $adjust = new Adjustment;
        $adjust->goods_id = $goods_id;
        $adjust->save();

        return redirect()->route('goods');
    }

    public function getData()
    {
        $goods = Goods::orderBy('id')->get();
        return response()->json($goods);
    }
}
