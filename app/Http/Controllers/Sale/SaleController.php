<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\OutletItem;
use App\Models\Sale;
use App\Models\Sale_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        return view('page.sale.sale');
    }

    public function create()
    {

        return view('page.sale.input-sale');
    }

    public function instalment()
    {
        return view('page.sale.sale-instalment');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'payment_method'        => 'required|string',
                'items.*.code'           => 'required|string',
                'items.*.qty'            => 'required|numeric',
                'items.*.purchase_price' => 'required|numeric',
                'items'                 => 'required',
            ]);

            $member_id    = $request->member_id;
            $payment_method = $request->payment_method;
            $items          = $request->items;

            // Store data purchase
            $sale = new Sale();
            $sale->cashier_id          =  Auth::id();
            $sale->member_id      = $member_id;
            $sale->payment_method   = $payment_method;
            $sale->save();

            // manage array data items
            foreach ($items as $item) {
                // get item data
                $item_data = Item::where('code', $item['code'])->first();
                $item_outlet = OutletItem::where('id', $item_data['id'])->first();
                // store purchase item
                Sale_Item::create([
                    'sale_id'       => $sale->id,
                    'outlet_item_id'           => $item_data['id'],
                    'qty'               => $item['qty'],
                    'sale_price'    => $item['purchase_price'],
                ]);

                // formula add stock
                $stock = $item_outlet['minimum_stock'] - $item['qty'];

                // update stock from item
                $update_item = OutletItem::find($item_outlet['id']);
                $update_item->minimum_stock = $stock;
                $update_item->save();
            }
            DB::commit();
            return redirect()->route('purchase');
        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return $this->responseJSON([], 500, $th);
        }
    }

    public function create_instalment()
    {
        return view('page.sale.input-sale-instalment');
    }
}
