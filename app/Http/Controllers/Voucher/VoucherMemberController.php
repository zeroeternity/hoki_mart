<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoucherMemberController extends Controller
{
    public function index(){
        return view('page.voucher.voucher-member');
    }
}
