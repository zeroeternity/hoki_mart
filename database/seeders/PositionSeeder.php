<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'name'      => 'Acting Agronomy Manager',
        ]);
        Position::create([
            'name'      => 'Acting Field Head Assistant',
        ]);
        Position::create([
            'name'      => 'Acting Manager LD',
        ]);
        Position::create([
            'name'      => 'Field Assistant',
        ]);
        Position::create([
            'name'      => 'Field Assistant - Agronomi',
        ]);
        Position::create([
            'name'      => 'Field Assistant - GIS',
        ]);
        Position::create([
            'name'      => 'Manager (Civil Work)',
        ]);
        Position::create([
            'name'      => 'Manager Cost Analysis',
        ]);
        Position::create([
            'name'      => 'Office Assistant',
        ]);
        Position::create([
            'name'      => 'Office Assistant - PKWT',
        ]);
        Position::create([
            'name'      => 'Office Head Assistant',
        ]);
        Position::create([
            'name'      => 'Senior Manager Administrasi',
        ]);
        Position::create([
            'name'      => 'Technical Assistant',
        ]);
    }
}
