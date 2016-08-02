<?php

use Illuminate\Database\Seeder;
use App\Harvesting;

class HarvestingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->add_harvesting("2016-04-04", "56", "24.00");
        $this->add_harvesting("2016-04-04", "56", "17.00");
        $this->add_harvesting("2016-04-06", "51", "18.50");
        $this->add_harvesting("2016-04-01", "63", "192.00");
        $this->add_harvesting("2016-04-01", "63", "410.40");
        $this->add_harvesting("2016-03-23", "15", "130.00");
        $this->add_harvesting("2016-03-23", "15", "34.50");
        $this->add_harvesting("2016-03-19", "78", "4.50");
        $this->add_harvesting("2016-03-19", "78", "21.50");
        $this->add_harvesting("2016-03-19", "78", "40.00");
        $this->add_harvesting("2016-03-18", "63", "444.00");
        $this->add_harvesting("2016-03-11", "63", "807.00");
        $this->add_harvesting("2016-03-11", "15", "40.00");
        $this->add_harvesting("2016-03-11", "15", "22.00");
        $this->add_harvesting("2016-03-11", "15", "12.00");
        $this->add_harvesting("2016-03-11", "15", "45.00");
        $this->add_harvesting("2016-03-11", "15", "22.50");
        $this->add_harvesting("2016-03-11", "15", "12.00");
        $this->add_harvesting("2016-03-04", "78", "6.50");
        $this->add_harvesting("2016-03-04", "55", "32.50");
        $this->add_harvesting("2016-02-22", "63", "460.50");
        $this->add_harvesting("2016-02-22", "63", "418.00");
        $this->add_harvesting("2016-02-22", "63", "162.00");
        $this->add_harvesting("2016-02-22", "15", "56.50");
        $this->add_harvesting("2016-02-22", "15", "20.00");
        $this->add_harvesting("2016-02-22", "15", "21.00");
        $this->add_harvesting("2016-02-22", "15", "70.50");
        $this->add_harvesting("2016-02-22", "15", "22.50");
        $this->add_harvesting("2016-02-22", "15", "24.50");
        $this->add_harvesting("2016-02-05", "63", "565.50");
        $this->add_harvesting("2016-01-29", "63", "2.50");
        $this->add_harvesting("2016-01-29", "63", "2.50");
    }
    
    public function add_harvesting($harvested_at, $planting_id, $weight){
        $harvesting = new Harvesting;
        $harvesting->planting_id = $planting_id;
        $harvesting->harvested_at = $harvested_at;
        $harvesting->weight = $weight;
        $harvesting->save();
    }
}
