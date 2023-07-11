<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\Role;
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
                'role_id'       => Role::firstWhere(['name' => 'admin'])->id,
                'outlet_id'     => Outlet::firstWhere(['name' => 'Hoki Mart'])->id,
                'name'          => 'Admin',
                'email'         => 'admin@taniyuk.com',
                'phone'         => null,
                'password'      => bcrypt('12345678'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => Role::firstWhere(['name' => 'casheer'])->id,
                'outlet_id'     => Outlet::firstWhere(['name' => 'Hoki Mart'])->id,
                'name'          => 'Kasir',
                'email'         => 'kasir@taniyuk.com',
                'phone'         => null,
                'password'      => bcrypt('12345678'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
