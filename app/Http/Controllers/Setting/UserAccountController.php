<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserAccountController extends Controller
{
    public function index(){
        $data = [
            'dataUser'   => User::with('outlet', 'role')->whereIn('role_id', array(2,3))->orderBy('outlet_id', 'asc')->get()
        ];
        return view('page.setting.user-account.user-account', $data);
    }

    public function create(){
        $data = [
            'dataRole'      => Role::whereIn('id', array(2,3))->orderBy('id', 'asc')->get(),
            'dataOutlet'    => Outlet::orderBy('id', 'asc')->get(),
        ];
        return view('page.setting.user-account.input-user-account', $data);
    }

    public function store(Request $request){
        $request->validate([
            'role_id'           => 'required',
            'outlet_id'         => 'required',
            'name'              => 'required|string',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'string|unique:users,phone',
            'password'          => 'required|string|confirmed',
        ]);

        $role_id = $request->role_id;
        $outlet_id      = $request->outlet_id;
        $name           = $request->name;
        $email          = $request->email;
        $phone          = $request->phone;
        $password       = bcrypt($request->password);

        $data = new User();
        $data->role_id          = $role_id;
        $data->outlet_id        = $outlet_id;
        $data->name             = $name;
        $data->email            = $email;
        $data->phone            = $phone;
        $data->password         = $password;
        $data->save();

        Alert::success('User Berhasil Ditambahkan');

        return redirect()->route('user-account');
    }

    public function edit($id){
        $dataUser = User::find($id);
        $data = [
            'id'        => $dataUser->id,
            'role_id'   => $dataUser->role_id,
            'outlet_id' => $dataUser->outlet_id,
            'name'      => $dataUser->name,
            'email'     => $dataUser->email,
            'phone'     => $dataUser->phone,
            'password'  => $dataUser->password,
            'dataRole'      => Role::whereIn('id', array(2,3))->orderBy('id', 'asc')->get(),
            'dataOutlet'    => Outlet::orderBy('id', 'asc')->get(),
        ];
        return view('page.setting.user-account.edit-user-account', $data);
    }

    public function update(Request $request){
        $request->validate([
            'role_id'           => 'required',
            'outlet_id'         => 'required',
            'name'              => 'required|string',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'string|unique:users,phone',
        ]);

        $id             = $request->id;
        $role_id        = $request->role_id;
        $outlet_id      = $request->outlet_id;
        $name           = $request->name;
        $email          = $request->email;
        $phone          = $request->phone;

        $data = User::find($id);
        $data->role_id          = $role_id;
        $data->outlet_id        = $outlet_id;
        $data->name             = $name;
        $data->email            = $email;
        $data->phone            = $phone;
        $data->save();

        Alert::success('User Berhasil Diupdate');

        return redirect()->route('user-account');
    }
}
