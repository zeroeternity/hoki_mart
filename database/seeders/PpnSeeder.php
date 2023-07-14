<?php

namespace Database\Seeders;

use App\Models\PPNType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PpnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PPNType::insert([
            [
                'type'          => 'Barang Kena Pajak',
                'percent'          => '10',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'type'          => 'Barang Non Pajak',
                'percent'          => '0',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
