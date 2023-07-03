<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        $data = [
            'dataUnit'   => Unit::orderBy('created_at', 'desc')->get()
        ];
        return view('page.master-data.unit', $data);
    }

    public function store(Request $request){
        $request->validate([
            'name'     => 'required|string',
        ]);
        $name  = $request->name;

        $data = new Unit();
        $data->name        = $name;
        $data->save();

        return back()->with('success', 'Create Success!');
    }

    public function destroy($id)
    {
        Unit::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
