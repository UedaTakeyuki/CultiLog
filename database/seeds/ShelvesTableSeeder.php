<?php

use App\Unit;
use App\Shelf;
use Illuminate\Database\Seeder;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $units = Unit::all();
        foreach ($units as $unit){
            for($i = 1; $i <= 5; $i++){
                $shelf = new Shelf;
                $shelf->name = $unit->name . "-$i";
                $shelf->unit_id = $unit->id;
                $shelf->save();
            }
        }
    }
}
