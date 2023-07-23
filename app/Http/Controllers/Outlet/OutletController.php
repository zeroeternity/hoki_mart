<?php

namespace App\Http\Controllers\Outlet;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OutletController extends Controller
{
    public function index(){
        $data = [
            'dataOutlet'   => Outlet::orderBy('created_at', 'desc')->get()
        ];
        return view('page.master-data.outlet.outlet', $data);
    }

    public function store(Request $request){
        $request->validate([
            'name'     => 'required|string',
            'location'     => 'required|string',
        ]);
        $name  = $request->name;
        $location  = $request->location;

        $data = new Outlet();
        $data->name        = $name;
        $data->location    = $location;
        $data->save();

        Alert::success('Outlet Berhasil Ditambahkan');

        return back()->with('success', 'Create Success!');
    }

    public function destroy($id)
    {
        Outlet::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
