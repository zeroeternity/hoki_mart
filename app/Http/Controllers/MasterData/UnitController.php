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
        return view('page.master-data.unit.unit', $data);
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

    public function edit($id){
        $dataUnit = Unit::find($id);
        $data = [
            'id'                => $dataUnit->id,
            'name'              => $dataUnit->name,
        ];
        return view('page.master-data.unit.edit-unit', $data);
    }

    public function update(request $request)
    {
        $request->validate([
            'name'              => 'required|string',
        ]);

        $id         = $request->id;
        $name           = $request->name;

        $dataUnit = Unit::find($id);
        $dataUnit->name             = $name;
        $dataUnit->save();

        return redirect()->route('unit');
    }

    public function destroy($id)
    {
        Unit::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
