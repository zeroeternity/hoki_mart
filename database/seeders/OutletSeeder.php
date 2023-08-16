<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outlet::create([
            'name'      => 'Hoki Mart',
            'location'  => 'Mainan, Lalang Sembawa, Kec. Sembawa, Kab. Banyuasin, Sumatera Selatan 30953',
            'phone'     => '+62 822-8202-3993'
        ]);
    }
}
