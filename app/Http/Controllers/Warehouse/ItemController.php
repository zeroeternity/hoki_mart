<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Item;
use App\Models\OutletItem;
use App\Models\PPNType;
use App\Models\PurchaseItem;
use App\Models\Unit;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    public function index()
    {
        $data = [
            'dataItem'       => Item::with('group', 'ppnType', 'unit', 'purchaseItem', 'outletItem')
                    ->where('status','1')
                    ->get()
                    ->map(fn ($item) => [
                    ...$item->toArray(),
                    'purchase_item' => $item->purchaseItem()->latest()->first(),
                    'outlet_item'   => $item->outletItem()->latest()->first(),
            ]),
            'dataOutletItem' => OutletItem::with('outlet', 'item')->where('outlet_id', Auth::user()->outlet_id),
            'dataUnit'       => Unit::orderBy('created_at', 'desc')->get(),
            'dataGroup'      => Group::orderBy('created_at', 'desc')->get(),
            'dataPPN'        => PPNType::orderBy('created_at', 'desc')->get(),
            'dataVoucher'    => Voucher::orderBy('created_at', 'desc')->get(),
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

    public function store(Request $request)
    {
        $request->validate([
            'code'                  => 'required|string|unique:items,code',
            'name'                  => 'required|string',
            'group_id'              => 'required',
            'ppn_type_id'           => 'required',
            'unit_id'               => 'required',
        ]);
        DB::beginTransaction();
        try {
            $code               = $request->code;
            $name               = $request->name;
            $group_id           = $request->group_id;
            $ppn_type_id        = $request->ppn_type_id;
            $unit_id            = $request->unit_id;
            $outlet_id          = Auth::user()->outlet_id;
            $selling_price      = $request->selling_price ?? 0;
            $minimum_stock      = $request->minimum_stock ?? 0;
            $percent_non_margin = $request->percent_non_margin ?? 0;

            $data = new Item();
            $data->code                 = $code;
            $data->name                 = $name;
            $data->group_id             = $group_id;
            $data->ppn_type_id          = $ppn_type_id;
            $data->unit_id              = $unit_id;

            $data->save();

            $outlet_item = new OutletItem();
            $outlet_item->item_id              = $data->id;
            $outlet_item->outlet_id            = $outlet_id;
            $outlet_item->selling_price        = $selling_price;
            $outlet_item->minimum_stock        = $minimum_stock;
            $outlet_item->percent_non_margin   = $percent_non_margin;
            $outlet_item->save();
            DB::commit();
            Alert::success('Data Barang Berhasil Ditambahkan');
            return redirect()->route('item');
        } catch (\Exception) {
            DB::rollback();
            return $this->responseJSON([], 500);
        }
    }

    public function edit($id)
    {
        $dataItem = Item::find($id);
        $data_purchase_price = PurchaseItem::where('item_id', $id)->orderby('created_at', 'desc')->first();
        $data_outlet_item = OutletItem::where('item_id', $id)->first();
        $data = [
            'id'                    => $dataItem->id,
            'code'                  => $dataItem->code,
            'name'                  => $dataItem->name,
            'group_id'              => $dataItem->group_id,
            'ppn_type_id'           => $dataItem->ppn_type_id,
            'unit_id'               => $dataItem->unit_id,
            'purchase_price'        => $data_purchase_price?->purchase_price ?? 0,
            'selling_price'         => $data_outlet_item->selling_price,
            'minimum_stock'         => $data_outlet_item->minimum_stock,
            'percent_non_margin'    => $data_outlet_item->percent_non_margin,
            'dataUnit'              => Unit::all(['id', 'name']),
            'dataGroup'             => Group::all(['id', 'name']),
            'dataPPN'               => PPNType::all(['id', 'type'])
        ];

        return view('page.warehouse.item.edit-item', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'code'                  => ['required', 'string', Rule::unique('items', 'code')->ignore($request->id, 'id')],
            'name'                  => 'required|string',
            'group_id'              => 'required',
            'ppn_type_id'           => 'required',
            'unit_id'               => 'required',
            'selling_price'         => 'required',
            'minimum_stock'         => 'required',
            'percent_non_margin'    => 'required',
        ]);
        DB::beginTransaction();
        try {
            $id                 = $request->id;
            $code               = $request->code;
            $name               = $request->name;
            $group_id           = $request->group_id;
            $ppn_type_id        = $request->ppn_type_id;
            $unit_id            = $request->unit_id;
            $outlet_id          = Auth::user()->outlet_id;
            $selling_price      = $request->selling_price;
            $minimum_stock      = $request->minimum_stock;
            $percent_non_margin = $request->percent_non_margin;

            $item = Item::find($id);
            $item->code                 = $code;
            $item->name                 = $name;
            $item->group_id             = $group_id;
            $item->ppn_type_id          = $ppn_type_id;
            $item->unit_id              = $unit_id;
            $item->save();

            $outlet = OutletItem::where('item_id', $item->id)
                ->where('outlet_id', $outlet_id)
                ->update(
                    [
                        'selling_price'        =>$selling_price,
                        'minimum_stock'        =>$minimum_stock,
                        'percent_non_margin'   =>$percent_non_margin
                    ]
                );

            DB::commit();
            Alert::success('Data Barang Berhasil Diupdate');
            return redirect()->route('item');
        } catch (\Exception) {
            DB::rollback();
            return $this->responseJSON([], 500);
        }

    }
}
