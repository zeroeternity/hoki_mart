<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Item;
use App\Models\ItemVoucher;
use App\Models\MemberVoucher;
use App\Models\OutletItem;
use App\Models\Receivable;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SaleVoucherItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class VoucherSaleController extends Controller
{
    public function index()
    {
        $data = [
            'dataSale' => Sale::with('cashier', 'member')
                ->orderBy('created_at', 'desc')
                ->where('payment_method', '2')
                ->whereRelation('cashier', 'outlet_id', Auth::user()->outlet_id)
                ->get(),
        ];

        return view('page.voucher.voucher-sale', $data);
    }

    public function create()
    {
        $data = [
            'users' => MemberVoucher::with('users.estate')
                ->whereRelation('users', 'outlet_id', '=', Auth::user()->outlet_id)
                ->where('status', '1')
                ->get(),
            'item_vouchers' => ItemVoucher::with('items.unit', 'items.ppnType', 'items.outletItem', 'outlet')->get(),
        ];
        return view('page.voucher.input-voucher-sale', $data);
    }

    public function getDataItem(Request $request)
    {
        $item_voucher = ItemVoucher::with('items.unit', 'items.ppnType', 'items.outletItem')
            ->whereRelation('items', 'code', '=', $request->code)
            ->first();
        return response()->json($item_voucher);
    }

    public function store(StoreSaleRequest $request)
    {
        DB::beginTransaction();
        try {

            $member_id      = MemberVoucher::find($request->member_id)->member_id;
            $payment_method = $request->payment_method;
            $items          = $request->items;

            $sale = new Sale();
            $sale->cashier_id       = Auth::id();
            $sale->member_id        = $member_id;
            $sale->payment_method   = $payment_method;
            $sale->status           = '1';
            $sale->confirm_at       = null;
            $sale->save();

            $member_voucher = MemberVoucher::where('member_id', $member_id)->first();
            $adjust_total_member_Voucher = $member_voucher['total'] - $request->total_qty;
            $update_member_voucher = MemberVoucher::find($member_voucher['id']);
            $update_member_voucher->total = $adjust_total_member_Voucher;
            $update_member_voucher->save();

            foreach ($items as $item) {
                // get item data
                $item_voucher = ItemVoucher::with('items')->whereRelation('items', 'code', '=', $item['code'])->first();

                $outlet_item = OutletItem::where('item_id', $item_voucher['item_id'])->first();

                $adjust_stock = $outlet_item['minimum_stock'] - $item['qty'];

                $update_stock = OutletItem::find($outlet_item['id']);
                $update_stock->minimum_stock = $adjust_stock;
                $update_stock->save();

                // store voucher item
                SaleVoucherItem::create([
                    'sale_id'           => $sale->id,
                    'item_voucher_id'   => $item_voucher['id'],
                    'qty'               => $item['qty'],
                    'sale_price'        => $item['purchase_price'],
                ]);
            }

            DB::commit();
            Alert::success('Transaksi Penjualan Berhasil');
            return redirect()->route('voucher-sale');
        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return $this->responseJSON([], 500, $th);
        }
    }

    public function view($id)
    {
        $data = Sale::with(['saleVoucherItem', 'saleVoucherItem.voucherItem.items', 'cashier', 'member'])
            ->whereRelation('cashier', 'outlet_id', Auth::user()->outlet_id)
            ->find($id);
        return view('page.voucher.view-voucher-sale', compact('data'));
    }

    public function print(Request $request)
    {
        $id = $request->query('id');

        $sale = Sale::with(['userCashier', 'userMember', 'voucherItem.items'])->find($id);

        $data = [
            'id' => $sale->id,
            'cashier' => $sale->userCashier->name,
            'member' => $sale->userMember?->name,
            'payment_method' => $sale->payment_method,
            'status' => $sale->status,
            'sale_item' => $sale->voucherItem,
            'voucher' => 0, //voucher hard code
            'total' => $sale->total,
            'subtotal' => $sale->total - 0, //-voucher hard code
            'created_at' => $sale->created_at,
        ];

        return view('page.voucher.print-voucher', $data);
    }
}
