<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\MemberData;
use App\Models\MemberType;
use App\Models\Position;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $data = [
            'dataMember'        => MemberData::orderBy('created_at', 'desc')->get(),
            'dataMemberType'    => MemberType::orderBy('created_at', 'desc')->get(),
            'dataPosition'      => Position::orderBy('created_at', 'desc')->get(),
        ];
        return view('page.member.data-member.member', $data);
    }

    public function createData(){
        $data = [
            'dataMemberType' => MemberType::all(['id', 'type']),
            'dataPosition'   => Position::all(['id', 'name']),
            'dataEstate'     => Estate::all(['id', 'estate']),
        ];
        return view('page.member.data-member.create-data', $data);
    }
    public function createType(){
        return view('page.member.data-member.create-type');
    }
    public function createPosition(){
        return view('page.member.data-member.create-position');
    }

    public function storeData(Request $request){
        $request->validate([
            'member_type_id'    => 'required',
            'estate_id'         => 'required',
            'position_id'       => 'required',
            'name'              => 'required|string',
            'ktp'               => 'required|string',
            'gender'            => 'required|string',
            'birthdate'         => 'required|date',
            'entry_date'        => 'required|date',
        ]);
        $member_type_id = $request->member_type_id;
        $estate_id      = $request->estate_id;
        $position_id    = $request->position_id;
        $name           = $request->name;
        $ktp            = str_replace('-','',$request->ktp);
        $gender         = $request->gender;
        $birthdate      = $request->birthdate;
        $entry_date     = $request->entry_date;

        $data = new MemberData();
        $data->member_type_id   = $member_type_id;
        $data->estate_id        = $estate_id;
        $data->position_id      = $position_id;
        $data->name             = $name;
        $data->ktp              = $ktp;
        $data->gender           = $gender;
        $data->birthdate        = $birthdate;
        $data->entry_date       = $entry_date;
        $data->save();

        return redirect()->route('member',['#data']);
    }
    public function storeType(Request $request){
        
        $request->validate([
            'type'          => 'required|string',
            'credit_limit'  => 'required|string',
            'margin'        => 'required|string',
            'range_date'    => 'required|numeric',
            'up_to'         => 'required|numeric'
        ]);

        $type           = $request->type;
        $credit_limit   = str_replace('.','',$request->credit_limit);
        $margin         = $request->margin;
        $range_date     = $request->range_date;
        $up_to          = $request->up_to;

        $data = new MemberType();
        $data->type         = $type;
        $data->credit_limit = $credit_limit;
        $data->margin       = $margin;
        $data->range_date   = $range_date;
        $data->up_to        = $up_to;
        $data->save();

        return redirect()->route('member',['#type']);
    }
    public function storePosition(Request $request){
        $request->validate([
            'name'     => 'required|string',
        ]);
        $name  = $request->name;

        $data = new Position();
        $data->name        = $name;
        $data->save();

        return redirect()->route('member',['#position']);
    }
}
