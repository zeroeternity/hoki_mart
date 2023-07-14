<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Supplier;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //Factory For Testing
        // Group::factory()->count(10)->create();
        // Voucher::factory()->count(10)->create();    
        // Supplier::factory()->count(5)->create();

        try {
            $this->call([
                RoleSeeder::class,
                OutletSeeder::class,
                UserSeeder::class,
                
                //Seeder Testing
                PpnSeeder::class,
                UnitSeeder::class,
             

            ]);
            $this->command->info('Database Seeder Success!');
          } catch (\Throwable $th) {
            throw $th;
            $this->command->error('Error: ' . $th->getMessage());
        }
        
    }
}
