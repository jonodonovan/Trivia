<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function round()
    {
        return $this->belongsTo('App\Round');
    }
}
