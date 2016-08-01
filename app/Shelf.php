<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    //
    protected $fillable = ['name'];
    
    public function unit() 
    {
        return $this->belongsTo('App\Unit');
    }
    
    public function plantings() 
    {
        return $this->hasMany('App\Planting');
    }

}
