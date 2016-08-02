<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harvesting extends Model
{
    //
    protected $fillable = ['planting_id', 'harvested_at', 'weight'];
    
    //
    public function planting()
    {
        return $this->belongsTo('App\Planting');
    }

    //
    public function duration()
    {
        $d1 = $this->planting->planted_at;
        if (is_null($d1)){return 0;};
        if ($d1 == 0){return 0;};

        $d2 = $this->harvested_at;
        if (is_null($d2)){return 0;};
        if ($d2 == 0){return 0;};

        $TS1 = strtotime($d1);
        $TS2 = strtotime($d2);

        $SecondDiff = abs($TS2 - $TS1);
        $DayDiff = $SecondDiff / (60 * 60 * 24);
        return ceil($DayDiff);
    }

}
