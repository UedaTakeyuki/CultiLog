<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(ShelvesTableSeeder::class);
        $this->call(PlantsTableSeeder::class);
        $this->call(PlantingsTableSeeder::class);
        $this->call(HarvestingsTableSeeder::class);
    }
}
