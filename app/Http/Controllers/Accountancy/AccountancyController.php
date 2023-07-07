<?php

namespace App\Http\Controllers\Accountancy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountancyController extends Controller
{
    public function journal()
    {
        return view('page.accountancy.journal');
    }

    public function ledger()
    {
        return view('page.accountancy.ledger');
    }

    public function pph()
    {
        return view('page.accountancy.payable-pph-calculation');
    }

    public function calculation()
    {
        return view('page.accountancy.calculation-of-business-results');
    }

    public function balance()
    {
        return view('page.accountancy.balance-sheet');
    }

    public function trial()
    {
        return view('page.accountancy.trial-balance');
    }
}
