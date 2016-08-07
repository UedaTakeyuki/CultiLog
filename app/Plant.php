<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    //
    protected $fillable = ['name', 'kana'];
    
    public function plantings() 
    {
        return $this->hasMany('App\Planting');
    }
    
    public function harvestings_num()
    {
        $result = 0;
        foreach ($this->plantings as $planting){
            $result += $planting->harvestings->count();
            //$result = $result + 1;
        }
        return $result;
    }
}
