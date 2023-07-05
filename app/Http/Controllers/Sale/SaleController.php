<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return view('page.sale.sale');
    }

    public function create()
    {
        return view('page.sale.input-sale');
    }

    public function instalment()
    {
        return view('page.sale.sale-instalment');
    }

    public function create_instalment()
    {
        return view('page.sale.input-sale-instalment');
    }
}
