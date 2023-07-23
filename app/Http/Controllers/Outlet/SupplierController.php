<?php

namespace App\Http\Controllers\Outlet;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function index(){
        $data = [
            'dataSupplier'   => Supplier::orderBy('created_at', 'desc')->get()
        ];
        return view('page.master-data.supplier.supplier', $data);
    }

    public function create(){
        return view('page.master-data.supplier.input-supplier');
    }

    public function store(Request $request){
        $request->validate([
            'code'              => 'required|unique:suppliers,code',
            'name'              => 'required|string',
            'address'           => 'required|string',
            'account_number'    => 'required|string',
            'account_owner'     => 'required|string',
            'bank_name'         => 'required|string',
            'npwp'              => 'string',
            'telephone'         => 'required|numeric',
            'email'             => 'required|email',
        ]);

        $code           = $request->code;
        $name           = $request->name;
        $address        = $request->address;
        $account_number = $request->account_number;
        $account_owner  = $request->account_owner;
        $bank_name      = $request->bank_name;
        $npwp           = $request->npwp;
        $telephone      = $request->telephone;
        $email          = $request->email;

        $data = new Supplier();
        $data->code             = $code;
        $data->name             = $name;
        $data->address          = $address;
        $data->account_number   = $account_number;
        $data->account_owner    = $account_owner;
        $data->bank_name        = $bank_name;
        $data->npwp             = $npwp;
        $data->telephone        = $telephone;
        $data->email            = $email;
        $data->state            = '1';
        $data->save();

        Alert::success('Supplier Berhasil Ditambahkan');


        return redirect()->route('supplier');
    }

    public function edit($id){
        $dataSupplier = Supplier::find($id);
        $data = [
            'id'                => $dataSupplier->id,
            'code'              => $dataSupplier->code,
            'name'              => $dataSupplier->name,
            'address'           => $dataSupplier->address,
            'account_number'    => $dataSupplier->account_number,
            'account_owner'     => $dataSupplier->account_owner,
            'bank_name'         => $dataSupplier->bank_name,
            'npwp'              => $dataSupplier->npwp,
            'telephone'         => $dataSupplier->telephone,
            'email'             => $dataSupplier->email,
            'state'             => $dataSupplier->state,
        ];
        return view('page.master-data.supplier.edit-supplier', $data);
    }

    public function update(request $request)
    {
        $request->validate([
            'code'              => ['required','string', Rule::unique('suppliers', 'code')->ignore($request->id, 'id')],
            'name'              => 'required|string',
            'address'           => 'required|string',
            'account_number'    => 'required|string',
            'account_owner'     => 'required|string',
            'bank_name'         => 'required|string',
            'npwp'              => 'string',
            'telephone'         => 'required|numeric',
            'email'             => 'required|email',
            'state'             => 'required',
        ]);

        $id             = $request->id;
        $code           = $request->code;
        $name           = $request->name;
        $address        = $request->address;
        $account_number = $request->account_number;
        $account_owner  = $request->account_owner;
        $bank_name      = $request->bank_name;
        $npwp           = $request->npwp;
        $telephone      = $request->telephone;
        $email          = $request->email;
        $state          = $request->state;

        $dataSupplier = Supplier::find($id);
        $dataSupplier->code             = $code;
        $dataSupplier->name             = $name;
        $dataSupplier->address          = $address;
        $dataSupplier->account_number   = $account_number;
        $dataSupplier->account_owner    = $account_owner;
        $dataSupplier->bank_name        = $bank_name;
        $dataSupplier->npwp             = $npwp;
        $dataSupplier->telephone        = $telephone;
        $dataSupplier->email            = $email;
        $dataSupplier->state            = $state;
        $dataSupplier->save();

        Alert::success('Supplier Berhasil Diupdate');

        return redirect()->route('supplier');
    }

    public function destroy($id)
    {
    }
}
