<?php

use App\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach(["A","B","C","D","E","F","G","H","I","J"] as $value){
            $unit = new Unit;
            $unit->name = $value;
            $unit->save();
        }
    }
}
