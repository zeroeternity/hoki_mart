<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                'supllier_id'           => 'required',
                'invoice_number'        => 'required|string',
                'invoice_date'          => 'required|date',
                'due_date'              => 'required|date',
                'items.*.code'           => 'required|string',
                'items.*.qty'            => 'required|numeric',
                'items.*.purchase_price' => 'required|numeric',
                'items'                 => 'required',
            ]);

            $supllier_id    = $request->supllier_id;
            $invoice_number = $request->invoice_number;
            $invoice_date   = $request->invoice_date;
            $due_date       = $request->due_date;
            $items          = $request->items;

            // Store data purchase
            $purchase = new Purchase();
            $purchase->user_id          =  Auth::id();
            $purchase->supllier_id      = $supllier_id;
            $purchase->invoice_number   = $invoice_number;
            $purchase->invoice_date     = $invoice_date;
            $purchase->due_date         = $due_date;
            $purchase->save();

            // manage array data items
            foreach ($items as $item) {
                // get item data
                $item_data = Item::where('code', $item['code'])->first();
                $item_outlet = OutletItem::where('id', $item_data['id'])->first();
                // store purchase item
                PurchaseItem::create([
                    'purchase_id'       => $purchase->id,
                    'item_id'           => $item_data['id'],
                    'qty'               => $item['qty'],
                    'purchase_price'    => $item['purchase_price'],
                ]);

                // formula add stock
                $stock = $item_outlet['minimum_stock'] + $item['qty'];

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
