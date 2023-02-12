<?php

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
         $this->call(RolesTableSeeder::class);
         $this->call(AdminTableSedder::class);
         $this->call(Bageseeder::class);
         $this->call(Lawsseeder::class);
         $this->call(doorseeder::class);
         $this->call(matrialsseeder::class);
    }
}
