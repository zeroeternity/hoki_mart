<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemVoucher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VoucherItemController extends Controller
{
    public function index()
    {

        $outlet_id = User::find(Auth::id())->outlet_id;
        $data = [
            'items' => Item::with('group', 'ppnType', 'unit', 'purchaseItem', 'outletItem')
                ->where('status', '1')
                ->get()
                ->map(fn($item) => [
                    ...$item->toArray(),
                    'purchase_item' => $item->purchaseItem()->latest()->first(),
                    'outlet_item' => $item->outletItem()->latest()->first(),
                ]),
            'item_vouchers' => ItemVoucher::with('items', 'outlet')
                ->where('status', '1')
                ->where('outlet_id', $outlet_id)
                ->orderBy('created_at', 'desc')
                ->get(),
        ];
        return view('page.voucher.voucher-item', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|unique:item_vouchers,item_id',
            'selling_price' => 'required',
            'percent_non_margin' => 'required',
        ]);

        $item_id = $request->item_id;
        $outlet_id = User::find(Auth::id())->outlet_id;
        $sale_price = $request->selling_price;
        $margin = $request->percent_non_margin;

        $item_voucher = new ItemVoucher();
        $item_voucher->item_id = $item_id;
        $item_voucher->outlet_id = $outlet_id;
        $item_voucher->sale_price = $sale_price;
        $item_voucher->margin = $margin;
        $item_voucher->status = '1';
        $item_voucher->save();

        Alert::success('Voucher Barang Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $outlet_id = User::find(Auth::id())->outlet_id;
        $item_vouchers = ItemVoucher::with('items', 'outlet')
            ->where('outlet_id', $outlet_id)
            ->orderBy('created_at', 'desc')
            ->find($id);
        $item_purchase_price = Item::with('purchaseItem', 'latestPurchaseItem')
            ->where('id', $item_vouchers->item_id)
            ->where('status', '1')
            ->get();
        $data = [
            'id' => $item_vouchers->id,
            'item_id' => $item_vouchers->item_id,
            'code_name' => $item_vouchers->items->code,
            'item_name' => $item_vouchers->items->name,
            'sale_price' => $item_vouchers->sale_price,
            'margin' => $item_vouchers->margin,
            'purchase_price' => $item_purchase_price[0]->latestPurchaseItem->purchase_price,
            'items' => Item::with('group', 'ppnType', 'unit', 'purchaseItem', 'outletItem')
                ->where('status', '1')
                ->get()
                ->map(fn($item) => [
                    ...$item->toArray(),
                    'purchase_item' => $item->purchaseItem()->latest()->first(),
                    'outlet_item' => $item->outletItem()->latest()->first(),
                ]),
        ];
        return view('page.voucher.edit-voucher-item', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'selling_price' => 'required',
            'percent_non_margin' => 'required',
        ]);

        $id = $request->id;
        $sale_price = $request->selling_price;
        $margin = $request->percent_non_margin;

        $item_voucher = ItemVoucher::find($id);
        $item_voucher->sale_price = $sale_price;
        $item_voucher->margin = $margin;
        $item_voucher->save();

        Alert::success('Voucher Barang Berhasil Diupdate');
        return redirect()->route('voucher-item');
    }
}
