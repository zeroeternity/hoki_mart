<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Purchase_item;
use App\Models\Item;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        try {
            $request->validate([
                'supllier_id'           => 'required',
                'invoice_number'        => 'required|string',
                'invoice_date'          => 'required|date',
                'due_date'              => 'required|date',
                'items.*.code'           => 'required|string',
                'items.*.qty'            => 'required|numeric',
                'items.*.purchase_price' => 'required|numeric',
            ]);
    
            $supllier_id    = $request->supllier_id;
            $invoice_number = $request->invoice_number;
            $invoice_date   = $request->invoice_date;
            $due_date       = $request->due_date;
            $items          = $request->items;

            $purchase = new Purchase();
            $purchase->user_id          =  Auth::id();
            $purchase->supllier_id      = $supllier_id;
            $purchase->invoice_number   = $invoice_number;
            $purchase->invoice_date     = $invoice_date;
            $purchase->due_date         = $due_date;
            $purchase->save();
            
            foreach ($items as $item) {
                $item_data = Item::where('code', $item['code'])->first();

                PurchaseItem::create([
                    'purchase_id'       => $supllier_id,
                    'item_id'           => $item_data['id'],
                    'qty'               => $item['qty'],
                    'purchase_price'    => $item['purchase_price'],
                ]);

                $stock = $item_data['minimum_stock'] + $item['qty'];

                $update_item = Item::find($item_data['id']);
                $update_item->minimum_stock = $stock;
                $update_item->save();
            }

            return redirect()->route('purchase');
            
        } catch (\Exception $th) {
            throw $th;
            return $this->responseJSON([], 500, $th);
        } 
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
