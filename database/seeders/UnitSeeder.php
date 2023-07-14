<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::insert([
            [
                'name'          => 'KG',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'PC',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'PAC',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'BOX',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'DZ',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
