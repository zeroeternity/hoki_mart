<?php

namespace App\Http\Controllers\RoleMember;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberDashboardController extends Controller
{
    public function index(){
        return view('member.dashboard');
    }
}
