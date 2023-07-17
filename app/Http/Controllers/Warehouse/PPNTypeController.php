<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\PPNType;
use Illuminate\Http\Request;

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
            'ppn_buy'           => 'required|numeric|between:0,999.99',
        ]);
        $type           = $request->type;
        $percent        = $request->percent;
        $ppn_buy        = $request->ppn_buy;

        $data = new PPNType();
        $data->type        = $type;
        $data->percent     = $percent;
        $data->ppn_buy     = $ppn_buy;
        $data->save();
        
        return redirect()->route('item');
    }

    public function destroy($id)
    {
        PPNType::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
