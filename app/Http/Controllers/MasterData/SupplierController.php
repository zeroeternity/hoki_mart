<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $data = [
            'dataSupplier'   => Supplier::orderBy('created_at', 'desc')->get()
        ];
        return view('page.master-data.supplier', $data);
    }

    public function store(Request $request){
    }

    public function destroy($id)
    {
    }
}
