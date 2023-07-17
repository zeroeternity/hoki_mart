<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\MemberData;
use App\Models\MemberType;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index(){
        $data = [
            'dataMember'        => User::where('role_id','4')
                                        ->with('memberType', 'estate', 'position')
                                        ->orderBy('created_at', 'desc')->get(),
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
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required|string|unique:users,phone',
            'ktp'               => 'required|string',
            'gender'            => 'required|string',
            'birthdate'         => 'required|date',
            'entry_date'        => 'required|date',
        ]);

        $member_type_id = $request->member_type_id;
        $estate_id      = $request->estate_id;
        $position_id    = $request->position_id;
        $name           = $request->name;
        $email          = $request->email;
        $phone          = $request->phone;
        $ktp            = str_replace('-','',$request->ktp);
        $gender         = $request->gender;
        $birthdate      = $request->birthdate;
        $entry_date     = $request->entry_date;
        $password       = bcrypt(str_replace('-','',$request->birthdate));

        $data = new User();
        $data->role_id          = 3;
        $data->outlet_id        = 1;
        $data->member_type_id   = $member_type_id;
        $data->estate_id        = $estate_id;
        $data->position_id      = $position_id;
        $data->name             = $name;
        $data->email            = $email;
        $data->phone            = $phone;
        $data->ktp              = $ktp;
        $data->gender           = $gender;
        $data->birthdate        = $birthdate;
        $data->entry_date       = $entry_date;
        $data->password         = $password;
        $data->save();

        return redirect()->route('member',['#data']);
    }
    public function storeType(Request $request){
        $request->validate([
            'type'          => 'required|string',
            'credit_limit'  => 'required|string',
            'margin'        => 'required|numeric|between:0,999.99',
            'range_date'    => 'required|numeric',
            'up_to'         => 'required|numeric'
        ]);

        $type           = $request->type;
        $credit_limit   = str_replace('.','',$request->credit_limit);
        $margin         = $request->margin;
        $range_date     = $request->range_date;
        $up_to          = $request->up_to;
        $state          = $request->state;

        $data = new MemberType();
        $data->type         = $type;
        $data->credit_limit = $credit_limit;
        $data->margin       = $margin;
        $data->range_date   = $range_date;
        $data->up_to        = $up_to;
        $data->state        = $state;
        $data->save();

        return redirect()->route('member',['#type']);
    }
    public function storePosition(Request $request){
        $request->validate([
            'name'  => 'required|string',
        ]);
        $name  = $request->name;

        $data = new Position();
        $data->name = $name;
        $data->save();

        return redirect()->route('member',['#position']);
    }

    public function editData($id){
        $dataMember = User::where('role_id','3')
                               ->with('memberType', 'estate', 'position')
                               ->find($id);
        $data = [
            'id'                => $dataMember->id,
            'member_type_id'    => $dataMember->memberType->id,
            'estate_id'         => $dataMember->estate->id,
            'position_id'       => $dataMember->position->id,
            'name'              => $dataMember->name,
            'email'             => $dataMember->email,
            'phone'             => $dataMember->phone,
            'password'          => $dataMember->password,
            'ktp'               => $dataMember->ktp,
            'gender'            => $dataMember->gender,
            'birthdate'         => $dataMember->birthdate,
            'entry_date'        => $dataMember->entry_date,
            'state'             => $dataMember->state,
            'dataMemberType'    => MemberType::all(['id', 'type']),
            'dataPosition'      => Position::all(['id', 'name']),
            'dataEstate'        => Estate::all(['id', 'estate']),
        ];
        return view('page.member.data-member.edit-data', $data);
    }
    public function editType($id){
        $dataMemberType = MemberType::find($id);
        $data = [
            'id'                => $dataMemberType->id,
            'type'              => $dataMemberType->type,
            'credit_limit'      => $dataMemberType->credit_limit,
            'margin'            => $dataMemberType->margin,
            'range_date'        => $dataMemberType->range_date,
            'up_to'             => $dataMemberType->up_to,
            'state'             => $dataMemberType->state,
        ];
        return view('page.member.data-member.edit-type', $data);
    }
    public function editPosition($id){
        $dataPosition = Position::find($id);
        $data = [
            'id'                => $dataPosition->id,
            'name'              => $dataPosition->name,
        ];
        return view('page.member.data-member.edit-position', $data);
    }

    public function updateData(Request $request){
        $request->validate([
            'member_type_id'    => 'required',
            'estate_id'         => 'required',
            'position_id'       => 'required',
            'name'              => 'required|string',
            'email'             => ['required','email', Rule::unique('users', 'email')->ignore($request->id, 'id')],
            'phone'             => ['required','string', Rule::unique('users', 'phone')->ignore($request->id, 'id')],
            'ktp'               => 'required|string',
            'gender'            => 'required|string',
            'birthdate'         => 'required|date',
            'entry_date'        => 'required|date',
        ]);

        $id             = $request->id;
        $member_type_id = $request->member_type_id;
        $estate_id      = $request->estate_id;
        $position_id    = $request->position_id;
        $name           = $request->name;
        $email          = $request->email;
        $phone          = $request->phone;
        $ktp            = str_replace('-','',$request->ktp);
        $gender         = $request->gender;
        $birthdate      = $request->birthdate;
        $entry_date     = $request->entry_date;

        $data = User::find($id);
        $data->role_id          = 3;
        $data->outlet_id        = 1;
        $data->member_type_id   = $member_type_id;
        $data->estate_id        = $estate_id;
        $data->position_id      = $position_id;
        $data->name             = $name;
        $data->email            = $email;
        $data->phone            = $phone;
        $data->ktp              = $ktp;
        $data->gender           = $gender;
        $data->birthdate        = $birthdate;
        $data->entry_date       = $entry_date;
        $data->save();

        return redirect()->route('member',['#data']);
    }
    public function updateType(Request $request){
        
        $request->validate([
            'type'          => 'required|string',
            'credit_limit'  => 'required|string',
            'margin'        => 'required|numeric|between:0,999.99',
            'range_date'    => 'required|numeric',
            'up_to'         => 'required|numeric'
        ]);

        $id             = $request->id;
        $type           = $request->type;
        $credit_limit   = str_replace('.','',$request->credit_limit);
        $margin         = $request->margin;
        $range_date     = $request->range_date;
        $up_to          = $request->up_to;
        $state          = $request->state;

        $data = MemberType::find($id);
        $data->type         = $type;
        $data->credit_limit = $credit_limit;
        $data->margin       = $margin;
        $data->range_date   = $range_date;
        $data->up_to        = $up_to;
        $data->state        = $state;
        $data->save();

        return redirect()->route('member',['#type']);
    }
    public function updatePosition(Request $request){
        $request->validate([
            'name'     => 'required|string',
        ]);

        $id    = $request->id;
        $name  = $request->name;

        $data = Position::find($id);
        $data->name = $name;
        $data->save();

        return redirect()->route('member',['#position']);
    }
}
