<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wager extends Model
{
    public function answers()
    {
        return $this->belongsToMany('App\Answer');
    }
}
