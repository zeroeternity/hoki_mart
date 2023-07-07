<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function mutation()
    {
        return view('page.warehouse.mutasi');
    }

    public function adjust()
    {
        return view('page.warehouse.adjustment');
    }

    public function stock()
    {
        return view('page.warehouse.stock');
    }

    public function stock_outlet()
    {
        return view('page.warehouse.stock-outlet');
    }
}
