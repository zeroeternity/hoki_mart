<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Mutation;
use App\Models\Item;
use App\Models\OutletItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutationController extends Controller
{
    public function index()
    {
        $data = [
            'dataMutation'      => Mutation::with('outlet_item','outlet_item.outlet','outlet_item.item')
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
            'dataOutletItem'  => OutletItem::all(['id', 'outlet_id']),
        ];
        return view('page.warehouse.mutation.input-mutation', $data);
    }

    public function update(Request $request){
        $item_id        = $request->item_id;
        $sender_id      = $request->sender_id;
        $reciver_id     = $request->receiver_id;
        $qty            = $request->qty;

        $Outlet_Sender      = OutletItem::where('item_id', $item_id)
                                            ->where('outlet_id', $sender_id)
                                            ->first();
        $Outlet_Receiver    = OutletItem::where('outlet_id', $reciver_id)->where('outlet_id', $reciver_id)->first() ;
        if ($Outlet_Receiver->outlet_id != $Outlet_Sender->outlet_id){
            $Outlet_Sender->minimum_stock = $Outlet_Sender->minimum_stock - $qty;
            $Outlet_Receiver->minimum_stock = $Outlet_Sender->minimum_stock + $qty;
            $Outlet_Receiver->save();
            $Outlet_Sender->save();
        }
        else {
            $Outlet_Item_Receiver = new OutletItem;
            $Outlet_Item_Receiver->item_id= $item_id;
            $Outlet_Item_Receiver->outlet_id = $Outlet_Receiver->outlet_id;
            $Outlet_Item_Receiver->selling_price = $Outlet_Sender->selling_price;
            $Outlet_Item_Receiver->percent_non_margin = $Outlet_Sender->percent_non_margin;

            $Outlet_Receiver->save();
            $Outlet_Sender->save();


        }
        $mutate = new Mutation;
        $mutate->outlet_item_id = $item_id;
        $mutate->qty       = $qty;
        $mutate->save();

        return redirect()->route('item');
    }

}
