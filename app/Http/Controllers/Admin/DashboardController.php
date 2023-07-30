<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dataSeries1 = [
            'label' => 'Data Pembelian',
            'data' => [10, 20, 15, 30, 25],
            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
            'borderColor' => 'rgba(75, 192, 192, 1)',
            'borderWidth' => 1,
        ];

        $dataSeries2 = [
            'label' => 'Data Penjualan',
            'data' => [5, 15, 8, 12, 20],
            'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
            'borderColor' => 'rgba(255, 159, 64, 1)',
            'borderWidth' => 1,
        ];

        $chartData = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'datasets' => [$dataSeries1, $dataSeries2],
        ];

        return view('page.dashboard.dashboard')->with('chartData', $chartData);
    }
}
