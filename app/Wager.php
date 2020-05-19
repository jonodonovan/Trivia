<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['stage_id', 'value', 'active'];

    public function answers()
    {
        return $this->belongsToMany('App\Answer');
    }
}
