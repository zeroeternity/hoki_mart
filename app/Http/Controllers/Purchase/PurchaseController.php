<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Purchase_item;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('page.purchase.purchase');
    }

    public function create()
    {
        $data = [
            'dataSupplier'   => Supplier::all(['id', 'name'])
        ];
        return view('page.purchase.input-purchase', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'                  => 'required|string',
            'supplier_id'              => 'required',
            'item_id    '              => 'required',
            'purchase_id'              => 'required',
            'tgl_faktur'               => 'required',
            'tgl_jatuh_tempo'          => 'required',
            'grandtotal_pembelian'     => 'required',
            'qty'                      => 'required',
            'purchase_price'           => 'required|string',
        ]);
    }

    public function update(Request $request){


        $user_id                = $request->user_id;
        $supplier_id            = $request->supplier_id;
        $purchase_id            = $request->purchase_id;
        $tgl_faktur             = $request->tgl_faktur;
        $tgl_jatuh_tempo        = $request->tgl_jatuh_tempo;
        $grandtotal_pembelian   = $request->grandtotal_pembelian;
        $purchase_price         = $request->purchase_price;
        $qty                    = $request->qty;

        $data = Item::find($request->items_id);
        dd($user_id);
        $minimum_stock             = $data->minimum_stock;
        $purchase_item             = $request->purchase_item;
        $data->minimum_stock       = $minimum_stock + $purchase_item;
        $data->save();

        $purchase = new Purchase;
        $purchase->user_id                  = $user_id;
        $purchase->supplier_id              = $supplier_id;
        $purchase->tgl_faktur               = $tgl_faktur;
        $purchase->tgl_jatuh_tempo          = $tgl_jatuh_tempo;
        $purchase->grandtotal_pembelian     = $grandtotal_pembelian;
        $purchase->save();

        $purchase_item = new Purchase_item;
        $purchase_item->purchase_id                 = $purchase_id;
        // $purchase_item->$Item_id                    = $Item_id;
        $purchase_item->$qty                        = $qty;
        $purchase_item->$purchase_price             = $purchase_price;
        $purchase_item->save();

        return redirect()->route('Item');
    }

    public function return()
    {
        return view('page.purchase.return-purchase');
    }

    public function report()
    {
        return view('page.purchase.report-purchase');
    }

    public function return_report()
    {
        return view('page.purchase.return-report-purchase');
    }

    public function view()
    {
        return view('page.purchase.supllier-data');
    }
    public function getItemData(Request $request)
    {
        $unit = Item::with('unit', 'ppnType')
            ->where('code', $request->code)
            ->first();
        return response()->json($unit);
    }
}
