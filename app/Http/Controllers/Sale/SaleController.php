<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Item;
use App\Models\OutletItem;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SaleController extends Controller
{
    public function index()
    {
        $data = [
            'dataSaleItem' => SaleItem::with('sales', 'outletItem')
                ->orderBy('created_at', 'desc')
                ->get(),
            'dataSale' => Sale::with('cashier', 'member')
                ->orderBy('created_at', 'desc')
                ->get(),
        ];
        return view('page.sale.sale', $data);
    }

    public function create()
    {
        $data = [
            'users' => User::with('estate')
                ->where('role_id', 4)
                ->get(),
            'items_outlet' => Item::with('unit', 'ppnType', 'outletItem')->get(),
        ];
        return view('page.sale.input-sale', $data);
    }

    public function store(StoreSaleRequest $request)
    {
        DB::beginTransaction();
        try {
            $member_id = $request->member_id;
            $payment_method = $request->payment_method;
            $items = $request->items;

            // Store data purchase
            $sale = new Sale();
            $sale->cashier_id = Auth::id();
            $sale->member_id = $member_id;
            $sale->payment_method = $payment_method;
            $sale->status = '0';
            $sale->confirm_at = null;
            $sale->save();

            // manage array data items
            foreach ($items as $item) {
                // get item data
                $item_data = Item::where('code', $item['code'])->first();
                $item_outlet = OutletItem::find($item_data['id']);
                // store purchase item
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'outlet_item_id' => $item_data['id'],
                    'qty' => $item['qty'],
                    'sale_price' => $item['purchase_price'],
                ]);

                // formula add stock
                $stock = $item_outlet['minimum_stock'] - $item['qty'];

                // update stock from item
                $update_item = OutletItem::find($item_outlet['id']);
                $update_item->minimum_stock = $stock;
                $update_item->save();
            }
            if ($payment_method == 0) {
                $sale_data = $sale->load(['userCashier', 'userMember', 'items'])->loadSum('items', 'qty * sale_price as total');

                $data = [
                    'id' => $sale_data,
                    'cashier' => $sale_data->userCashier->name,
                    'member' => $sale_data->userMember?->name,
                    'payment_method' => $sale_data->payment_method,
                    'status' => $sale_data->status,
                    'created_at' => $sale_data->created_at,
                    'sale_item' => $sale_data->items,
                ];

                DB::commit();
                return redirect()->route('sale.print')->with($data);
            } else {
                DB::commit();
                Alert::success('Transaksi Penjualan Berhasil');
                return redirect()->route('sale');
            }
        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return $this->responseJSON([], 500, $th);
        }
    }

    public function view($id)
    {

        $data = Sale::with(['saleItem','saleItem.outletItem','cashier','member'])->find($id);
//        dd($data);
        return view('page.sale.view-sale',compact('data'));
    }

    public function instalment()
    {
        return view('page.sale.sale-instalment');
    }

    public function create_instalment()
    {
        return view('page.sale.input-sale-instalment');
    }

    public function getData(Request $request)
    {
        $unit = Item::with('unit', 'ppnType', 'outletItem')
            ->where('code', $request->code)
            ->first();
        return response()->json($unit);
    }

    public function print()
    {
        return view('page.sale.print');
    }
}
