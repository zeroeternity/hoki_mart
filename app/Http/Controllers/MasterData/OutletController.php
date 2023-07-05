<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index(){
        $data = [
            'dataOutlet'   => Outlet::orderBy('created_at', 'desc')->get()
        ];
        return view('page.master-data.outlet', $data);
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

        return back()->with('success', 'Create Success!');
    }

    public function destroy($id)
    {
        Outlet::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
