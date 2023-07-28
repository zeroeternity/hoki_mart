<?php

namespace App\Http\Controllers\RoleMember;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberDashboardController extends Controller
{
    public function index(){
        $member_id = Auth::id();
        $data = [
            'dataTransaksi'   => Sale::with('cashier', 'member')->where('member_id', $member_id)
                ->where('status', '0')
                ->orderBy('created_at', 'desc')
                ->get()
        ];
        return view('member.dashboard', $data);
    }
    public function view($id)
    {
        $data = Sale::with(['saleItem', 'saleItem.outletItem', 'cashier', 'member'])->find($id);
        return view('member.dashboard-view', compact('data'));
    }
    public function store(){

    }
}
