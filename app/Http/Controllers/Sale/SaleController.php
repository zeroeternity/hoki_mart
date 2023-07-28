<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Item;
use App\Models\OutletItem;
use App\Models\Receivable;
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
            'users'   => User::with('estate','memberType')
                ->where('role_id', 4)
                ->get(),
            'items_outlet' => Item::with('unit', 'ppnType', 'outletItem')->get(),
            'receivable' => Receivable::all(),
        ];
        // dd($data['users']);
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


            }
            if ($payment_method == 0) {
                foreach ($items as $item){
                    // formula add stock
                    $stock = $item_outlet['minimum_stock'] - $item['qty'];

                    // update stock from item
                    $update_item = OutletItem::find($item_outlet['id']);
                    $update_item->minimum_stock = $stock;
                    $update_item->save();
                }
                DB::commit();
                Alert::success('Transaksi Penjualan Berhasil');
                return redirect()->route('sale.view', [$sale->id]);
            } else {
                $receivable = Receivable::where('user_id', $member_id)->first();
                $receivable_user = User::where('id',$member_id)->with('memberType')->first();
                $receivable_amount = $receivable->amount;
                $receivable_limit = $receivable_user->memberType->credit_limit;
                $total_sale = $request->grand_total;
                $receivable_limit_amount = $receivable_limit - $receivable_amount;
                if($total_sale > $receivable_limit_amount){
                    Alert::error('Limit Melebihi Batas');
                    DB::rollback();
                    return redirect()->route('sale.create');
                }
                $receivable->amount = $receivable_amount + $total_sale;
                $receivable->save();
                foreach ($items as $item){
                    // formula add stock
                    $stock = $item_outlet['minimum_stock'] - $item['qty'];

                    // update stock from item
                    $update_item = OutletItem::find($item_outlet['id']);
                    $update_item->minimum_stock = $stock;
                    $update_item->save();
                }
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
        $data = Sale::with(['saleItem', 'saleItem.outletItem', 'cashier', 'member'])->find($id);
        return view('page.sale.view-sale', compact('data'));
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

    public function print(Request $request)
    {
        $id = $request->query('id');

        $sale = Sale::with(['userCashier', 'userMember', 'items'])->find($id);

        $data = [
            'id' => $sale->id,
            'cashier' => $sale->userCashier->name,
            'member' => $sale->userMember?->name,
            'payment_method' => $sale->payment_method,
            'status' => $sale->status,
            'sale_item' => $sale->items,
            'voucher'=>0,//voucher hard code
            'total'=>$sale->total,
            'subtotal'=> $sale->total - 0, //-voucher hard code
            'created_at' => $sale->created_at,
        ];

        return view('page.sale.print', $data);
    }
}
