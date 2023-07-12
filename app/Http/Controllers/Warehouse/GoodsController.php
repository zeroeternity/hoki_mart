<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Unit;
use App\Models\group;
use App\Models\PPNType;
use App\Models\Voucher;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $data = [
            'dataGoods'     => Goods::with('group', 'ppnType', 'unit')->orderBy('created_at', 'desc')->get(),
            'dataUnit'      => Unit::orderBy('created_at', 'desc')->get(),
            'dataGroup'     => Group::orderBy('created_at', 'desc')->get(),
            'dataPPN'       => PPNType::orderBy('created_at', 'desc')->get(),
            'dataVoucher'   => Voucher::orderBy('created_at', 'desc')->get(),
        ];

        return view('page.warehouse.goods.goods', $data);
    }

    public function create()
    {
        $data = [
            'dataUnit'   => Unit::all(['id', 'name']),
            'dataGroup'   => Group::all(['id', 'name']),
            'dataPPN'   => PPNType::all(['id', 'type'])
        ];


        return view('page.warehouse.goods.input-goods', $data);
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
        $purchase_price     = $request->purchase_price;
        $selling_price      = $request->selling_price;
        $minimum_stock      = $request->minimum_stock;
        $margin_member      = $request->margin_member;
        $percent_non_margin = $request->percent_non_margin;

        $data = new Goods();
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
        
        return redirect()->route('goods');
    }
}
