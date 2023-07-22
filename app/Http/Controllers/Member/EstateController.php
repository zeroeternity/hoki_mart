<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EstateController extends Controller
{

    public function create(){
        return view('page.member.data-member.create-estate');
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

        Alert::success('Estate Berhasil Ditambahkan');

        return redirect()->route('member',['#estate']);
    }

    public function edit($id){
        $dataEstate = Estate::find($id);
        $data = [
            'id'        => $dataEstate->id,
            'code'      => $dataEstate->code,
            'estate'    => $dataEstate->estate,
        ];
        return view('page.member.data-member.edit-estate', $data);
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

        Alert::success('Estate Berhasil Diupdate');

        return redirect()->route('member',['#estate']);
    }

    public function destroy($id)
    {
        Estate::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
}
