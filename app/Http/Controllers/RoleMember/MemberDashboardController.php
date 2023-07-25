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
            'dataTransaksi'   => Sale::where('member_id', $member_id)
                ->where('status', '0')
                ->orderBy('created_at', 'desc')
                ->get()
        ];
        dd($data);
        return view('member.dashboard');
    }
}
