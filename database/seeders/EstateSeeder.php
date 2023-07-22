<?php

namespace Database\Seeders;

use App\Models\Estate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estate::create([
            'code'      => 'AMR',
            'estate'      => 'AMR',
        ]);
        Estate::create([
            'code'      => 'HOKI',
            'estate'      => 'HOKI',
        ]);
        Estate::create([
            'code'      => 'LAB',
            'estate'      => 'LAB',
        ]);
        Estate::create([
            'code'      => 'MASE',
            'estate'      => 'MASE',
        ]);
        Estate::create([
            'code'      => 'MASRF',
            'estate'      => 'MASRF',
        ]);
        Estate::create([
            'code'      => 'MILL',
            'estate'      => 'HOKI',
        ]);
        Estate::create([
            'code'      => 'Outlet1',
            'estate'      => 'Outlet DIL',
        ]);
        Estate::create([
            'code'      => 'SRTE',
            'estate'      => 'SRTE',
        ]);
    }
}
