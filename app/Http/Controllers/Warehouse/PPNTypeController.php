<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\PPNType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PPNTypeController extends Controller
{
    public function index(){
        $data = [
            'dataPPN'   => PPNType::orderBy('created_at', 'desc')->get()
        ];

        return view('page.warehouse.ppn.ppn', $data);
    }

    public function store(Request $request){
        $request->validate([
            'type'              => 'required|string',
            'percent'           => 'required|numeric|between:0,999.99',
        ]);
        $type           = $request->type;
        $percent        = $request->percent;

        $data = new PPNType();
        $data->type        = $type;
        $data->percent     = $percent;
        $data->save();

        Alert::success('Tipe PPN Berhasil Ditambahkan');
        return redirect()->route('item');
    }

    public function destroy($id)
    {
        PPNType::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
