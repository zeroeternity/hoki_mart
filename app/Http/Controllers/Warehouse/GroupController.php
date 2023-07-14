<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $data = [
            'dataGroup'   => Group::orderBy('created_at', 'desc')->get()
        ];

        return view('page.warehouse.group.group', $data);
    }

    public function store(Request $request){
        $request->validate([
            'code'              => 'required|string',
            'name'              => 'required|string',
        ]);
        $code           = $request->code;
        $name           = $request->name;

        $data = new Group();
        $data->code        = $code;
        $data->name        = $name;
        $data->save();

        return redirect()->route('goods');
    }

    public function destroy($id)
    {
        Group::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
