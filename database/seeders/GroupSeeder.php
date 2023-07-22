<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'code'      => '1.1',
            'name'      => 'Beras',
        ]);
        
        Group::create([
            'code'      => '1.2',
            'name'      => 'Snack / Makanan Ringan',
        ]);
        
        Group::create([
            'code'      => '1.3',
            'name'      => 'Bahan Makanan Instant',
        ]);
        Group::create([
            'code'      => '1.4',
            'name'      => 'Bahan Pembuatan Kue Makanan',
        ]);
        Group::create([
            'code'      => '1.5',
            'name'      => 'Bumbu Masak',
        ]);
        Group::create([
            'code'      => '1.6',
            'name'      => 'Bahan Pembuat Minuman',
        ]);
        Group::create([
            'code'      => '1.7',
            'name'      => 'Susu dan Sereal',
        ]);
        Group::create([
            'code'      => '10.1',
            'name'      => 'Perlengkapan Eletronik dan Listrik',
        ]);
        Group::create([
            'code'      => '11.1',
            'name'      => 'Busana',
        ]);
        Group::create([
            'code'      => '12.1',
            'name'      => 'Kaus Kaki, Sandal dan Sepatu',
        ]);
        Group::create([
            'code'      => '13.1',
            'name'      => 'Perlengkapan Rumah Tangga',
        ]);
        Group::create([
            'code'      => '14.1',
            'name'      => 'Perlengkapan Olah Raga',
        ]);
        Group::create([
            'code'      => '15.1',
            'name'      => 'Spareparts Sepeda Motor & Barang Cicilan Lainnya',
        ]);
        Group::create([
            'code'      => '16.1',
            'name'      => 'Eletronik',
        ]);
        Group::create([
            'code'      => '2.1',
            'name'      => 'Minuman Instant',
        ]);
        Group::create([
            'code'      => '29.1',
            'name'      => 'Lain-Lain',
        ]);
        Group::create([
            'code'      => '3.1',
            'name'      => 'Barang Keperluan Mencuci dan Mandi',
        ]);
        Group::create([
            'code'      => '30.1',
            'name'      => 'Kantor PT.AM',
        ]);
    }
}
