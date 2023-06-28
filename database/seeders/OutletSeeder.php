<?php

namespace Database\Seeders;

use App\Models\m_outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        m_outlet::create([
            'name'      => 'Hoki Mart',
            'location'  => 'Shamrock Group',
        ]);
    }
}
