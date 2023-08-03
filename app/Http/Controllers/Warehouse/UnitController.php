<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends Controller
{
    public function index()
    {
        $data = [
            'dataUnit'   => Unit::orderBy('created_at', 'desc')->get()
        ];
        return view('page.warehouse.unit.unit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
        ]);
        $name  = $request->name;

        $data = new Unit();
        $data->name        = $name;
        $data->save();

        Alert::success('Ssatuan Barang Berhasil Ditambahkan');
        return redirect()->route('item');
    }

    public function edit($id)
    {
        $dataUnit = Unit::find($id);
        $data = [
            'id'                => $dataUnit->id,
            'name'              => $dataUnit->name,
        ];
        return view('page.warehouse.unit.edit-unit', $data);
    }

    public function update(request $request)
    {
        $request->validate([
            'name'              => 'required|string',
        ]);

        $id         = $request->id;
        $name       = $request->name;

        $dataUnit = Unit::find($id);
        $dataUnit->name             = $name;
        $dataUnit->save();

        Alert::success('Satuan Barang Berhasil Diupdate');
        return redirect()->route('item');
    }

    public function destroy($id)
    {
        Unit::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }

    public function getData()
    {
        $unit = Unit::orderBy('created_at', 'desc')->get();
        return response()->json($unit);
    }
}
