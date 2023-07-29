<?php

namespace App\Http\Controllers\RoleMember;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $member_id = Auth::id();
        $data = [
            'dataTransaksi' => Sale::with('cashier', 'member')
                ->where('member_id', $member_id)
                ->whereIn('status', ['1', '2'])
                ->orderBy('created_at', 'desc')
                ->get(),
        ];
        return view('member.history', $data);
    }

    public function view($id)
    {
        $data = Sale::with(['saleItem', 'saleItem.outletItem', 'cashier', 'member'])
            ->whereIn('status', ['1', '2'])
            ->find($id);
        return view('member.history-view', compact('data'));
    }
}
