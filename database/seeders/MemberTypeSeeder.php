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
        MemberType::create([
            'type'      => 'FL',
            'credit_limit'  => '3000000',
            'range_date'  => '5',
            'up_to'  => '5',
            'state' => '1',
        ]);
        MemberType::create([
            'type'      => 'KANTIN',
            'credit_limit'  => '2000000',
            'range_date'  => '31',
            'up_to'  => '31',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'Kary. PKWT',
            'credit_limit'  => '1000000',
            'range_date'  => '29',
            'up_to'  => '29',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'Kary. SKU',
            'credit_limit'  => '1000000',
            'range_date'  => '29',
            'up_to'  => '29',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'KNTR MASE',
            'credit_limit'  => '60000000',
            'range_date'  => '31',
            'up_to'  => '31',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'KNTR MASRF',
            'credit_limit'  => '20000000',
            'range_date'  => '31',
            'up_to'  => '31',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'KOP JASA',
            'credit_limit'  => '2000000',
            'range_date'  => '31',
            'up_to'  => '31',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'PKWT OFF',
            'credit_limit'  => '0',
            'range_date'  => '0',
            'up_to'  => '0',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'Staff',
            'credit_limit'  => '2000000',
            'range_date'  => '1',
            'up_to'  => '1',
            'state' => '1',

        ]);
        MemberType::create([
            'type'      => 'Umum',
            'credit_limit'  => '0',
            'range_date'  => '1',
            'up_to'  => '1',
            'state' => '1',

        ]);
    }
}
