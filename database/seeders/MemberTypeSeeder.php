<?php

namespace Database\Seeders;

use App\Models\MemberType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberType::insert([
                [
                    'type'          => 'FL',
                    'credit_limit'  => '3000000',
                    'range_date'    => '5',
                    'up_to'         => '5',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'KANTIN',
                    'credit_limit'  => '2000000',
                    'range_date'    => '31',
                    'up_to'         => '31',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'Kary. PKWT',
                    'credit_limit'  => '1000000',
                    'range_date'    => '29',
                    'up_to'         => '29',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'Kary. SKU',
                    'credit_limit'  => '1000000',
                    'range_date'    => '29',
                    'up_to'         => '29',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'KNTR MASE',
                    'credit_limit'  => '60000000',
                    'range_date'    => '31',
                    'up_to'         => '31',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'KNTR MASRF',
                    'credit_limit'  => '20000000',
                    'range_date'    => '31',
                    'up_to'         => '31',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'KOP JASA',
                    'credit_limit'  => '2000000',
                    'range_date'    => '31',
                    'up_to'         => '31',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'PKWT OFF',
                    'credit_limit'  => '0',
                    'range_date'    => '0',
                    'up_to'         => '0',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'Staff',
                    'credit_limit'  => '2000000',
                    'range_date'    => '1',
                    'up_to'         => '1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'type'          => 'Umum',
                    'credit_limit'  => '0',
                    'range_date'    => '1',
                    'up_to'         => '1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            ]

        );
    }
}
