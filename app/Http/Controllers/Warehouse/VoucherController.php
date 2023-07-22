<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VoucherController extends Controller
{
    public function index(){
        $data = [
            'dataVOucher'   => Voucher::orderBy('created_at', 'desc')->get()
        ];

        return view('page.warehouse.voucher.voucher', $data);
    }

    public function store(Request $request){
        $request->validate([
            'code'  => 'required|string',
            'name'  => 'required|string',
        ]);

        $code   = $request->code;
        $name   = $request->name;

        $data = new Voucher();
        $data->code = $code;
        $data->name = $name;
        $data->save();

        Alert::success('Voucher Barang Berhasil Ditambahkan');
        return redirect()->route('item');
    }

    public function destroy($id)
    {
        Voucher::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
