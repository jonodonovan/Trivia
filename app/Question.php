<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function round()
    {
        return $this->belongsTo('App\Round');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
	}

	public function answers()
	{
		return $this->hasmany('App\Answer');
	}
}
