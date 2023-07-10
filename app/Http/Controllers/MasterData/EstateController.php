<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index(){
        $data = [
            'dataEstate'   => Estate::orderBy('created_at', 'desc')->get()
        ];
        return view('page.master-data.estate.estate', $data);
    }

    public function create(){
        return view('page.master-data.estate.input-estate');
    }

    public function store(Request $request){
        $request->validate([
            'code'      => 'required|string',
            'estate'    => 'required|string',
        ]);
        $code       = $request->code;
        $estate     = $request->estate;

        $data = new Estate();
        $data->code        = $code;
        $data->estate      = $estate;
        $data->save();

        return redirect()->route('estate');
    }

    public function edit($id){
        $dataEstate = Estate::find($id);
        $data = [
            'id'        => $dataEstate->id,
            'code'      => $dataEstate->code,
            'estate'    => $dataEstate->estate,
        ];
        return view('page.master-data.estate.edit-estate', $data);
    }

    public function update(request $request)
    {
        $request->validate([
            'code'      => 'required|string',
            'estate'    => 'required|string',
        ]);

        $id         = $request->id;
        $code       = $request->code;
        $estate     = $request->estate;

        $dataEstate = Estate::find($id);
        $dataEstate->code        = $code;
        $dataEstate->estate      = $estate;
        $dataEstate->save();

        return redirect()->route('estate');
    }

    public function destroy($id)
    {
        Estate::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}