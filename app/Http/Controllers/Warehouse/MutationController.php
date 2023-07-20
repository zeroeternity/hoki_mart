<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Mutation;
use App\Models\Item;

use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function index()
    {
        $data = [
            'dataMutation'      => Mutation::with('outlet', 'item', 'item.outlet')
                                    ->orderBy('created_at', 'desc')
                                    ->get()
                                    ,
        ];

        // dd($data['dataMutation']);
        return view('page.warehouse.mutation.mutation', $data);
    }

    public function create()
    {
        $data = [
            'dataOutlet'  => Outlet::all(['id', 'name']),
            'dataItem'  => Item::all(['id', 'name']),
        ];
        return view('page.warehouse.mutation.input-mutation', $data);
    }

    public function update(Request $request){
        $request->validate([
            'item_id'              => 'required',
            'outlet_id'            => 'required',
        ]);

        $item_id           = $request->item_id;
        $outlet_id         = $request->outlet_id;

        $data = Item::find($item_id);
        $outlet_id             = $data->outlet_id;
        $mutation              = $request->mutation;
        $data->outlet_id       = $mutation;
        $data->save();

        $mutate = new Mutation;
        $mutate->outlet_id = $outlet_id;
        $mutate->item_id = $item_id;
        $mutate->save();

        return redirect()->route('mutation');
    }

}
