<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Goods;
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
            'goods_id'                 => 'required',
            'no_faktur'                => 'required',
            'tgl_faktur'               => 'required',
            'tgl_jatuh_tempo'          => 'required',
            'grandtotal_pembelian'     => 'required',
            'purchase_price'           => 'required|string',
        ]);
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
    public function getGoodsData(Request $request)
    {
        $unit = Goods::with('unit', 'ppnType')
            ->where('code', $request->code)
            ->first();
        return response()->json($unit);
    }
}
