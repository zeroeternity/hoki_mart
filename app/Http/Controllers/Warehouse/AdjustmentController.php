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
            'dataAdjustment'  => Adjustment::with(['outlet_item'])
                ->orderBy('created_at', 'desc')
                ->get(),
        ];
        return view('page.warehouse.adjustment.adjustment', $data);
    }

    public function create()
    {
        $data = [
            'dataOutlet'  => Outlet::all(['id', 'name']),
            'dataItem'  => Item::all(['id', 'code', 'name']),
            'dataOutletItem'  => OutletItem::all(['id', 'item_id', 'selling_price', 'minimum_stock']),
        ];
        return view('page.warehouse.adjustment.input-adjustment', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'outlet_item_id'       => 'required',
            'qty'       => 'required',
        ]);

        $outlet_item_id           = $request->outlet_item_id;
        $qty                      = $request->qty;

        $data = OutletItem::find($outlet_item_id);
        $minimum_stock             = $data->minimum_stock;
        $data->minimum_stock       = $minimum_stock + $qty;
        $data->save();

        $adjust = new Adjustment;
        $adjust->outlet_item_id = $outlet_item_id;
        $adjust->qty = $qty;
        $adjust->save();

        Alert::success('Transaksi Adjusment Barang Berhasil');

        return redirect()->route('item');
    }
}
