<?php

namespace Database\Seeders;

use App\Models\m_outlet;
use App\Models\roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'role_id'       => roles::firstWhere(['name' => 'admin'])->id,
                'outlet_id'     => m_outlet::firstWhere(['name' => 'Hoki Mart'])->id,
                'name'          => 'Admin',
                'email'         => 'admin@taniyuk.com',
                'phone'         => null,
                'password'      => bcrypt('12345678'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => roles::firstWhere(['name' => 'kasir'])->id,
                'outlet_id'     => m_outlet::firstWhere(['name' => 'Hoki Mart'])->id,
                'name'          => 'Kasir',
                'email'         => 'kasir@taniyuk.com',
                'phone'         => null,
                'password'      => bcrypt('12345678'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => roles::firstWhere(['name' => 'staf'])->id,
                'outlet_id'     => m_outlet::firstWhere(['name' => 'Hoki Mart'])->id,
                'name'          => 'Staf',
                'email'         => 'staf@taniyuk.com',
                'phone'         => '085267902954',
                'password'      => bcrypt('12345678'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
