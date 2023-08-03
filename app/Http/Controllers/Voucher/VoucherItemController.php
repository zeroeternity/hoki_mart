<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class VoucherItemController extends Controller
{
    public function index()
    {
        $data = [
            'items'   => Item::with('group', 'ppnType', 'unit', 'purchaseItem', 'outletItem')
                ->where('status', '1')
                ->get()
                ->map(fn ($item) => [
                    ...$item->toArray(),
                    'purchase_item' => $item->purchaseItem()->latest()->first(),
                    'outlet_item'   => $item->outletItem()->latest()->first(),
                ]),
        ];
        return view('page.voucher.voucher-item', $data);
    }
    public function store()
    {
    }
}
