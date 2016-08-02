<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harvesting extends Model
{
    //
    protected $fillable = ['planting_id', 'harvested_at', 'weight'];

}
