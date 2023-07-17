<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Adjustment;
use App\Models\Item;
use Illuminate\Http\Request;

class AdjustmentController extends Controller
{
    public function index()
    {
        $data = [
            'dataOutlet'  => Outlet::all(['id', 'name']),
            'dataItem'  => Item::all(['id', 'code', 'name', 'selling_price', 'minimum_stock']),
        ];
        return view('page.warehouse.adjustment', $data);
    }

    public function update(Request $request){
        $request->validate([
            'item_id'              => 'required',
        ]);

        $item_id           = $request->item_id;

        $data = Item::find($item_id);
        $minimum_stock             = $data->minimum_stock;
        $adjustment                = $request->adjustment;
        $data->minimum_stock       = $minimum_stock + $adjustment;
        $data->save();

        $adjust = new Adjustment;
        $adjust->item_id = $item_id;
        $adjust->save();

        return redirect()->route('item');
    }

    public function getData()
    {
        $item = Item::orderBy('id')->get();
        return response()->json($item);
    }
}
