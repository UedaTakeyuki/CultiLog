<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planting extends Model
{
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
}
