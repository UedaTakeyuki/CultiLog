<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planting extends Model
{
    use SoftDeletes;

    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //
    public function shelf()
    {
        return $this->belongsTo('App\Shelf');
    }

    //
    public function plant()
    {
        return $this->belongsTo('App\Plant');
    }
    
    //
    public function harvestings()
    {
        return $this->hasMany('App\Harvesting');
    }
    //
    public function duration()
    {
        $d = $this->planted_at;
        if (is_null($d)){return 0;};
        if ($d == 0){return 0;};

        $TS1 = strtotime($d);
        $TS2 = time();

        $SecondDiff = abs($TS2 - $TS1);
        $DayDiff = $SecondDiff / (60 * 60 * 24);
        return ceil($DayDiff);
    }
}
