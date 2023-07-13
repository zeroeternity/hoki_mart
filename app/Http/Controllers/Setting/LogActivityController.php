<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function index(){
        $data = [
            'dataUser'   => User::where('role_id', '2')->orderBy('created_at', 'desc')->get()
        ];
        return view('page.setting.log-activity', $data);
    }
    public function detail($id){
        
        $data = [
            'dataLogActivity'   => LogActivity::with('user')->where('user_id', "$id")->orderBy('created_at', 'desc')->get()
        ];
        return view('page.setting.log-activity-detail', $data);
    }
}
