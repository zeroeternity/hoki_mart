<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Adjustment;
use App\Models\Item;
use App\Models\OutletItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdjustmentController extends Controller
{
    public function index()
    {
        $data = [
            'dataOutlet'  => Outlet::all(['id', 'name']),
            'dataItem'  => Item::all(['id', 'code', 'name']),
            'dataOutletItem'  => OutletItem::all(['id', 'item_id','selling_price', 'minimum_stock']),
        ];
        return view('page.warehouse.adjustment', $data);
    }

    public function update(Request $request){
        $request->validate([
            'outlet_item_id'       => 'required',
        ]);

        $outlet_item_id           = $request->outlet_item_id;

        $data = OutletItem::find($outlet_item_id);
        $minimum_stock             = $data->minimum_stock;
        $adjustment                = $request->adjustment;
        $data->minimum_stock       = $minimum_stock + $adjustment;
        $data->save();

        $adjust = new Adjustment;
        $adjust->outlet_item_id = $outlet_item_id;
        $adjust->save();

        Alert::success('Transaksi Adjusment Barang Berhasil');

        return redirect()->route('item');
    }

    public function getData()
    {
        $item = Item::orderBy('id')->get();
        return response()->json($item);
    }
}
