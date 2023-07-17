<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Item;
use App\Models\PPNType;
use App\Models\Unit;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $data = [
            'dataItem'      => Item::with('group', 'ppnType', 'unit')
                                    ->where('outlet_id', Auth::user()->outlet_id)
                                    ->orderBy('created_at', 'desc')
                                    ->get(),
            'dataUnit'      => Unit::orderBy('created_at', 'desc')->get(),
            'dataGroup'     => Group::orderBy('created_at', 'desc')->get(),
            'dataPPN'       => PPNType::orderBy('created_at', 'desc')->get(),
            'dataVoucher'   => Voucher::orderBy('created_at', 'desc')->get(),
        ];
        return view('page.warehouse.item.item', $data);
    }

    public function create()
    {
        $data = [
            'dataUnit'      => Unit::all(['id', 'name']),
            'dataGroup'     => Group::all(['id', 'name']),
            'dataPPN'       => PPNType::all(['id', 'type'])
        ];
        return view('page.warehouse.item.input-item', $data);
    }

    public function store(Request $request){
        $request->validate([
            'code'                  => 'required|string',
            'name'                  => 'required|string',
            'group_id'              => 'required',
            'ppn_type_id'           => 'required',
            'unit_id'               => 'required',
            'purchase_price'        => 'required|numeric',
            'selling_price'         => 'required|numeric',
            'minimum_stock'         => 'required|numeric',
            'margin_member'         => 'required|string',
            'percent_non_margin'    => 'required|string',
        ]);

        $code               = $request->code;
        $name               = $request->name;
        $group_id           = $request->group_id;
        $ppn_type_id        = $request->ppn_type_id;
        $unit_id            = $request->unit_id;
        $outlet_id          = Auth::user()->outlet_id;
        $purchase_price     = $request->purchase_price;
        $selling_price      = $request->selling_price;
        $minimum_stock      = $request->minimum_stock;
        $margin_member      = $request->margin_member;
        $percent_non_margin = $request->percent_non_margin;
        
        $data = new Item();
        $data->code                 = $code;
        $data->name                 = $name;
        $data->group_id             = $group_id;
        $data->ppn_type_id          = $ppn_type_id;
        $data->unit_id              = $unit_id;
        $data->outlet_id            = $outlet_id;
        $data->purchase_price       = $purchase_price;
        $data->selling_price        = $selling_price;
        $data->minimum_stock        = $minimum_stock;
        $data->margin_member        = $margin_member;
        $data->percent_non_margin   = $percent_non_margin;
        $data->save();

        return redirect()->route('item');
    }

    public function edit($id)
    {
        $dataItem = Item::find($id);
        $data = [
            'id'                    => $dataItem->id,
            'code'                  => $dataItem->code,
            'name'                  => $dataItem->name,
            'group_id'              => $dataItem->group_id,
            'ppn_type_id'           => $dataItem->ppn_type_id,
            'unit_id'               => $dataItem->unit_id,
            'purchase_price'        => $dataItem->purchase_price,
            'selling_price'         => $dataItem->selling_price,
            'minimum_stock'         => $dataItem->minimum_stock,
            'margin_member'         => $dataItem->margin_member,
            'percent_non_margin'    => $dataItem->percent_non_margin,
            'dataUnit'              => Unit::all(['id', 'name']),
            'dataGroup'             => Group::all(['id', 'name']),
            'dataPPN'               => PPNType::all(['id', 'type'])
        ];

        return view('page.warehouse.item.edit-item', $data);
    }

    public function update(Request $request){
        $request->validate([
            'code'                  => 'required|string',
            'name'                  => 'required|string',
            'group_id'              => 'required',
            'ppn_type_id'           => 'required',
            'unit_id'               => 'required',
            'purchase_price'        => 'required|numeric',
            'selling_price'         => 'required|numeric',
            'minimum_stock'         => 'required|numeric',
            'margin_member'         => 'required|string',
            'percent_non_margin'    => 'required|string',
        ]);

        $id                 = $request->id;
        $code               = $request->code;
        $name               = $request->name;
        $group_id           = $request->group_id;
        $ppn_type_id        = $request->ppn_type_id;
        $unit_id            = $request->unit_id;
        $purchase_price     = $request->purchase_price;
        $selling_price      = $request->selling_price;
        $minimum_stock      = $request->minimum_stock;
        $margin_member      = $request->margin_member;
        $percent_non_margin = $request->percent_non_margin;

        $data = Item::find($id);
        $data->code                 = $code;
        $data->name                 = $name;
        $data->group_id             = $group_id;
        $data->ppn_type_id          = $ppn_type_id;
        $data->unit_id              = $unit_id;
        $data->purchase_price       = $purchase_price;
        $data->selling_price        = $selling_price;
        $data->minimum_stock        = $minimum_stock;
        $data->margin_member        = $margin_member;
        $data->percent_non_margin   = $percent_non_margin;
        $data->save();

        return redirect()->route('item');
    }
}
