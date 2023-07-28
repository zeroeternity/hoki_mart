<?php

namespace App\Http\Controllers\RoleMember;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MemberDashboardController extends Controller
{
    public function index(){
        $member_id = Auth::id();
        $data = [
            'dataTransaksi'   => Sale::with('cashier', 'member')->where('member_id', $member_id)
                ->where('payment_method', '1')
                ->where('status', '0')
                ->orderBy('created_at', 'desc')
                ->get(),
            'allTransaction'    => Sale::where('payment_method', '1')
                ->where('status', '0')
                ->count(),
            'oneDayTransaction'    => Sale::where('payment_method', '1')
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
    public function approved($id){
        $sale = Sale::find($id);
        $sale->status = '1';
        $sale->save();

        Alert::success('Transaksi Berhasil Disetujui');
        return redirect()->route('member.dashboard');
    }
    public function reject($id){

        $sale = Sale::find($id);
        $sale->status = '2';
        $sale->save();

        Alert::success('Transaksi Berhasil Direject');
        return redirect()->route('member.dashboard');
    }
}
