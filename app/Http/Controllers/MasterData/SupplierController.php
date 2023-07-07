<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

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
            'code'              => 'required|unique:m_suppliers,code',
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

        return redirect()->route('supplier');
    }

    public function destroy($id)
    {
    }
}
