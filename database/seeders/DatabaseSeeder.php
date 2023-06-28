<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            $this->call([
                RoleSeeder::class,
                OutletSeeder::class,
                UserSeeder::class,
            ]);
            $this->command->info('Database Seeder Success!');
          } catch (\Throwable $th) {
            throw $th;
            $this->command->error('Error: ' . $th->getMessage());
        }
        
    }
}
