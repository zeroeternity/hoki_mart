<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        roles::insert([
            [
                'name'          => 'admin',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'kasir',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'staf',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
