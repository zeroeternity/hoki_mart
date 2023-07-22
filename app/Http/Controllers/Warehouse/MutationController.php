<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Mutation;
use App\Models\Item;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MutationController extends Controller
{
    public function index()
    {
        $data = [
            'dataMutation'      => Mutation::with('outlet', 'item', 'item.outlet')
                                    ->orderBy('created_at', 'desc')
                                    ->get(),
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
        $qty               = $request->qty;

        $data = Item::find($item_id);
        $minimum_stock         = $data->minimum_stock;
        $qty                   = $request->qty;
        $data->minimum_stock   = $minimum_stock - $qty;
        $data->save();

        $mutate = new Item;
        $mutate->outlet_id = $outlet_id;
        $mutate->item_id   = $item_id;
        $mutate->qty       = $qty;
        $mutate->save();

        $mutate = new Mutation;
        $mutate->outlet_id = $outlet_id;
        $mutate->item_id   = $item_id;
        $mutate->qty       = $qty;
        $mutate->save();

        Alert::success('Transaksi Mutasi Barang Berhasil');

        return redirect()->route('mutation');
    }

}
