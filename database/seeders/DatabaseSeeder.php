<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Data User
            UnitKerjaSeeder::class,
            DivisiSeeder::class,
            DepartemenSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
