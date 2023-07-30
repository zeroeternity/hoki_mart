<?php

namespace Database\Seeders;

use App\Models\Amenability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenability::insert([
                [
                    'name'      => 'Pekerja',
                    'limit'     => 15,
                    'status'    => '1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'name'      => 'Istri',
                    'limit'     => 9,
                    'status'    => '1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'name'      => 'Anak',
                    'limit'     => 7.5,
                    'status'    => '1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            ]
        );
    }
}
