<?php

namespace App\Http\Controllers\RoleMember;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\OutletItem;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MemberDashboardController extends Controller
{
    public function index()
    {
        $member_id = Auth::id();
        $data = [
            'dataTransaksi' => Sale::with('cashier', 'member')->where('member_id', $member_id)
                ->where('payment_method', '1')
                ->where('status', '0')
                ->orderBy('created_at', 'desc')
                ->get(),
            'allTransaction' => Sale::where('payment_method', '1')
                ->where('status', '0')
                ->count(),
            'oneDayTransaction' => Sale::where('payment_method', '1')
                ->whereDate('created_at', '>=', now()->toDateString())
                ->where('status', '0')
                ->count(),
        ];

        return view('member.dashboard', $data);
    }

    public function view($id)
    {
        $data = Sale::with(['saleItem', 'saleItem.outletItem', 'cashier', 'member'])
            ->where('status', '0')
            ->find($id);
        $title = 'Reject Transaction!';
        $text = "Are you sure you want to reject transaction?";
        confirmDelete($title, $text);
        return view('member.dashboard-view', compact('data'));
    }

    public function approved($id)
    {
        DB::beginTransaction();
        try {
            $sale_item = SaleItem::with('outletItem')->where('sale_id', $id)->get();

            foreach ($sale_item as $item) {
                $item_data = Item::find($item['outletItem']['item_id']);
                $item_outlet = OutletItem::find($item['outletItem']['id']);
                // formula stock
                $stock = $item_outlet['minimum_stock'] - $item['qty'];
                // update stock from item
                $update_item = OutletItem::find($item_outlet['id']);
                $update_item->minimum_stock = $stock;
                $update_item->save();
            }

            $sale = Sale::find($id);
            $sale->status = '1';
            $sale->save();

            DB::commit();
            Alert::success('Transaksi Berhasil Disetujui');
            return redirect()->route('member.dashboard');
        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return $this->responseJSON([], 500, $th);
        }
    }

    public function reject($id)
    {

        $sale = Sale::find($id);
        $sale->status = '2';
        $sale->save();

        Alert::success('Transaksi Berhasil Direject');
        return redirect()->route('member.dashboard');
    }
}
